<?php
    
    class DadosBancariosModel {
        private $agencia;
        private $conta;
        private $digito;
        private $endereco;

        public function __construct($dados) {
            $this->agencia = $dados['agencia'];
            $this->conta = $dados['conta'];
            $this->digito = $dados['digito'];
            $this->endereco = $dados['endereco'];
        }

        public function criaDadosBancarios($dbh) {
            try {
                $sth = $dbh->prepare("INSERT INTO dados_bancarios(agencia, conta, digito, endereco) VALUES(:agencia, :conta, :digito, :endereco)");

                $sth->bindParam(":agencia", $this->agencia, PDO::PARAM_INT);
                $sth->bindParam(":conta", $this->conta, PDO::PARAM_INT);
                $sth->bindParam(":digito", $this->digito, PDO::PARAM_INT);
                $sth->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);

                return $sth->execute();

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function buscaDadosBancarios($dbh, $dados) {
            try {
                $sth = $dbh->prepare("SELECT agencia, conta, digito, endereco FROM dados_bancarios WHERE agencia = :agencia AND conta = :conta AND digito = :digito LIMIT 1");

                $sth->bindParam(":agencia", $dados['agencia'], PDO::PARAM_INT);
                $sth->bindParam(":conta", $dados['conta'], PDO::PARAM_INT);
                $sth->bindParam(":digito", $dados['digito'], PDO::PARAM_INT);

                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public function atualizaDadosBancarios($dbh) {
            try {
                $sth = $dbh->prepare("UPDATE dados_bancarios SET agencia = :agencia, conta = :conta, digito = :digito, endereco = :endereco WHERE agencia = :agencia AND conta = :conta AND digito = :digito");

                $sth->bindParam(":agencia", $this->agencia, PDO::PARAM_INT);
                $sth->bindParam(":conta", $this->conta, PDO::PARAM_INT);
                $sth->bindParam(":digito", $this->digito, PDO::PARAM_INT);
                $sth->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);

                return $sth->execute();

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function removeDadosBancarios($dbh, $dados) {
            try {
                $sth = $dbh->prepare("DELETE FROM dados_bancarios WHERE agencia = :agencia AND conta = :conta AND digito = :digito");

                $sth->bindParam(":agencia", $dados['dados_bancarios_agencia'], PDO::PARAM_INT);
                $sth->bindParam(":conta", $dados['dados_bancarios_conta'], PDO::PARAM_INT);
                $sth->bindParam(":digito", $dados['dados_bancarios_digito'], PDO::PARAM_INT);

                return $sth->execute();
                
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>