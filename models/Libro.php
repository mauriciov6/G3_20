<?php

    class Libro extends Conectar {

        public function get_libros(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro ";
            $sql=$conectar->prepare($sql);
            $sql->excute();
            return $resultado=$sql->fetchAll(PDO::FECH_ASSOC);
        }

        public function get_libro($codigo_de_libro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro where codigo_de_libro = ?";
            $sql=$conectar->prepare($sql);
            $sql->binValue(1, $codigo_de_libro);            
            $sql->excute();
            return $resultado=$sql->fetchAll(PDO::FECH_ASSOC);
        }

        public function insert_libro ($codigo_de_libro, $nombre_libro, $escritor_libro, $fecha_publicacion, $isbn, $precio, $editorial){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO libro(codigo_de_libro, nombre_libro, escritor_libro, fecha_publicacion, isbn, precio, editorial)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->binValue(1, $codigo_de_libro);
            $sql->binValue(2, $nombre_libro);
            $sql->binValue(3, $escritor_libro);
            $sql->binValue(4, $fecha_publicacion);
            $sql->binValue(5, $isbn);
            $sql->binValue(6, $precio);
            $sql->binValue(7, $editorial);
            $sql->excute();
            return $resultado=$sql->fetchAll(PDO::FECH_ASSOC);            
        }

        public function update_libro($codigo_de_libro, $nombre_libro, $escritor_libro, $fecha_publicacion, $isbn, $precio, $editorial){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE libro SET nombre_libro = ?, escritor_libro = ?, fecha_publicacion = ?, isbn = ?, precio = ?, editorial = ?
                    WHERE codigo_de_libro = ?;";
            $sql=$conectar->prepare($sql);
            $sql->binValue(1, $codigo_de_libro);
            $sql->binValue(2, $nombre_libro);
            $sql->binValue(3, $escritor_libro);
            $sql->binValue(4, $fecha_publicacion);
            $sql->binValue(5, $isbn);
            $sql->binValue(6, $precio);
            $sql->binValue(7, $editorial);
            $sql->excute();
            return $resultado=$sql->fetchAll(PDO::FECH_ASSOC);
        }

        public function delete_libro($codigo_de_libro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM libro where codigo_de_libro = ?";
            $sql=$conectar->prepare($sql);
            $sql->binValue(1, $codigo_de_libro);            
            $sql->excute();
            return $resultado=$sql->fetchAll(PDO::FECH_ASSOC);
            
        }
    }
?>