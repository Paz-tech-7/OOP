<?php

abstract class Cuenta
{
    private $saldo;
    private $tipo;
    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function set_tipo($tipo){
        $this->tipo = $tipo;
    }

    public function get_tipo(){
        return $this->tipo;
    }

    
    public function set_saldo($saldo){
        $this->saldo = $saldo;
    }

    //Metodos internos de todas las cuentas
    public function depositar($deposito){
        
        //Compruebo que el deposito no sea negativo
        if($deposito < 0){
            return;
        }
        
        //aumento el saldo 
        $this->set_saldo($this->get_saldo() + $deposito);
    }

    abstract public function retirar();
    
    public function get_saldo(){
        return $this->saldo;
    }
    
}