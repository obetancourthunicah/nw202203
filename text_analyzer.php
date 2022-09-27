<?php
    require_once "./libraries/analyzer_lib.php";
    $txtText = "";

    if (isset($_POST["btnProcesar"])) {
        // Analizar el Codigo
        $txtText = $_POST["txtText"];
        analizarTexto($txtText);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Analizador de Texto</title>
</head>
<body>
    <form action="text_analyzer.php" method="post">
        <label for="txtText">Texto a analizar:</label> <br>
        <textarea name="txtText" id="txtText" cols="30"
           rows="10"><?php echo $txtText; ?></textarea>
        <br>
        <button type="submit" name="btnProcesar">Analizar</button>
    </form>
</body>
</html>
