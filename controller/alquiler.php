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
    require_once("../models/Alquiler.php");

    $alquiler = new Alquiler();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
        

        case "get_alquiler": 
            $datos=$alquiler->get_alquiler();
            echo json_encode($datos);
        break;

        case "get_alquileres": 
            $datos=$alquiler->get_alquileres($body["codigo_de_libro"]);
            echo json_encode($datos);
        break;

        case "insert_alquiler";
          $datos=$alquiler->insert_alquiler($body["codigo_de_libro"],$body["nombre_libro"],$body["fecha_de_alquiler"],$body["nombre_cliente"],$body["direccion"],$body["dias_a_alquilar"],$body["precio_alquiler"]);
          echo json_encode("Alquiler Agregado");
        break; 

        case "update_alquiler";
        $datos=$alquiler->update_alquiler($body["codigo_de_libro"],$body["nombre_libro"],$body["fecha_de_alquiler"],$body["nombre_cliente"],$body["direccion"],$body["dias_a_alquilar"],$body["precio_alquiler"]);
          echo json_encode("Alquiler Actualizado");
        break; 

        case "delete_alquiler";
        $datos=$alquiler->delete_alquiler($body["codigo_de_libro"]);
          echo json_encode("Alquiler Eliminado");
        break; 
    }
        
   
?>


