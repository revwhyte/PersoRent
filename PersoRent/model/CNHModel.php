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
            try {
                $sth = $sbh->prepare("INSERT INTO cnh(numero, categoria, validade) VALUES(:numero, :categoria, :validade)");

                $sth->bindParam(":numero", $this->numero, PDO::PARAM_INT);
                $sth->bindParam(":categoria", $this->categoria, PDO::PARAM_INT);
                $sth->bindParam(":validade", $this->validade, PDO::PARAM_INT);

                return $sth->execute();
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function buscaCNH($dbh, $dados) {
            try {
                $sth->prepare("SELECT numero, categoria, validade FROM cnh WHERE numero = :numero");

                $sth->bindParam(":numero", $dados['numero'], PDO::PARAM_INT);
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>