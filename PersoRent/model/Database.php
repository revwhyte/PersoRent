<?php

    class Database {
        static function conectar() {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=persorent","root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }

            return $conn;
        }

        static function desconectar() {
            return null;
        }

    }

?>
