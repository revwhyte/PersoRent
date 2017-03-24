<?php

   require_once('Database.php');

  class VeiculoModel {
	  
    private $marca;
    private $modelo;
	private $ano;
    private $placa;
	private $odometro;
    private $cor;
	private $avarias;
    private $qtdPortas;
	private $arCondicionado;
    private $direcao;
	private $combustivel;
    private $chassis;
	private $status;
    private $potencia;

		
    public function __construct($dados) {
      $this->marca = $dados['vc_marca'];
      $this->modelo = $dados['vc_modelo'];
	  $this->ano = $dados['vc_ano'];
      $this->placa = $dados['vc_placa'];
	  $this->odometro = $dados['vc_odometro'];
      $this->cor = $dados['vc_cor'];
	  $this->avarias = $dados['vc_avarias'];
      $this->qtdPortas = $dados['vc_qtdPortas'];
	  $this->arCondicionado = $dados['vc_arCondicionado'];
      $this->direcao = $dados['vc_direcao'];
	  $this->combustivel = $dados['vc_combustivel'];
	  $this->chassis = $dados['vc_chassis'];
	  $this->status = $dados['vc_status'];
	  $this->potencia = $dados['vc_potencia'];
    }
    
    public function criarVeiculo($dbh) {
      try {
        // cria string de query
        $sth = $dbh->prepare("INSERT INTO veiculo(vc_marca, vc_modelo, vc_ano, vc_placa, vc_odometro, vc_cor, vc_avarias, vc_qtdPortas, vc_arCondicionado, vc_direcao, vc_combustivel, vc_chassis, vc_status, vc_potencia) VALUES(:marca, :modelo, :ano, :placa, :odometro, :cor, :avarias, :qtdPortas, :arCondicionado, :direcao, :combustivel, :chassis, :status, :potencia)");
		
        
        $sth->bindParam(":marca", $this->marca, PDO::PARAM_STR);
        $sth->bindParam(":modelo", $this->modelo, PDO::PARAM_STR);
        $sth->bindParam(":ano", $this->ano, PDO::PARAM_INT);
        $sth->bindParam(":placa", $this->placa, PDO::PARAM_STR);
	    $sth->bindParam(":odometro", $this->odometro, PDO::PARAM_LOB);
        $sth->bindParam(":cor", $this->cor, PDO::PARAM_STR);
	    $sth->bindParam(":avarias", $this->avarias, PDO::PARAM_STR);
        $sth->bindParam(":qtdPortas", $this->qtdPortas, PDO::PARAM_INT);
	    $sth->bindParam(":arCondicionado", $this->arCondicionado, PDO::PARAM_BOOL);
        $sth->bindParam(":direcao", $this->direcao, PDO::PARAM_BOOL);
	    $sth->bindParam(":combustivel", $this->combustivel, PDO::PARAM_STR);
        $sth->bindParam(":chassis", $this->chassis, PDO::PARAM_STR);
	    $sth->bindParam(":status", $this->status, PDO::PARAM_BOOL);
        $sth->bindParam(":potencia", $this->potencia, PDO::PARAM_STR);
	   	   
        return $sth->execute();
      } catch (PDOException $e) {
        $e->getMessage();
      }
    }
	
	 // busca veiculo pelo chassi
    public static function buscarVeiculoChassi($dbh, $chassi) {
      try {
        //string de query
        $sth = $dbh->prepare("SELECT vc_marca, vc_modelo, vc_ano, vc_placa, vc_odometro, vc_cor, vc_avarias, vc_qtdPortas, vc_arCondicionado, vc_direcao, vc_combustivel, vc_chassis, vc_status, vc_potencia FROM pesagem WHERE vc_chassis = :chassis");
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
	
	
	
	
	
       // retorna todos os veiculos
    public static function retornaTodosVeiculos($dbh) {
      try {

        $sth = $dbh->prepare("SELECT vc_marca, vc_modelo, vc_ano, vc_placa, vc_odometro, vc_cor, vc_avarias, vc_qtdPortas, vc_arCondicionado, vc_direcao, vc_combustivel, vc_chassis, vc_status, vc_potencia FROM veiculo");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      } catch(PDOException $e) {
        $e->getMessage();
      }
    }
  }







?>