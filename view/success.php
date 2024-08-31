<?php
session_start();
$playlistUrl = isset($_SESSION['playlist_url']) ? $_SESSION['playlist_url'] : '#';
unset($_SESSION['playlist_url']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist Criada</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="success-message">
            Sua playlist foi criada com sucesso! <a href="<?php echo htmlspecialchars($playlistUrl); ?>">Ouça agora no Spotify</a>
        </div>
    </div>
</body>
</html>
