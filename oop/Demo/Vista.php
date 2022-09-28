<?php
class Vista {
    public $nombre;
    public $pais;
    public $fechaNacimiento;
    public $numero;


    public function __construct($nombre="", $pais="", $numero=0, $fechaNacimiento="")
    {
        $this->nombre = $nombre;
        $this->pais = $pais;
        $this->numero = $numero;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function printDatos(){
        echo $this->nombre . " "
            . $this->pais . " "
            . $this->numero . " "
            . $this->fechaNacimiento;
    }
}
?>
