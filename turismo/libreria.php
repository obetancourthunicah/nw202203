<?php
    session_start();
    function getCabanias(){
        return array(
            "C1"=>array(
                "descripcion" => "Cabaña 1",
                "precio" => 300
            ),
            "C2"=>array(
                "descripcion" => "Cabaña 2",
                "precio" => 400
            ),
            "C3"=>array(
                "descripcion" => "Cabaña 3",
                "precio" => 500
            ),
            "C4"=>array(
                "descripcion" => "Cabaña 4",
                "precio" => 600
            ),
            "C5"=>array(
                "descripcion" => "Cabaña 5",
                "precio" => 700
            ),
        );
    }

    function agregarALista($nombre, $correo, $noches, $cabania) {
        $arrReservas = array();
        if (isset($_SESSION["arrReservas"])) {
            $arrReservas = $_SESSION["arrReservas"];
        }
        $dicReserva = array(
            "nombre" => $nombre,
            "correo" => $correo,
            "noches" => $noches,
            "cabania" => getCabanias()[$cabania]
        );

        $dicReserva["total"] = $noches * $dicReserva["cabania"]["precio"];
        $arrReservas[] = $dicReserva;

        $_SESSION["arrReservas"] = $arrReservas;
    }
    function obtenerLista(){
        $arrReservas = array();
        if (isset($_SESSION["arrReservas"])) {
            $arrReservas = $_SESSION["arrReservas"];
        }
        return $arrReservas;
    }
?>
