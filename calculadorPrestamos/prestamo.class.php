<?php
namespace BCO;

require_once("cuota.class.php");

use BCO\Cuota;
class Prestamo{
    private $_capital;
    private $_periodos;
    private $_tasa;
    private $_valorFuturo;
    private $_cuotanivelada;
    private $_cuotas;
    public function __construct($capital, $periodos, $tasa)
    {
        $this->_capital = $capital;
        $this->_periodos = $periodos;
        $this->_tasa = $tasa;
    }
    public function calcularPrestamo()
    {
        $this->_cuotanivelada = $this->_capital / (( 1 - pow((1 + ($this->_tasa/12)), -1*$this->_periodos))/($this->_tasa/12));
        $this->_valorFuturo = round($this->_cuotanivelada * $this->_periodos, 4);
        $saldo = $this->_capital;
        for ($i = 1 ; $i<= $this->_periodos; $i ++) {
            $tmpCuota = new Cuota($i, $this->_cuotanivelada, $saldo, $this->_tasa/12);
            $this->_cuotas[] = $tmpCuota;
            $saldo = $tmpCuota->getSaldoFinal();
        }
    }

    public function getCuotas(){
        return $this->_cuotas;
    }

    public function exportWithAdapter(&$fnAdaptador) {
        $arrObjeto = array(
        "capital" => $this->_capital,
        "periodos" => $this->_periodos,
        "tasa" => $this->_tasa,
        "valorFuturo" => $this->_valorFuturo,
        "cuotanivelada" => $this->_cuotanivelada,
        "cuotas" => array()
        );
        foreach ($this->_cuotas as $oCuota) {
            $arrObjeto["cuotas"][] = array(
                "periodo" => $oCuota->getPeriodo(),
                "cuota" => $oCuota->getCuota(),
                "interes" => $oCuota->getInteres(),
                "capital" => $oCuota->getCapital(),
                "saldoFinal" => $oCuota->getSaldoFinal(),
                "saldoAntes" => $oCuota->getSaldoAntes(),
                "tasa" => $oCuota->getTasa()
            );
        }
        return $fnAdaptador($arrObjeto);
    }
}
?>
