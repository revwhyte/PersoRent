<?php

    class CNHModel {
        private $numero;
        private $categoria;
        private $validade;

        public function __construct($dados) {
            $numero = $dados['numero'];
            $categoria = $dados['categoria'];
            $validade = $dados['validade'];
        }

        public function criaCNH($dbh) {
            
        }
    }
?>