<?php

    class Editorial extends Conectar {

        public function get_editoriales(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM editorial ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_editorial($numero_editorial){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM editorial where numero_editorial = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numero_editorial);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_editorial ($numero_editorial, $nombre_editorial, $direccion, $pais, $fecha_de_fundacion, $cantidad_de_libros_impresos, $numero_de_telefono){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO editorial(nombre_editorial, direccion, pais, fecha_de_fundacion, cantidad_de_libros_impresos, numero_de_telefono,numero_editorial)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_editorial);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $pais);
            $sql->bindValue(4, $fecha_de_fundacion);
            $sql->bindValue(5, $cantidad_de_libros_impresos);
            $sql->bindValue(6, $numero_de_telefono);
            $sql->bindValue(7, $numero_editorial);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);            
        }

        public function update_editorial($numero_editorial, $nombre_editorial, $direccion, $pais, $fecha_de_fundacion, $cantidad_de_libros_impresos, $numero_de_telefono){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE editorial SET nombre_editorial = ?, direccion = ?, pais = ?, fecha_de_fundacion = ?, cantidad_de_libros_impresos = ?, numero_de_telefono = ?
                    WHERE numero_editorial = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_editorial);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $pais);
            $sql->bindValue(4, $fecha_de_fundacion);
            $sql->bindValue(5, $cantidad_de_libros_impresos);
            $sql->bindValue(6, $numero_de_telefono);
            $sql->bindValue(7, $numero_editorial);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function delete_editorial($numero_editorial){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM editorial where numero_editorial = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numero_editorial);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);            
        }
    }
?>
