<?php

class Escritors extends Conectar{

    public function get_escritors(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM escritor";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_escritor($Numero_Escritor){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM escritor where Numero_Escritor = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Numero_Escritor);            
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_escritor($Numero_Escritor, $Nombre_Escritor, $Apellidos, $Fecha_De_Nacimiento, $Nacionalidad, $Cantidad_Libros_Escritos, $Email){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO Escritor(Numero_Escritor, Nombre_Escritor, Apellidos, Fecha_De_Nacimiento, Nacionalidad, Cantidad_Libros_Escritos, Email)
        VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Numero_Escritor);
        $sql->bindValue(2, $Nombre_Escritor);
        $sql->bindValue(3, $Apellidos);
        $sql->bindValue(4, $Fecha_De_Nacimiento);
        $sql->bindValue(5, $Nacionalidad);
        $sql->bindValue(6, $Cantidad_Libros_Escritos);
        $sql->bindValue(7, $Email);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function update_escritor($Numero_Escritor, $Nombre_Escritor, $Apellidos, $Fecha_De_Nacimiento, $Nacionalidad, $Cantidad_Libros_Escritos, $Email){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE escritor SET   Nombre_Escritor = ?, Apellidos = ?, Fecha_De_Nacimiento = ?, Nacionalidad = ?, Cantidad_Libros_Escritos = ?, Email= ?
              WHERE Numero_Escritor = ?;";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1, $Nombre_Escritor);
        $sql->bindValue(2, $Apellidos);
        $sql->bindValue(3, $Fecha_De_Nacimiento);
        $sql->bindValue(4, $Nacionalidad);
        $sql->bindValue(5, $Cantidad_Libros_Escritos);
        $sql->bindValue(6, $Email);
        $sql->bindValue(7, $Numero_Escritor);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_escritor($Numero_Escritor){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="DELETE FROM escritor where Numero_Escritor = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Numero_Escritor);            
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);            
    }
}
?>