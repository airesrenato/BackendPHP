<?php

    /*
    * CLASSE PAI
    */

    class conta{
        /*
        *ATRIBUTOS
        */
        protected $idConta;
        protected $titular;
        protected $saldo;

        /*
        *METODO CONSTRUTOR
        */
        function __construct($_idConta,$_titular,$_saldo){
            $this->idConta = $_idConta;
            $this->titular = $_titular;
            $this->saldo = $_saldo;
        }
        /*
        *ENCAPSULAMENTO
        */
        public function GetidConta():int{
            return $this->idConta;
        }
        public function GetTitular():string{
            return $this->titular;
        }
        public function SetTitular($_titular):void{
            $this->titular = $_titular;
        }
        public function GetSaldo():float{
            return $this->saldo;
        }
        public function SetSaldo($_saldo):void{
            $this->saldo = $_saldo;
        }
        /*
        *METODOS
        */
        public function Depositar($valor):void{
            $this->saldo += $valor;
        }
        public function Transferencia($valor,$conta){
            if(($this->saldo > 0) && ($this->saldo >= $valor)){
                $this->saldo -= $valor;
                $conta->Depositar($valor);
            }else{   
                echo'Saldo insuficiente!';
            }
            
        }
    }
?>