<?php
    require_once('Database.php');

    class VeiculoModel {
        private $marca;
        private $modelo;
        private $ano;
        private $placa;
        private $odometro;
        private $chassi;
        private $cor;
        private $qtdPortas;
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
            $this->qtdPortas = $dados['qtdPortas'];
            $this->arCondicionado = $dados['arCondicionado'];
            $this->direcao = $dados['direcao'];
            $this->combustivel = $dados['combustivel'];
            $this->potencia = $dados['potencia'];
            $this->avarias = $dados['avarias'];
            $this->status = $dados['status'];
        }

        public function criarVeiculo($dbh) {
            try {
                $sth = $dbh->prepare("INSERT INTO veiculo(marca, modelo, ano, placa, odometro, chassi, cor, qtdPortas, arCondicionado, direcao, combustivel, potencia, avarias, status) VALUES(:marca, :modelo, :ano, :placa, :odometro, :chassi, :cor, :qtdPortas, :arCondicionado, :direcao, :combustivel, :potencia, :avarias, :status)");
                
                $sth->bindParam(":marca", $this->marca, PDO::PARAM_STR);
                $sth->bindParam(":modelo", $this->modelo, PDO::PARAM_STR);
                $sth->bindParam(":ano", $this->ano, PDO::PARAM_INT);
                $sth->bindParam(":placa", $this->placa, PDO::PARAM_STR);
                $sth->bindParam(":odometro", $this->odometro, PDO::PARAM_LOB);
                $sth->bindParam(":chassi", $this->chassi, PDO::PARAM_STR);
                $sth->bindParam(":cor", $this->cor, PDO::PARAM_STR);
                $sth->bindParam(":qtdPortas", $this->qtdPortas, PDO::PARAM_INT);
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

        // busca veiculo pelo chassi
        public static function buscarVeiculoChassi($dbh, $chassi) {
            try {
                $sth = $dbh->prepare("SELECT marca, modelo, ano, placa, odometro, chassi, qtdPortas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo WHERE chassi = :chassi");

                $sth->bindParam(":chassi", $chassi, PDO::PARAM_STR);
                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }

        public static function retornaTodosVeiculos($dbh) {
            try {
                $sth = $dbh->prepare("SELECT marca, modelo, ano, placa, odometro, chassi, cor, qtdPortas, arCondicionado, direcao, combustivel, potencia, avarias, status FROM veiculo");

                $sth->execute();

                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                return $result;
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>