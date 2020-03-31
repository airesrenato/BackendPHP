<?php
    //INCLUSÃO DA CLASSE PAI
    require_once 'class_conta.php';

    //CRIAÇÃO DA SUBCLASSE CONTACORRENTE QUE HERDA OS ATRIBUTOS E METODOS DA CLASSE CONTA
    class contaCorrente extends conta{
        
        //ATRIBUTOS
        private $idContaCorrente;

        //METODO CONSTRUTOR
        function __construct($_idConta,$_titular,$_saldo,$_idContaCorrente){
            //METODO CONSTRUTOR DA CLASSE PAI
            parent::__construct($_idConta,$_titular,$_saldo);
            $this->idContaCorrente = $_idContaCorrente;
        }

        //ENCAPSULAMENTO
        public function GetidContaCorrente():int{
            return $this->idContaCorrente;
        }

        //METODOS
        public function Saque($valor){
        
            //VALIDAÇÃO DO VALOR EM CONTA E DO LIMITE DE SAQUE
            if(($this->saldo > 0) && ($this->saldo >= $valor) && $valor <= 600){
                $this->saldo -= $valor;
        
                //REDUÇÃO DO VALOR DE TAXA DE OPERAÇÃO
                $this->saldo -= 2.5;
            }else{
                if($valor > 600){
                    echo'Limite de saque excedido';
                }else{
                    echo'Saldo Insuficiente';
                }
            }
        }
    }
?>