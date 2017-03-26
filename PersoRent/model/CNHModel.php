<?php

    class CNHModel {
        private $numero;
        private $categoria;
        private $validade;

        public function __construct($dados) {
            $this->numero = $dados['numero'];
            $this->categoria = $dados['categoria'];
            $this->validade = $dados['validade'];
        }

        public function criaCNH($dbh) {
            try {
                $sth = $dbh->prepare("INSERT INTO cnh(numero, categoria, validade) VALUES(:numero, :categoria, :validade)");

                $sth->bindParam(":numero", $this->numero, PDO::PARAM_INT);
                $sth->bindParam(":categoria", $this->categoria, PDO::PARAM_STR);
                $sth->bindParam(":validade", $this->validade, PDO::PARAM_STR);

                return $sth->execute();
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function buscaCNH($dbh, $dados) {
            try {
                $sth->prepare("SELECT numero, categoria, validade FROM cnh WHERE numero = :numero");

                $sth->bindParam(":numero", $dados['numero'], PDO::PARAM_INT);

                $result = $sth->execute();

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public function atualizaCNH($dbh) {
            try {
                $sth = $dbh->prepare("UPDATE cnh SET numero = :numero, categoria = :categoria, validade = :validade WHERE numero = :numero");

                $sth->bindParam(":numero", $this->numero, PDO::PARAM_INT);

                return $sth->execute();

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public function removeCNH($dbh) {
            try {
                $sth = $dbh->prepare("DELETE FROM cnh WHERE numero = :numero");

                $sth->bindParam(":numero", $this->numero, PDO::PARAM_INT);

                return $sth->execute();
                
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>