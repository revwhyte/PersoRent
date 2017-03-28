<?php

    class ClienteModel {
        private $nome;
        private $rg;
        private $cpf;
        private $endereco;
        private $cep;
        private $id_cnh;
        private $dados_bancarios_agencia;
        private $dados_bancarios_conta;
        private $dados_bancarios_digito;
       

        public function __construct($dados) {
            $this->nome = $dados['nome'];
            $this->rg = $dados['rg'];
            $this->cpf = $dados['cpf'];
            $this->endereco = $dados['endereco'];
            $this->cep = $dados['cep'];
            $this->id_cnh = $dados['id_cnh'];
            $this->dados_bancarios_agencia = $dados['dados_bancarios_agencia'];
            $this->dados_bancarios_conta = $dados['dados_bancarios_conta'];
            $this->dados_bancarios_digito = $dados['dados_bancarios_digito'];
        }

        public function criaCliente($dbh) {
            try {
                $sth = $dbh->prepare("INSERT INTO cliente(nome, rg, cpf, endereco, cep, id_cnh, dados_bancarios_agencia, dados_bancarios_conta, dados_bancarios_digito) VALUES(:nome, :rg, :cpf, :endereco, :cep, :id_cnh, :dados_bancarios_agencia, :dados_bancarios_conta, :dados_bancarios_digito)");
                
                $sth->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sth->bindParam(":rg", $this->rg, PDO::PARAM_STR);
                $sth->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                $sth->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                $sth->bindParam(":cep", $this->cep, PDO::PARAM_STR);
                $sth->bindParam(":id_cnh", $this->id_cnh, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_agencia", $this->dados_bancarios_agencia, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_conta", $this->dados_bancarios_conta, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_digito", $this->dados_bancarios_digito, PDO::PARAM_INT);
                               
                return $sth->execute();

            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public static function buscaClienteCpf($dbh, $cpf) {
            try {
                $sth = $dbh->prepare("SELECT nome, rg, cpf, endereco, cep, id_cnh, dados_bancarios_agencia, dados_bancarios_conta, dados_bancarios_digito FROM cliente WHERE cpf = :cpf");

                $sth->bindParam(":cpf", $cpf, PDO::PARAM_STR);
                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function buscaClienteNome($dbh, $nome) {            
            try {
                $sth = $dbh->prepare("SELECT nome, rg, cpf, endereco, cep, id_cnh, dados_bancarios_agencia, dados_bancarios_conta, dados_bancarios_digito FROM cliente WHERE nome LIKE :nome");
                $nome = '%'.$nome.'%';
                $sth->bindParam(":nome", $nome, PDO::PARAM_STR);
                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            
                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }


        public static function retornaTodosClientes($dbh) {
            try {
                $sth = $dbh->prepare("SELECT nome, rg, cpf, endereco, cep, id_cnh, dados_bancarios_agencia, dados_bancarios_conta, dados_bancarios_digito FROM cliente");

                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
		
		
		 public function atualizaCliente($dbh) {
            try {
                $sth = $dbh->prepare("UPDATE cliente SET nome = :nome, rg = :rg, cpf = :cpf, endereco = :endereco, cep = :cep, id_cnh = :id_cnh, dados_bancarios_agencia = :dados_bancarios_agencia, dados_bancarios_conta = :dados_bancarios_conta, dados_bancarios_digito = :dados_bancarios_digito WHERE cpf = :cpf");

                $sth->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sth->bindParam(":rg", $this->rg, PDO::PARAM_STR);
                $sth->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                $sth->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                $sth->bindParam(":cep", $this->cep, PDO::PARAM_STR);
                $sth->bindParam(":id_cnh", $this->id_cnh, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_agencia", $this->dados_bancarios_agencia, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_conta", $this->dados_bancarios_conta, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_digito", $this->dados_bancarios_digito, PDO::PARAM_INT);

                return $sth->execute();

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public function removeCliente($dbh, $cpf) {
            try {
                $sth = $dbh->prepare("DELETE FROM cliente WHERE cpf = :cpf");

                /*$sth->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sth->bindParam(":rg", $this->rg, PDO::PARAM_STR);*/
                $sth->bindParam(":cpf", $cpf, PDO::PARAM_STR);
                /*$sth->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                $sth->bindParam(":cep", $this->cep, PDO::PARAM_STR);
                $sth->bindParam(":id_cnh", $this->id_cnh, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_agencia", $this->dados_bancarios_agencia, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_conta", $this->dados_bancarios_conta, PDO::PARAM_INT);
                $sth->bindParam(":dados_bancarios_digito", $this->dados_bancarios_digito, PDO::PARAM_INT);*/

                return $sth->execute();
                
            } catch(PDOException $e) {
                $e->getMessage();echo '<pre>';
            var_dump($e);
            echo '</pre>';
            }
        }
		
		
		
    }

?>