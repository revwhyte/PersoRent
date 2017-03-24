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
	
    public function atualizaVeiculo($dbh, $veiculo){
	      
	    $inicio = "UPDATE veiculo set ";
	    $meio = "";
	    
	    if(isset($veiculo['marca'])){
	    	$meio.="marca = :marca";
	    }
	    if(isset($veiculo['modelo'])){
	    	$meio.=",modelo = :modelo";
	    }
		if(isset($veiculo['ano'])){
	    	$meio.=",ano = :ano";
	    }
		if(isset($veiculo['placa'])){
	    	$meio.=",placa = :placa";
	    }
		if(isset($veiculo['avarias'])){
	    	$meio.=",avarias = :avarias";
	    }
		if(isset($veiculo['cor'])){
	    	$meio.=",cor = :cor";
	    }
		if(isset($veiculo['qtdPortas'])){
	    	$meio.=",qtdPortas = :qtdPortas";
	    }
		if(isset($veiculo['arCondicionado'])){
	    	$meio.=",arCondicionado = :arCondicionado";
	    }
		if(isset($veiculo['direcao'])){
	    	$meio.=",direcao = :direcao";
	    }
		if(isset($veiculo['combustivel'])){
	    	$meio.=",combustivel = :combustivel";
	    }
		if(isset($veiculo['chassis'])){
	    	$meio.=",chassis = :chassis";
	    }
		if(isset($veiculo['status'])){
	    	$meio.=",status = :status";
	    }
		if(isset($veiculo['potencia'])){
	    	$meio.=",potencia = :potencia";
	    }
	    $fim = "WHERE id = :id";
	    $query = $inicio . $meio . $fim;
		
		
		$sth = $dbh->prepare($query);
		
		$sth->bindParam(":marca", $veiculo->marca, PDO::PARAM_STR);
        $sth->bindParam(":modelo", $veiculo->modelo, PDO::PARAM_STR);
        $sth->bindParam(":ano", $veiculo->ano, PDO::PARAM_INT);
        $sth->bindParam(":placa", $veiculo->placa, PDO::PARAM_STR);
	    $sth->bindParam(":odometro", $veiculo->odometro, PDO::PARAM_LOB);
        $sth->bindParam(":cor", $veiculo->cor, PDO::PARAM_STR);
	    $sth->bindParam(":avarias", $veiculo->avarias, PDO::PARAM_STR);
        $sth->bindParam(":qtdPortas", $veiculo->qtdPortas, PDO::PARAM_INT);
	    $sth->bindParam(":arCondicionado", $veiculo->arCondicionado, PDO::PARAM_BOOL);
        $sth->bindParam(":direcao", $veiculo->direcao, PDO::PARAM_BOOL);
	    $sth->bindParam(":combustivel", $veiculo->combustivel, PDO::PARAM_STR);
        $sth->bindParam(":chassis", $veiculo->chassis, PDO::PARAM_STR);
	    $sth->bindParam(":status", $veiculo->status, PDO::PARAM_BOOL);
        $sth->bindParam(":potencia", $veiculo->potencia, PDO::PARAM_STR);
		
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
