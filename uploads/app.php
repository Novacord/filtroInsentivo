<?php

    require "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();

    $credenciales = new App\connect();

    $router->post('/campers', function() {
        $_DATA = json_decode(file_get_contents("php://input"), true);
        global $credenciales;
        $conn = $credenciales->getConnection();
        $res = $conn->prepare("INSERT INTO campers (idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES (:idCamper, :nombreCamper, :apellidoCamper, :fechaNac, :idReg)");
        $res->bindParam("idCamper", $_DATA['idCamper']);
        $res->bindParam("nombreCamper", $_DATA['nombreCamper']);
        $res->bindParam("apellidoCamper", $_DATA['apellidoCamper']);
        $res->bindParam("fechaNac", $_DATA['fechaNac']);
        $res->bindParam("idReg", $_DATA['idReg']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });


    $router->get('/campers', function() {
        global $credenciales;
        $conn = $credenciales->getConnection();
        $res = $conn->prepare('SELECT * FROM campers');
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->get("/campers/{idCamper}", function($idCamper){
        global $credenciales;
        $conn = $credenciales->getConnection();
        $res = $conn->prepare("SELECT * FROM person WHERE idCamper = :idCamper");
        $res->bindParam("idCamper", $idCamper);
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
        // print_r(file_get_contents('php://input'));
    });

    $router->put('/campers', function() {
        $_DATA = json_decode(file_get_contents('php://input'),true);
        global $credenciales;
        $conn = $credenciales->getConnection();
        $res = $conn->prepare('UPDATE campers SET idCamper = :idCamper, nombreCamper = :nombreCamper, apellidoCamper = :apellidoCamper, fechaNac = :fechaNac, idReg = :idReg WHERE idCamper=:idCamper');
        $res->bindvalue("idCamper", $_DATA['idCamper']);
        $res->bindvalue("nombreCamper", $_DATA['nombreCamper']);
        $res->bindvalue("apellidoCamper", $_DATA['apellidoCamper']);
        $res->bindvalue("fechaNac", $_DATA['fechaNac']);
        $res->bindvalue("idReg", $_DATA['idReg']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });


    $router->delete("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        global $credenciales;
        $conn = $credenciales->getConnection();
        $res = $conn->prepare("DELETE FROM campers WHERE idCamper = :idCamper");
        $res->bindParam("idCamper", $_DATA['idCamper']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
// --

    $router->run();

?>