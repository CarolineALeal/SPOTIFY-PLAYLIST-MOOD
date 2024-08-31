<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seu Humor</title>
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Escolha seu Humor para Gerar uma Playlist</h1>
        
        <form action="../controller/process_mood.php" method="post">
            <label for="mood">Selecione seu humor:</label>
            <select name="mood" id="mood">
                <option value="happy">Feliz</option>
                <option value="sad">Triste</option>
                <option value="energetic">Energético</option>
                <option value="relaxed">Relaxado</option>
            </select>
            <br><br>
            <input type="submit" value="Gerar Playlist">
        </form>
    </div>
</body>
</html>
