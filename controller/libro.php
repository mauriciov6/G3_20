<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
        header('Access-Control-Allow-Origin: *');  
        header('Content-Type: application/json');

        require_once("../config/conexion.php");
        require_once("../models/Libro.php");

        $libro = new Libro();

        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["opc"]){
           
            case "GetLibros":
                $datos=$libro->get_libros();
                echo json_encode($datos);
            break;

            case "GetLibro":
                $datos=$libro->get_libro($body["codigo_de_libro"]);

                if ($datos==null){
                    print"El código de libro no existe";
                }
                else{
                    echo json_encode($datos);
                }
                
            break;

            case "InsertLibro";
                $datos=$libro->insert_libro($body["codigo_de_libro"], $body["nombre_libro"], $body["escritor_libro"], $body["fecha_publicacion"], $body["isbn"], $body["precio"], $body["editorial"]);
                echo json_encode("Libro Agregado");
            break;
            
            case "UpdateLibro";
                $datos=$libro->update_libro($body["codigo_de_libro"], $body["nombre_libro"], $body["escritor_libro"], $body["fecha_publicacion"], $body["isbn"], $body["precio"], $body["editorial"]);
                echo json_encode("Libro Actualizado");
            break;  

            case "DeleteLibro":
                $datos=$libro->delete_libro($body["codigo_de_libro"]);
                echo json_encode("Libro Eliminado");
            break;            
        }
?>