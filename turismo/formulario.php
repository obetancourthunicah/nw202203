<?php
require_once "libreria.php";

$txtNombre = "";
$txtEmail = "";
$intNoches = 1;
$cmbCabania="C1";

if(isset($_POST["btnConfirmar"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtEmail = $_POST["txtEmail"];
    $intNoches = $_POST["intNoches"];
    $cmbCabania = $_POST["cmbCabania"];
    // TODO: Agregar a la lista en sesión por medio de una función de librería
    agregarALista(
        $txtNombre,
        $txtEmail,
        intval($intNoches),
        $cmbCabania
    );
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Reservas</title>
</head>
<body>
    <h1>Registro de Reservas La Ensenada</h1>
    <form action="formulario.php" method="post">
        <div>
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" />
        </div>
        <div>
            <label for="txtEmail">Correo</label>
            <input type="email" name="txtEmail" id="txtEmail" value="<?php echo $txtEmail; ?>" />
        </div>
        <div>
            <label for="intNoches">Noches</label>
            <input type="number" min="1" max="30" name="intNoches" id="intNoches" value="<?php echo $intNoches; ?>" />
        </div>
        <div>
            <label for="cmbCabania">Cabaña</label>
            <select name="cmbCabania" id="cmbCabania">
                <option value="C1" <?php echo ($cmbCabania === "C1")? "selected": ""; ?>>Cabaña 1 (L300.00)</option>
                <option value="C2" <?php echo ($cmbCabania === "C2")? "selected": ""; ?>>Cabaña 2 (L400.00)</option>
                <option value="C3" <?php echo ($cmbCabania === "C3")? "selected": ""; ?>>Cabaña 3 (L500.00)</option>
                <option value="C4" <?php echo ($cmbCabania === "C4")? "selected": ""; ?>>Cabaña 4 (L600.00)</option>
                <option value="C5" <?php echo ($cmbCabania === "C5")? "selected": ""; ?>>Cabaña 5 (L700.00)</option>
            </select>
        </div>
        <div>
            <button type="submit" name="btnConfirmar">Confirmar Reserva</button>
        </div>
    </form>
</body>
</html>
