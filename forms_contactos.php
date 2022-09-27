<?php
session_start();

$txtNombre = "";
$txtEmail  = "";
$txtTelefono = "";

$arrContactos = array();
if (isset($_SESSION["arrContactos"])) {
    $arrContactos = $_SESSION["arrContactos"];
}

if (isset($_POST["btnProcesar"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtEmail  = $_POST["txtEmail"];
    $txtTelefono = $_POST["txtTelefono"];
    $dicContacto = array(
        "nombre" => $txtNombre,
        "correo" => $txtEmail,
        "telefono" => $txtTelefono
    );
    $arrContactos[] = $dicContacto;
}
$_SESSION["arrContactos"] = $arrContactos;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
</head>
<body>
    <h1>Contactos</h1>
    <form action="forms_contactos.php" method="post">
        <label for="txtNombre">Nombre</label>
        <input type="text" name="txtNombre" id="txtNombre" value"<?php echo $txtNombre; ?>" />
        <br/>
        <label for="txtEmail">Correo Electrónico</label>
        <input type="text" name="txtEmail" id="txtEmail" value"<?php echo $txtEmail; ?>" />
        <br/>
        <label for="txtTelefono">Teléfono</label>
        <input type="text" name="txtTelefono" id="txtTelefono" value"<?php echo $txtTelefono; ?>" />
        <br/>
        <button type="submit" name="btnProcesar">Procesar</button>
    </form>
    <?php
        if (count($arrContactos) > 0 ) {
    ?>
    <h2>Contactos Registrados</h2>
    <table border="2">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Correo</td>
                <td>Telefono</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrContactos as $contacto) { ?>
            <tr>
                <td><?php echo $contacto["nombre"]?></td>
                <td><?php echo $contacto["correo"]?></td>
                <td><?php echo $contacto["telefono"]?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
        }
    ?>
</body>
</html>
