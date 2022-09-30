<?php
namespace BCO;

class Cuota {
    private $_periodo;
    private $_cuota;
    private $_interes;
    private $_capital;
    private $_saldoFinal;
    private $_saldoAntes;
    private $_tasa;

    public function __construct($periodo, $cuota, $saldo, $tasa)
    {
        // I = S * (Ti)^Pc;
        // Ct = C + I
        // C = Ct - I;
        // SF = S - C;
        $this->_saldoAntes = $saldo;
        $this->_cuota = $cuota;
        $this->_periodo = $periodo;
        $this->_tasa = $tasa;

        $this->_interes = $this->_saldoAntes * $this->_tasa;
        $this->_capital = $this->_cuota - $this->_interes;
        if ($this->_saldoAntes - $this->_capital < 0) {
            $this->_capital = $this->_saldoAntes;
        }
        $this->_saldoFinal = $this->_saldoAntes - $this->_capital;
    }
    public function getPeriodo()
    {
        return $this->_periodo;
    }
    public function getSaldoFinal()
    {
        return $this->_saldoFinal;
    }
    public function getCuota()
    {
        return $this->_cuota;
    }
    public function getInteres()
    {
        return $this->_interes;
    }
    public function getCapital()
    {
        return $this->_capital;
    }
    public function getSaldoAntes()
    {
        return $this->_saldoAntes;
    }
    public function getTasa()
    {
        return $this->_tasa;
    }
}
?>
