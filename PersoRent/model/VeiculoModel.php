<?php
    require_once 'Database.php';
    
    class VeiculoModel {
        private $marca;
        private $modelo;
        private $ano;
        private $placa;
        private $odometro;
        private $chassi;
        private $cor;
        private $portas;
        private $arCondicionado;
        private $direcao;
        private $combustivel;
        private $potencia;
        private $avarias;
        private $status;

        public function __construct($dados) {
            $this->marca = $dados['marca'];
            $this->modelo = $dados['modelo'];
            $this->ano = $dados['ano'];
            $this->placa = $dados['placa'];
            $this->odometro = $dados['odometro'];
            $this->chassi = $dados['chassi'];
            $this->cor = $dados['cor'];
            $this->portas = $dados['portas'];
            $this->arCondicionado = $dados['arCondicionado'];
            $this->direcao = $dados['direcao'];
            $this->combustivel = $dados['combustivel'];
            $this->potencia = $dados['potencia'];
            $this->avarias = $dados['avarias'];
            $this->status = $dados['status'];
        }

        public function criaVeiculo($dbh) {
            try {
                $sth = $dbh->prepare("INSERT INTO veiculo(marca, modelo, ano, placa, odometro, chassi, cor, portas, arCondicionado, direcao, combustivel, potencia, avarias, status) VALUES(:marca, :modelo, :ano, :placa, :odometro, :chassi, :cor, :portas, :arCondicionado, :direcao, :combustivel, :potencia, :avarias, :status)");
                
                $sth->bindParam(":marca", $this->marca, PDO::PARAM_STR);
                $sth->bindParam(":modelo", $this->modelo, PDO::PARAM_STR);
                $sth->bindParam(":ano", $this->ano, PDO::PARAM_INT);
                $sth->bindParam(":placa", $this->placa, PDO::PARAM_STR);
                $sth->bindParam(":odometro", $this->odometro, PDO::PARAM_INT);
                $sth->bindParam(":chassi", $this->chassi, PDO::PARAM_STR);
                $sth->bindParam(":cor", $this->cor, PDO::PARAM_STR);
                $sth->bindParam(":portas", $this->portas, PDO::PARAM_INT);
                $sth->bindParam(":arCondicionado", $this->arCondicionado, PDO::PARAM_BOOL);
                $sth->bindParam(":direcao", $this->direcao, PDO::PARAM_BOOL);
                $sth->bindParam(":combustivel", $this->combustivel, PDO::PARAM_STR);
                $sth->bindParam(":potencia", $this->potencia, PDO::PARAM_STR);
                $sth->bindParam(":avarias", $this->avarias, PDO::PARAM_STR);
                $sth->bindParam(":status", $this->status, PDO::PARAM_BOOL);
                
                return $sth->execute();

            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public static function buscaVeiculoChassi($dbh, $chassi) {
            try {
                $sth = $dbh->prepare("SELECT marca, modelo, ano, placa, odometro, chassi, cor, portas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo WHERE chassi = :chassi");

                $sth->bindParam(":chassi", $chassi, PDO::PARAM_STR);
                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }


        public static function buscaVeiculoFiltros($dbh, $dados) {
            try {

                $consulta = "SELECT marca, modelo, ano, placa, odometro, cor, chassi, portas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo WHERE ";
                $existeParametros = false;

                if(isset($dados['marca'])){
                    $consulta .= "marca = :marca";
                    $existeParametros = true;
                }
                if(isset($dados['modelo'])){
                    if($existeParametros){
                         $consulta .= " AND modelo = :modelo";
                    } else{
                        $consulta .= "modelo = :modelo";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['ano'])){
                    if($existeParametros){
                         $consulta .= " AND ano = :ano";
                    }else {
                        $consulta .= "ano = :ano";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['placa'])){
                    if($existeParametros){
                         $consulta .= " AND placa = :placa";
                    } else {
                        $consulta .= "placa = :placa";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['portas'])){
                    if($existeParametros){
                         $consulta .= " AND portas = :portas";
                    } else {
                        $consulta .= "portas = :portas";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['arCondicionado'])){
                    if($existeParametros){
                         $consulta .= " AND arCondicionado = :arCondicionado";
                    } else {
                        $consulta .= "arCondicionado = :arCondicionado";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['direcao'])){
                    if($existeParametros){
                         $consulta .= " AND direcao = :direcao";
                    } else {
                        $consulta .= "direcao = :direcao";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['combustivel'])){
                    if($existeParametros){
                         $consulta .= " AND combustivel = :combustivel";
                    } else { 
                        $consulta .= "combustivel = :combustivel";
                        $existeParametros = true;
                    }
                }
                if(isset($dados['potencia'])){
                    if($existeParametros){
                         $consulta .= " AND potencia = :potencia";
                    } else {
                        $consulta .= "potencia = :potencia";
                        $existeParametros = true;
                    }
                }

                $consulta .= " AND status = :verdadeira";
                $status = true;

                $sth = $dbh->prepare($consulta);

                if(isset($dados['marca'])){
                     $sth->bindParam(":marca", $dados['marca'], PDO::PARAM_STR);
                }
                if(isset($dados['modelo'])){
                     $sth->bindParam(":modelo", $dados['modelo'], PDO::PARAM_STR);
                }
                if(isset($dados['ano'])){
                     $sth->bindParam(":ano", $dados['ano'], PDO::PARAM_INT);
                }
                if(isset($dados['placa'])){
                     $sth->bindParam(":placa", $dados['placa'], PDO::PARAM_STR);
                }
                if(isset($dados['portas'])){
                     $sth->bindParam(":portas", $dados['portas'], PDO::PARAM_INT);
                }
                if(isset($dados['arCondicionado'])){
                     $sth->bindParam(":arCondicionado", $dados['arCondicionado'], PDO::PARAM_BOOL);
                }
                if(isset($dados['direcao'])){
                     $sth->bindParam(":direcao", $dados['direcao'], PDO::PARAM_BOOL);
                }
                if(isset($dados['combustivel'])){
                     $sth->bindParam(":combustivel", $dados['combustivel'], PDO::PARAM_STR);
                }
                if(isset($dados['potencia'])){
                     $sth->bindParam(":potencia", $dados['potencia'], PDO::PARAM_STR);
                }

                $sth->bindParam(":verdadeira", $status, PDO::PARAM_BOOL);

               
                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }



        public static function retornaTodosVeiculos($dbh) {
            try {
                $sth = $dbh->prepare("SELECT marca, modelo, ano, placa, odometro, chassi, cor, portas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo");

                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
		
		
		 public function atualizaVeiculo($dbh, $marca, $modelo, $ano, $placa, $odometro, $cor, $portas, $arCondicionado, $direcao, $combustivel, $potencia, $avarias, $chassi) {
            try {
                $sth = $dbh->prepare("UPDATE veiculo SET marca = :marca, modelo = :modelo, ano = :ano, placa = :placa, odometro = :odometro, cor = :cor, portas = :portas, arCondicionado = :arCondicionado, direcao = :direcao, combustivel = :combustivel, potencia = :potencia, avarias = :avarias WHERE chassi = :chassi");


                $atualizar = "UPDATE veiculo SET ";
                $atualizarWhere = " WHERE chassi = :chassi";            

                if(isset($marca)){
                    $atualizar = "marca = :marca";
                    $existeParametros = true;
                }
                if(isset($modelo)){
                    if($existeParametros){
                         $atualizar .= ", modelo = :modelo";
                    } else {
                        $atualizar .= "modelo = :modelo";
                        $existeParametros = true;
                    }
                }
                if(isset($ano)){
                    if($existeParametros){
                         $atualizar .= ", ano = :ano";
                    } else {
                        $atualizar .= "ano = :ano";
                        $existeParametros = true;
                    }
                }
                if(isset($placa)){
                    if($existeParametros){
                         $atualizar .= ", placa = :placa";
                    } else {
                        $atualizar .= "placa = :placa";
                        $existeParametros = true;
                    }
                }
                if(isset($odometro)){
                    if($existeParametros){
                         $atualizar .= ", odometro = :odometro";
                    } else {
                        $atualizar .= "odometro = :odometro";
                        $existeParametros = true;
                    }
                }
                if(isset($cor)){
                    if($existeParametros){
                         $atualizar .= ", cor = :cor";
                    } else {
                        $atualizar .= "cor = :cor";
                        $existeParametros = true;
                    }
                }
                if(isset($portas)){
                    if($existeParametros){
                         $atualizar .= ", portas = :portas";
                    } else {
                        $atualizar .= "portas = :portas";
                        $existeParametros = true;
                    }
                }
                if(isset($arCondicionado)){
                    if($existeParametros){
                         $atualizar .= ", arCondicionado = :arCondicionado";
                    } else {
                        $atualizar .= "arCondicionado = :arCondicionado";
                        $existeParametros = true;
                    }
                }
                if(isset($direcao)){
                    if($existeParametros){
                         $atualizar .= ", direcao = :direcao";
                    } else {
                        $atualizar .= "direcao = :direcao";
                        $existeParametros = true;
                    }
                }
                if(isset($combustivel)){
                    if($existeParametros){
                         $atualizar .= ", combustivel = :combustivel";
                    } else {
                        $atualizar .= "combustivel = :combustivel";
                        $existeParametros = true;
                    }
                }
                if(isset($potencia)){
                    if($existeParametros){
                         $atualizar .= ", potencia = :potencia";
                    } else {
                        $atualizar .= "potencia = :potencia";
                        $existeParametros = true;
                    }
                }
                if(isset($avarias)){
                    if($existeParametros){
                         $atualizar .= ", avarias = :avarias";
                    }else {
                        $atualizar .= "avarias = :avarias";
                    }
                }

                $consulta = $atualizar .$atualizarWhere;


                $sth = $dbh->prepare($consulta);

                if(isset($marca)){
                     $sth->bindParam(":marca", $this->marca, PDO::PARAM_STR);
                }
                if(isset($modelo)){
                    $sth->bindParam(":modelo", $this->modelo, PDO::PARAM_STR);
                }
                if(isset($ano)){
                     $sth->bindParam(":ano", $this->ano, PDO::PARAM_INT);
                }
                if(isset($placa)){
                    $sth->bindParam(":placa", $this->placa, PDO::PARAM_STR);
                }
                if(isset($odometro)){
                    $sth->bindParam(":odometro", $this->odometro, PDO::PARAM_INT);
                }
                if(isset($cor)){
                    $sth->bindParam(":cor", $this->cor, PDO::PARAM_STR);
                }
                if(isset($portas)){
                      $sth->bindParam(":portas", $this->portas, PDO::PARAM_INT);
                }
                if(isset($arCondicionado)){
                     $sth->bindParam(":arCondicionado", $this->arCondicionado, PDO::PARAM_BOOL);
                }
                if(isset($direcao)){
                     $sth->bindParam(":direcao", $this->direcao, PDO::PARAM_BOOL);
                }
                if(isset($combustivel)){
                      $sth->bindParam(":combustivel", $this->combustivel, PDO::PARAM_STR);
                }
                if(isset($potencia)){
                     $sth->bindParam(":potencia", $this->potencia, PDO::PARAM_STR);
                }
                if(isset($avarias)){
                   $sth->bindParam(":avarias", $this->avarias, PDO::PARAM_STR);
                }

                $sth->bindParam(":chassi", $this->chassi, PDO::PARAM_STR);
                return $sth->execute();

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function removeVeiculo($dbh, $chassi) {
            try {
                $sth = $dbh->prepare("DELETE FROM veiculo WHERE chassi = :chassi");
                $sth->bindParam(":chassi", $chassi, PDO::PARAM_STR);

                return $sth->execute();
                
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
		
		
		
    }

?>