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
    require_once("../models/Editorial.php");

    $editorial = new Editorial();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["opc"]){

        case "GetEditoriales":
            $datos=$editorial->get_editoriales();
            echo json_encode($datos);
            break;

        case "GetEditorial":
            $datos=$editorial->get_editorial($body["numero_editorial"]);
            echo json_encode($datos);
            break;

        case "InsertEditorial":
            $datos=$editorial->insert_editorial($body["numero_editorial"],$body["nombre_editorial"],$body["direccion"],$body["pais"],$body["fecha_de_fundacion"],$body["cantidad_de_libros_impresos"],$body["numero_de_telefono"]);
            echo json_encode("Editorial Agregado");
            break;

        case "UpdateEditorial":
            $datos=$editorial->update_editorial($body["numero_editorial"],$body["nombre_editorial"],$body["direccion"],$body["pais"],$body["fecha_de_fundacion"],$body["cantidad_de_libros_impresos"],$body["numero_de_telefono"]);
            echo json_encode("Editorial Actualizado");
            break;

         case "DeleteEditorial":  
            $datos=$editorial->delete_editorial($body["numero_editorial"]);
            echo json_encode("Editorial Eliminado");
            break;
  
    }
?>