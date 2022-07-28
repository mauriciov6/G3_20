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
    require_once("../models/Escritor.php");

    $escritor = new Escritors();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["opc"]){

        case "GetEscritors":
            $datos=$escritor->get_escritors();
            echo json_encode($datos);
            break;

        case "GetEscritor":
            $datos=$escritor->get_escritor($body["Numero_Escritor"]);
            echo json_encode($datos);
            break;

        case "InsertEscritor":
            $datos=$escritor->insert_escritor($body["Numero_Escritor"],$body["Nombre_Escritor"],$body["Apellidos"],$body["Fecha_De_Nacimiento"],$body["Nacionalidad"],$body["Cantidad_Libros_Escritos"],$body["Email"]);
            echo json_encode("Escritor Agregado");
            break;

        case "UpdateEscritor":
            $datos=$escritor->update_escritor($body["Numero_Escritor"],$body["Nombre_Escritor"],$body["Apellidos"],$body["Fecha_De_Nacimiento"],$body["Nacionalidad"],$body["Cantidad_Libros_Escritos"],$body["Email"]);
            echo json_encode("Escritor Actualizado");
            break;

         case "DeleteEscritor":  
            $datos=$escritor->delete_escritor($body["Numero_Escritor"]);
            echo json_encode("Escritor Eliminado");
            break;
  
    }
?>