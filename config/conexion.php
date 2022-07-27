<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g3_20", "G3_20", "tfc4C852");
                return $conectar;
            } catch (exception $e){
                print "Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>