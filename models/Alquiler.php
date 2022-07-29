<?php

    class Alquiler extends Conectar {

        public function get_alquileres(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM alquiler";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_alquiler($codigo_de_libro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM alquiler where codigo_de_libro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigo_de_libro);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_alquiler ($codigo_de_libro, $nombre_libro, $fecha_de_alquiler, $nombre_cliente, $direccion, $dias_a_alquilar, $precio_alquiler){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO alquiler(codigo_de_libro, nombre_libro, fecha_de_alquiler, nombre_cliente, direccion, dias_a_alquilar, precio_alquiler)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigo_de_libro);
            $sql->bindValue(2, $nombre_libro);
            $sql->bindValue(3, $fecha_de_alquiler);
            $sql->bindValue(4, $nombre_cliente);
            $sql->bindValue(5, $direccion);
            $sql->bindValue(6, $dias_a_alquilar);
            $sql->bindValue(7, $precio_alquiler);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function update_alquiler ($codigo_de_libro, $nombre_libro, $fecha_de_alquiler, $nombre_cliente, $direccion, $dias_a_alquilar, $precio_alquiler){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE alquiler set nombre_libro=?, fecha_de_alquiler=?, nombre_cliente=?, direccion=?, dias_a_alquilar=?, precio_alquiler=? where codigo_de_libro=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_libro);
            $sql->bindValue(2, $fecha_de_alquiler);
            $sql->bindValue(3, $nombre_cliente);
            $sql->bindValue(4, $direccion);
            $sql->bindValue(5, $dias_a_alquilar);
            $sql->bindValue(6, $precio_alquiler);
            $sql->bindValue(7, $codigo_de_libro);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function delete_alquiler($codigo_de_libro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM alquiler where codigo_de_libro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigo_de_libro);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>
