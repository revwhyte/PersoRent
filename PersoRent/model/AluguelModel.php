<?php

   require_once('Database.php');

  class AluguelModel {
	  
    private $data_saida;
    private $data_devolucao;
	  private $valor;
    private $multa;
	  private $novas_avarias;
    private $status;
    private $veiculo_chassi;
    private $cliente_cpf;

		
    public function __construct($dados) {
      $this->data_saida = $dados['data_saida'];
      $this->data_devolucao = $dados['data_devolucao'];
	    $this->valor = $dados['valor'];
      $this->multa = $dados['multa'];
	    $this->novas_avarias = $dados['novas_avarias'];
      $this->status = $dados['status'];
      $this->veiculo_chassi = $dados['veiculo_chassi'];
      $this->cliente_cpf = $dados['cliente_cpf'];
	 
    }
    
    public function criarAluguel($dbh) {
      try {
        $sth = $dbh->prepare("INSERT INTO aluguel(data_saida, data_devolucao, valor, multa, novas_avarias, status, veiculo_chassi, cliente_cpf ) VALUES (:data_saida, :data_devolucao, :valor, :multa, :novas_avarias, :status, :veiculo_chassi, :cliente_cpf)");
		
        
        $sth->bindParam(":data_saida", $this->data_saida, PDO::PARAM_STR);
        $sth->bindParam(":data_devolucao", $this->data_devolucao, PDO::PARAM_STR);
        $sth->bindParam(":valor", $this->valor, PDO::PARAM_INT);
        $sth->bindParam(":multa", $this->multa, PDO::PARAM_INT);
	      $sth->bindParam(":novas_avarias", $this->novas_avarias, PDO::PARAM_BOOL);
        $sth->bindParam(":status", $this->status, PDO::PARAM_STR);
        $sth->bindParam(":veiculo_chassi", $this->veiculo_chassi, PDO::PARAM_INT);
        $sth->bindParam(":cliente_cpf", $this->cliente_cpf, PDO::PARAM_INT);
	    	   	   
        return $sth->execute();
      } catch (PDOException $e) {
        $e->getMessage();
      }
    }
	

    public static function buscarAluguelDataSaida($dbh) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT data_saida, data_devolucao, valor, multa, novas_avarias, status, veiculo_chassi, cliente_cpf FROM aluguel WHERE data_saida = :data_saida");
        // amarra parametros
        $sth->bindParam(":data_saida", $data_saida, PDO::PARAM_STR);
        // executa query
        $sth->execute();
        // extrai resultados
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } catch(PDOException $e) {
        $e->getMessage();
      }
    }

    public static function buscarAluguelDataDevolucao($dbh) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT data_saida, data_devolucao, valor, multa, novas_avarias, status, veiculo_chassi, cliente_cpf FROM aluguel WHERE data_devolucao = :data_devolucao");
        // amarra parametros
        $sth->bindParam(":data_devolucao", $data_devolucao, PDO::PARAM_STR);
        // executa query
        $sth->execute();
        // extrai resultados
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } catch(PDOException $e) {
        $e->getMessage();
      }
    }

    public static function buscarAluguelCliente($dbh) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT data_saida, data_devolucao, valor, multa, novas_avarias, status, veiculo_chassi, cliente_cpf FROM aluguel WHERE id_cliente = :id_cliente");
        // amarra parametros
        $sth->bindParam(":chassis", $chassis, PDO::PARAM_STR);
        // executa query
        $sth->execute();
        // extrai resultados
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } catch(PDOException $e) {
        $e->getMessage();
      }
    }
	
	
    public static function retornaTodosAlugueis($dbh) {
      try {

        $sth = $dbh->prepare("SELECT data_saida, data_devolucao, valor, multa, novas_avarias, status, veiculo_chassi, cliente_cpf FROM emprestimo");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } catch(PDOException $e) {
        $e->getMessage();
      }
    }
  


   public function atualizaAluguel($dbh) {
              try {
                  $sth = $dbh->prepare("UPDATE aluguel SET data_saida = :data_saida, data_devolucao = :data_devolucao, valor = :valor, multa = :multa, novas_avarias = :novas_avarias, status = :status, veiculo_chassi = :veiculo_chassi, cliente_cpf = :cliente_cpf WHERE cliente_cpf = :cliente_cpf and veiculo_chassi = :veiculo_chassi");

                  $sth->bindParam(":data_saida", $this->data_saida, PDO::PARAM_STR);
                  $sth->bindParam(":data_devolucao", $this->data_devolucao, PDO::PARAM_STR);
                  $sth->bindParam(":valor", $this->valor, PDO::PARAM_INT);
                  $sth->bindParam(":multa", $this->multa, PDO::PARAM_INT);
                  $sth->bindParam(":novas_avarias", $this->novas_avarias, PDO::PARAM_BOOL);
                  $sth->bindParam(":status", $this->status, PDO::PARAM_STR);
                  $sth->bindParam(":veiculo_chassi", $this->id_veiculo, PDO::PARAM_INT);
                  $sth->bindParam(":cliente_cpf", $this->id_cliente, PDO::PARAM_INT);

                  return $sth->execute();

              } catch(PDOException $e) {
                  $e->getMessage();
              }
          }

   public function removeAluguel($dbh) {
              try {
                  $sth = $dbh->prepare("DELETE FROM aluguel WHERE  cliente_cpf = :cliente_cpf and veiculo_chassi = :veiculo_chassi");

                  

                  return $sth->execute();
                  
              } catch(PDOException $e) {
                  $e->getMessage();
              }
          }


  }

?>