<?php

   require_once('Database.php');

  class EmprestimoModel {
	  
    private $dataSaida;
    private $dataDevolucao;
	private $valorEmprestimo;
    private $multa;
	private $status;
    private $novasAvarias;


		
    public function __construct($dados) {
      $this->dataSaida = $dados['ep_dataSaida'];
      $this->dataDevolucao = $dados['ep_dataDevolucao'];
	  $this->valorEmprestimo = $dados['ep_valorEmprestimo'];
      $this->multa = $dados['ep_multa'];
	  $this->status = $dados['ep_status'];
      $this->novasAvarias = $dados['ep_novasAvarias'];
	 
    }
    
    public function criarVeiculo($dbh) {
      try {
        // cria string de query
        $sth = $dbh->prepare("INSERT INTO emprestimo(ep_dataSaida, ep_dataDevolucao, ep_multa, ep_status, ep_novasAvarias) VALUES (:marca, :dataSaida, :dataDevolucao, :valorEmprestimo, :multa, :status, :novasAvarias)");
		
        
        $sth->bindParam(":dataSaida", $this->dataSaida, PDO::PARAM_STR);
        $sth->bindParam(":dataDevolucao", $this->dataDevolucao, PDO::PARAM_STR);
        $sth->bindParam(":valorEmprestimo", $this->valorEmprestimo, PDO::PARAM_LOB);
        $sth->bindParam(":multa", $this->multa, PDO::PARAM_LOB);
	    $sth->bindParam(":status", $this->status, PDO::PARAM_BOOL);
        $sth->bindParam(":novasAvarias", $this->novasAvarias, PDO::PARAM_STR);
	    	   	   
        return $sth->execute();
      } catch (PDOException $e) {
        $e->getMessage();
      }
    }
	
	 // busca emprestimo ainda definir campo
    public static function buscarEmprestimo($dbh, $) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT ep_dataSaida, ep_dataDevolucao, ep_multa, ep_status, ep_novasAvarias FROM emprestimo WHERE vc_chassis = :chassis");
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
	
	
	
	
	
       // retorna todos os emprestimos
    public static function retornaTodosEmprestimos($dbh) {
      try {

        $sth = $dbh->prepare("SELECT ep_dataSaida, ep_dataDevolucao, ep_multa, ep_status, ep_novasAvarias FROM emprestimo");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } catch(PDOException $e) {
        $e->getMessage();
      }
    }
  }







?>