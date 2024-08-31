<?php
session_start(); 

session_unset();

session_destroy();

session_start();
require 'vendor/autoload.php';
require 'functions.php';

loadEnv(__DIR__.'/.env');

$clientId = getenv('SPOTIFY_CLIENT_ID');
$redirectUri = getenv('SPOTIFY_REDIRECT_URI');
$scope = 'playlist-modify-private user-read-email'; 

// URL de Autorização
$authUrl = "https://accounts.spotify.com/authorize?response_type=code&client_id={$clientId}&redirect_uri={$redirectUri}&scope=" . urlencode($scope);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Playlist Mood</title>
    <link rel="stylesheet" href="view/css/styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Gerador de Playlists Personalizadas por Humor</h1>
        <p>Conecte-se ao Spotify para gerar playlists personalizadas com base no seu humor atual.</p>
        <a href="<?= $authUrl ?>" class="btn">Conectar com Spotify</a>
    </div>
</body>
</html>
