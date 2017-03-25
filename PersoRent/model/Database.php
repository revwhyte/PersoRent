<?php

    class Database{
        public function conectar() {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=persorent","root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return $conn;
        }

        public function desconectar() {
            return null;
        }

    }

?>
