<?php
require 'vendor/autoload.php';
require 'functions.php'; 

loadEnv(__DIR__.'/.env');

$clientId = getenv('SPOTIFY_CLIENT_ID');
$clientSecret = getenv('SPOTIFY_CLIENT_SECRET');
$redirectUri = getenv('SPOTIFY_REDIRECT_URI');

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $url = 'https://accounts.spotify.com/api/token';
    $data = [
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirectUri,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
    ];

    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    session_start();
    $_SESSION['access_token'] = $response['access_token'];

    header('Location: view/mood_form.php');
    exit();
} else {
    echo "Erro: código de autorização não foi recebido.";
}
