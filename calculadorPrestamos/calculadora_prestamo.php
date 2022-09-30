<?php

use BCO\Prestamo;

require_once 'prestamo.class.php';
require_once 'cuota.class.php';


$numCapital = 100000;
$numPeriodos = 12;
$numInteres = 0.25;

$oPrestamo = null;
if (isset($_POST["btnCalcular"])) {
    $numCapital = floatval($_POST["numCapital"]);
    $numPeriodos = intval($_POST["numPeriodos"]);
    $numInteres = floatval($_POST["numInteres"]);

    $oPrestamo = new Prestamo($numCapital, $numPeriodos, $numInteres);
    $oPrestamo->calcularPrestamo();
}

$debugAdapter = function ($arrDatos) {
    return print_r($arrDatos, true);
};

$jsonAdapter = function ($arrDatos) {
    return json_encode($arrDatos, JSON_PRETTY_PRINT);
};



$tableRowAdapter = function ($arrDatos) {
    $tmpRows = array();
    foreach ($arrDatos["cuotas"] as $arrItem) {
        $tmpRows[] = sprintf(
            "<tr><td>%s</td><td>%d</td><td>%f</td><td>%f</td><td>%f</td></tr>",
            $arrItem["periodo"],
            $arrItem["cuota"],
            $arrItem["interes"],
            $arrItem["capital"],
            $arrItem["saldoFinal"]
        );
    }
    return implode("", $tmpRows);
};

$csvRowAdapter = function ($arrDatos) {
    $tmpRows = array();
    foreach ($arrDatos["cuotas"] as $arrItem) {
        $tmpRows[] = sprintf(
            "%s;%d;%f;%f;%f",
            $arrItem["periodo"],
            $arrItem["cuota"],
            $arrItem["interes"],
            $arrItem["capital"],
            $arrItem["saldoFinal"]
        );
    }
    return implode("\n", $tmpRows);
};


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Prestamo</title>
</head>

<body>
    <h1>Calculadora de Préstamos</h1>

    <form action="calculadora_prestamo.php" method="POST">
        <label for="numCaptial">Capital A Solicitar</label>
        <input type="number" name="numCapital" id="numCapital" value="<?php echo $numCapital; ?>" placeholder="0-999999" />
        <br />
        <label for="numPeriodos">Periodos</label>
        <select name="numPeriodos" id="numPeriodos">
            <option value="6" <?php echo ($numPeriodos == 6) ? "selected" : ""; ?>>6 Meses </option>
            <option value="12" <?php echo ($numPeriodos == 12) ? "selected" : ""; ?>>Un Año </option>
            <option value="24" <?php echo ($numPeriodos == 24) ? "selected" : ""; ?>>2 Años </option>
            <option value="36" <?php echo ($numPeriodos == 36) ? "selected" : ""; ?>>3 Años </option>
            <option value="72" <?php echo ($numPeriodos == 72) ? "selected" : ""; ?>>6 Años </option>
        </select>
        <br />
        <label for="numInteres">Tasa de Interez</label>
        <select name="numInteres" id="numInteres">
            <option value="0.25" <?php echo ($numInteres == 0.25) ? "selected" : ""; ?>>25% anual</option>
            <option value="0.30" <?php echo ($numInteres == 0.30) ? "selected" : ""; ?>>30% anual</option>
            <option value="0.38" <?php echo ($numInteres == 0.38) ? "selected" : ""; ?>>38% anual</option>
        </select>
        <br />
        <button name="btnCalcular" value="Calcular" id="btnCalcular">Calcular</button>
    </form>
    <hr />

    <h2>Tabla de Amortizaiones</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cuota</th>
                <th>Interés</th>
                <th>Capital</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($oPrestamo !== null) {
             echo $oPrestamo->exportWithAdapter($tableRowAdapter);
             echo "<hr/>";
             echo $oPrestamo->exportWithAdapter($debugAdapter);
             echo "<hr/><pre>";
             echo $oPrestamo->exportWithAdapter($jsonAdapter);
             echo "</pre><hr/><pre>";
             echo $oPrestamo->exportWithAdapter($csvRowAdapter);
             echo "</pre>";
        } // end If oPrestamo
        ?>
        </tbody>
    </table>
</body>

</html>
