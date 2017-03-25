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
                $sth = $dbh->prepare("SELECT marca, modelo, ano, placa, odometro, chassi, portas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo WHERE chassi = :chassi");

                $sth->bindParam(":chassi", $chassi, PDO::PARAM_STR);
                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;

            } catch(PDOException $e) {
                $e->getMessage();
            }
        }


        public static function buscaVeiculoFiltros($dbh, $marca, $modelo, $ano, $placa, $portas, $arCondicionado, $direcao, $combustivel, $potencia) {
            try {

                $consulta = "SELECT marca, modelo, ano, placa, odometro, chassi, portas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo WHERE ";
                $filtroMarca = "";
                $filtroModelo = "";
                $filtroAno = "";
                $filtroPlaca = "";
                $filtroPortas = "";
                $filtroArCondicionado = "";
                $filtroDirecao = "";
                $filtroCombustivel = "";
                $filtroPotencia = "";
                $existeParametros = false;

                if(isset($marca)){
                    $filtroMarca = "marca = :marca";
                    $existeParametros = true;
                }
                if(isset($modelo)){
                    if($existeParametros){
                         $filtroModelo = "AND modelo = :modelo";
                         break;
                    }
                    $filtroModelo = "modelo = :modelo";
                    $existeParametros = true;
                }
                if(isset($ano)){
                    if($existeParametros){
                         $filtroModelo = "AND ano = :ano";
                         break;
                    }
                    $filtroAno = "ano = :ano";
                    $existeParametros = true;
                }
                if(isset($placa)){
                    if($existeParametros){
                         $filtroPlaca = "AND placa = :placa";
                         break;
                    }
                    $filtroPlaca = "placa = :placa";
                    $existeParametros = true;
                }
                if(isset($portas)){
                    if($existeParametros){
                         $filtroPortas = "AND portas = :portas";
                         break;
                    }
                    $filtroPortas = "portas = :portas";
                    $existeParametros = true;
                }
                if(isset($arCondicionado)){
                    if($existeParametros){
                         $filtroArCondicionado = "AND arCondicionado = :arCondicionado";
                         break;
                    }
                    $filtroArCondicionado = "arCondicionado = :arCondicionado";
                    $existeParametros = true;
                }
                if(isset($direcao)){
                    if($existeParametros){
                         $filtroDirecao = "AND direcao = :direcao";
                         break;
                    }
                    $filtroDirecao = "direcao = :direcao";
                    $existeParametros = true;
                }
                if(isset($combustivel)){
                    if($existeParametros){
                         $filtroCombustivel = "AND combustivel = :combustivel";
                         break;
                    }
                    $filtroCombustivel = "combustivel = :combustivel";
                    $existeParametros = true;
                }
                if(isset($potencia)){
                    if($existeParametros){
                         $filtroPotencia = "AND potencia = :potencia";
                         break;
                    }
                    $filtroPotencia = "potencia = :potencia";
                    $existeParametros = true;
                }

                $consulta .= .$filtroMarca .$filtroModelo .$filtroAno .$filtroPlaca .$filtroPortas .$filtroArCondicionado .$filtroDirecao .$filtroCombustivel .$filtroPotencia;


                $sth = $dbh->prepare($consulta);

                if(isset($marca)){
                     $sth->bindParam(":marca", $marca, PDO::PARAM_STR);
                }
                if(isset($modelo)){
                     $sth->bindParam(":modelo", $marca, PDO::PARAM_STR);
                }
                if(isset($ano)){
                     $sth->bindParam(":ano", $marca, PDO::PARAM_INT);
                }
                if(isset($placa)){
                     $sth->bindParam(":placa", $marca, PDO::PARAM_STR);
                }
                if(isset($portas)){
                     $sth->bindParam(":portas", $marca, PDO::PARAM_INT);
                }
                if(isset($arCondicionado)){
                     $sth->bindParam(":arCondicionado", $marca, PDO::PARAM_BOOL);
                }
                if(isset($direcao)){
                     $sth->bindParam(":direcao", $marca, PDO::PARAM_BOOL);
                }
                if(isset($combustivel)){
                     $sth->bindParam(":combustivel", $marca, PDO::PARAM_STR);
                }
                if(isset($potencia)){
                     $sth->bindParam(":potencia", $marca, PDO::PARAM_STR);
                }

               
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
                $sth = $dbh->prepare("UPDATE veiculo SET marca = :marca, modelo = :modelo, ano = :ano, placa = :placa, odometro = :odometro, cor = :cor, portas = :portas, arCondicionado = :arCondicionado, direcao = :direcao, combustivel = :combustivel, potencia = :potencia, avarias = :avarias, status = :status WHERE chassi = :chassi");


                $atualizar = "UPDATE veiculo SET ";
                $atualizarWhere = "WHERE chassi = :chassi"
                $filtroMarca = "";
                $filtroModelo = "";
                $filtroAno = "";
                $filtroPlaca = "";
                $filtroOdometro = "";
                $filtroCor = "";
                $filtroPortas = "";
                $filtroArCondicionado = "";
                $filtroDirecao = "";
                $filtroCombustivel = "";
                $filtroPotencia = "";
                $filtroAvarias = "";
                $existeParametros = false;

                if(isset($marca)){
                    $filtroMarca = "marca = :marca";
                    $existeParametros = true;
                }
                if(isset($modelo)){
                    if($existeParametros){
                         $filtroModelo = ", modelo = :modelo";
                         break;
                    }
                    $filtroModelo = "modelo = :modelo";
                    $existeParametros = true;
                }
                if(isset($ano)){
                    if($existeParametros){
                         $filtroAno = ", ano = :ano";
                         break;
                    }
                    $filtroAno = "ano = :ano";
                    $existeParametros = true;
                }
                if(isset($placa)){
                    if($existeParametros){
                         $filtroPlaca = ", placa = :placa";
                         break;
                    }
                    $filtroPlaca = "placa = :placa";
                    $existeParametros = true;
                }
                if(isset($odometro)){
                    if($existeParametros){
                         $filtroOdometro = ", odometro = :odometro";
                         break;
                    }
                    $filtroOdometro = "odometro = :odometro";
                    $existeParametros = true;
                }
                if(isset($cor)){
                    if($existeParametros){
                         $filtroCor = ", cor = :cor";
                         break;
                    }
                    $filtroCor = "cor = :cor";
                    $existeParametros = true;
                }
                if(isset($portas)){
                    if($existeParametros){
                         $filtroPortas = ", portas = :portas";
                         break;
                    }
                    $filtroPortas = "portas = :portas";
                    $existeParametros = true;
                }
                if(isset($arCondicionado)){
                    if($existeParametros){
                         $filtroArCondicionado = ", arCondicionado = :arCondicionado";
                         break;
                    }
                    $filtroArCondicionado = "arCondicionado = :arCondicionado";
                    $existeParametros = true;
                }
                if(isset($direcao)){
                    if($existeParametros){
                         $filtroDirecao = ", direcao = :direcao";
                         break;
                    }
                    $filtroDirecao = "direcao = :direcao";
                    $existeParametros = true;
                }
                if(isset($combustivel)){
                    if($existeParametros){
                         $filtroCombustivel = ", combustivel = :combustivel";
                         break;
                    }
                    $filtroCombustivel = "combustivel = :combustivel";
                    $existeParametros = true;
                }
                if(isset($potencia)){
                    if($existeParametros){
                         $filtroPotencia = ", potencia = :potencia";
                         break;
                    }
                    $filtroPotencia = "potencia = :potencia";
                    $existeParametros = true;
                }
                if(isset($avarias)){
                    if($existeParametros){
                         $filtroAvarias = ", avarias = :avarias";
                         break;
                    }
                    $filtroAvarias = "avarias = :avarias";
                }

                $consulta .= .$filtroMarca .$filtroModelo .$filtroAno .$filtroPlaca .$filtroOdometro .$filtroCor .$filtroPortas .$filtroArCondicionado .$filtroDirecao .$filtroCombustivel .$filtroPotencia .$filtroAvarias .$atualizarWhere;


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

        public static function removeVeiculo($dbh) {
            try {
                $sth = $dbh->prepare("DELETE FROM veiculo WHERE chassi = :chassi");

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
                
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
		
		
		
    }

?>