<?php
//Comentarios en php es com en c ++
/*
    Comentario de bloque
    */
$cuandolosgatosnoestanlosratonesgranpachangadan = true;

$cuandoLosGatosNoEstanLosRatonesGranPachangaDan = true;

$bolEsViejo = true;
$intEsViejo = 18;
$strEsViejo = "El conocimiento";

if (true) {
    error_log("Entro a Condición!");
} else {
    error_log("No Entro a Condición True");
}

switch ($intEsViejo) {
case 18:
    error_log("Entro a Case 18");
    break;

default:
    error_log("Entro a bloque por defecto!");
    break;
}

$esValido = true;

$strResultado = "";
if ($esValido) {
    $strResultado = "Válido";
} else {
    $strResultado = "No Válido";
}

$strResultado = ($esValido)?"Válido":"No Válido";
//  Operador Aritmenticos y de Comparación (Lógicos)

$strResultado = ($strEsViejo == "El conocimiento")?"V": "F";

$strResultado = ($esValido == 1)?"V":"F"; //"V"

$strResultado = ($esValido === 1)?"V":"F"; //"F"

$strResultado = ($esValido != 1)?"V":"F";

$strResultado = ($esValido !== 1)?"V":"F";

/* >   <   >=  <=  && ||  */

/*  */
$strResultado = "Hola" . "Adios" . (1234.12); //HolaAdios1234.12
/*
    + - * / **     += -= *=      ++  --
*/
$intCuadrado = 2**3;

//===================================================
$arrNumeros = array(1,2,3,4,5,6,7,8,9,0);

$arrNumeros[0];

$arrNumeros = array();

$arrNumeros[] = "Hola"; //llave  = 0

$arrNumeros["nombre"] = "Orlando";  //llave = nombre

echo $arrNumeros["nombre"];

// php asigna a las llaves ausentes el entero mayor disponible a partir de 0;
$arrNumeros[] = "Adios"; // llave = 1
$arrNumeros[] = "Good bye"; // llave = 2

// ================================================

for ($i = 0; $i < 100; $i++) {
    // echo $arrNumeros[$i];
}
$i = 0;
while ($i<100) {
    // Expresiones
    $i++;
}

$i = 0;
do {
    $i ++;
} while ($i<100);

foreach ($arrNumeros as $valArray) {
    // Super for para recorrer arreglos;
}

foreach ($arrNumeros as $llave => $valor) {
    // Super for con llaves;
}

$arrPersona = array(
    "id"=> 10,
    "nombre"=>"Orlando",
    "curso"=>"Negocios Web"
);

$arrTable = array($arrPersona);








?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento HTML en php</title>
</head>
<body>
    <h1>
        <?php
            echo $strEsViejo;
        ?>
    </h1>
</body>
</html>
