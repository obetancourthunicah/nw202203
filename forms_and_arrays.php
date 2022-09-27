<?php
session_start();

$intClicks = 0;
$txtNombre = "";
$arrNombres = array();
if (isset($_SESSION["intClicks"])) {
    $intClicks = intval($_SESSION["intClicks"]);
}

if (isset($_SESSION["arrNombres"])) {
    $arrNombres = $_SESSION["arrNombres"];
}

if (isset($_POST['btnProcesar'])) {
    $txtNombre = $_POST["txtNombre"];
    $arrNombres[] = $txtNombre;
    $intClicks ++;
}

$_SESSION["arrNombres"] = $arrNombres;
$_SESSION["intClicks"] = $intClicks;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms and Arrays</title>
</head>
<body>
    <h1>Uso de Formularios y Arreglos en PHP</h1>
    <form action="forms_and_arrays.php" method="post">
        <label for="txtNombre">Nombre Completo</label>
        <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre ?>" />
        <br>
        <button type="submit" name="btnProcesar" value="Hola">
            Procesar
        </button>
    </form>
    <h2>Clicks dados a procesar: <?php echo $intClicks ?></h2>
    <h2>Nombres Guardados</h2>
    <?php
    foreach ($arrNombres as $nombre) {
        echo " - " . $nombre . '<br/>';
    }
    ?>
</body>
</html>
