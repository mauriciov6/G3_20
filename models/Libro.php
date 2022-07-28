<?php

    class Libro extends Conectar {

        public function get_libros(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_libro($codigo_de_libro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro where codigo_de_libro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigo_de_libro);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_libro ($codigo_de_libro, $nombre_libro, $escritor_libro, $fecha_publicacion, $isbn, $precio, $editorial){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO libro(codigo_de_libro, nombre_libro, escritor_libro, fecha_publicacion, isbn, precio, editorial)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigo_de_libro);
            $sql->bindValue(2, $nombre_libro);
            $sql->bindValue(3, $escritor_libro);
            $sql->bindValue(4, $fecha_publicacion);
            $sql->bindValue(5, $isbn);
            $sql->bindValue(6, $precio);
            $sql->bindValue(7, $editorial);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);            
        }

        public function update_libro($codigo_de_libro, $nombre_libro, $escritor_libro, $fecha_publicacion, $isbn, $precio, $editorial){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE libro SET nombre_libro = ?, escritor_libro = ?, fecha_publicacion = ?, isbn = ?, precio = ?, editorial = ?
                    WHERE codigo_de_libro = ?;";
            $sql=$conectar->prepare($sql);            
            $sql->bindValue(1, $nombre_libro);
            $sql->bindValue(2, $escritor_libro);
            $sql->bindValue(3, $fecha_publicacion);
            $sql->bindValue(4, $isbn);
            $sql->bindValue(5, $precio);
            $sql->bindValue(6, $editorial);
            $sql->bindValue(7, $codigo_de_libro);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function delete_libro($codigo_de_libro){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM libro where codigo_de_libro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigo_de_libro);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);            
        }
    }
?>