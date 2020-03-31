<?php
    //INCLUSÃO DA CLASSE PAI
    require_once 'class_conta.php';
    
    //CRIAÇÃO DA SUBCLASSE CONTAPOUPANCA QUE HERDA OS ATRIBUTOS E METODOS DA CLASSE CONTA
    class contaPoupanca extends conta{

        //ATRIBUTOS
        private $idContaPoupanca;

        //METODO CONSTRUTOR
        function __construct($_idConta,$_titular,$_saldo,$_idContaPoupanca){
            
            //METODO CONSTRUTOR DA CLASSE PAI
            parent::__construct($_idConta,$_titular,$_saldo);
            $this->idContaPoupanca = $_idContaPoupanca;
        }
        //ENCAPSULAMENTO
        public function GetidPoupanca():int{
            return $this->idContaPoupanca;
        }
        //METODOS
        public function Saque($valor){

            //VALIDAÇÃO DO VALOR EM CONTA E DO LIMITE DE SAQUE
            if(($this->saldo > 0) && ($this->saldo >= $valor) && $valor <=1000){
                $this->saldo -= $valor;

                //REDUÇÃO DO VALOR DE TAXA DE OPERAÇÃO
                $this->saldo -= 0.8;
            }else{
                if($valor > 1000){
                    echo'Limite de saque excedido!!';
                }else{
                    echo'Saldo insuficiente!!';
                }
            }
        }
    }
?>