<?php
require_once 'Demo/Vista.php';
require_once 'Demo/Rectangle.php';
require_once 'Demo/Square.php';

$fulanit = new Vista(
    "Fulanito de Tal C",
    "Honduras",
    "10",
    "20201209"
);
$menganito = new Vista();

/*
$fulanit->nombre = "Fulanito de Tal";
$fulanit->numero = 1;
$fulanit->pais = "Honduras";
$fulanit->fechaNacimiento = "2002-09-19";
*/

$menganito->nombre = "Menganito de Tarzo";
$menganito->numero = 2;
$menganito->pais = "Honduras";
$menganito->fechaNacimiento = "2002-12-24";

echo $fulanit->printDatos();
echo "<br>";
echo $menganito->printDatos();
echo "<hr>";
$rect = new Rectangle(5, 10);
$square = new Square(10);

$arrForms = array($rect, $square);

foreach($arrForms as $form){
    echo $form->getArea();
    echo "<br>";
    echo $form->getPerimetro();
    echo "<hr>";
}
?>
