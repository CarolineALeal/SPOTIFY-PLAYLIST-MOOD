<?php
require '../vendor/autoload.php';
require '../functions.php';

loadEnv(__DIR__.'/../.env');

session_start();
$accessToken = $_SESSION['access_token'];

if (!$accessToken) {
    echo "Erro: Token de acesso não encontrado!";
    exit();
}

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$mood = $_POST['mood'];
$playlistName = "Playlist para quando você está " . ucfirst($mood);

$genreSeeds = [
    'happy' => ['pop', 'dance'],
    'sad' => ['acoustic', 'piano'],
    'energetic' => ['rock', 'electronic'],
    'relaxed' => ['ambient', 'chill']
];

$tracks = $api->getRecommendations([
    'seed_genres' => $genreSeeds[$mood],
    'limit' => 20,
]);

$trackUris = array_map(function($track) {
    return $track->uri;
}, $tracks->tracks);

$user = $api->me();

$playlist = $api->createPlaylist($user->id, [
    'name' => $playlistName,
    'description' => "Gerada automaticamente para combinar com seu humor: $mood",
    'public' => false,
]);

$api->addPlaylistTracks($playlist->id, $trackUris);

$_SESSION['playlist_url'] = $playlist->external_urls->spotify;

header('Location: ../view/success.php');
exit();
