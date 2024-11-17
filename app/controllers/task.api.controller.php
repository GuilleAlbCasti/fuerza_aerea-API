<?php


require_once __DIR__ . '/../models/avionModel.php';
require_once __DIR__ .'/../views/json.view.php';



class UserApiController {
    
    private $avionModel;
    private $view;
    private $request;

    public function __construct() {
        $this->avionModel = new AvionModel();
        $this->view = new JSONView();
    }

    // /api/aviones
    public function getAll() {
       
        if(isset($_GET['origen'])) {
            $filtrarOrigen = $_GET['origen'];
            $aviones = $this->avionModel->getAllAvionByOrigen($filtrarOrigen);
        } elseif(isset($_GET['base_nombre'])) {
            $filtrarBase = $_GET['base_nombre'];
            $aviones = $this->avionModel->getAllAvionByBase($filtrarBase);
        } elseif(isset($_GET['categoria_nombre'])) {
            $filtrarCategoria = $_GET['categoria_nombre'];
            $aviones = $this->avionModel->getAllAvionByCategoria($filtrarCategoria);
        } elseif(isset($_GET['orderBy'])) {
            $filtrarOrden = $_GET['orderBy'];
            $aviones = $this->avionModel->getAllAvionByOrden($filtrarOrden);
        } else {
            $aviones = $this->avionModel->getAllAvion();
        }




        return $this->view->response($aviones);
    } 
    
    // /api/avion/:id
    public function get($req) {

        $id = $req->params->id;

        $avion = $this->avionModel->getAvion($id);

        if(!$avion) {
            return $this->view->response("El avión con el id=$id no existe", 404);
        }

        return $this->view->response($avion);
    }

    // api/aviones (POST)
    public function create($req) {

        $req->body = json_decode(file_get_contents("php://input"));

        if (
            !isset($req->body->modelo) || 
            !isset($req->body->anio) || 
            !isset($req->body->origen) ||
            !isset($req->body->horas_vuelo) ||
            !isset($req->body->base_nombre) ||
            !isset($req->body->categoria_nombre)) {

            return $this->view->response('Faltan completar datos', 400);
        }

        $modelo = $req->body->modelo;       
        $anio = $req->body->anio;       
        $origen = $req->body->origen;
        $horas_vuelo = $req->body->horas_vuelo;        
        $base_fk = $req->body->base_nombre;        
        $categoria_fk = $req->body->categoria_nombre;        

        $id = $this->avionModel->agregarAvion($modelo, $anio, $origen, $horas_vuelo, $base_fk, $categoria_fk);

        if (!$id) {
            return $this->view->response("Error al insertar el avión", 500);
        }

        $nuevoAvion = $this->avionModel->getAvion($id);
        return $this->view->response($nuevoAvion, 201);
    }
    
    // api/avion/:id (PUT)
    public function update($req) {

        $req->body = json_decode(file_get_contents("php://input"));
        
        $id = $req->params->id;

        $avion = $this->avionModel->getAvion($id);
        if (!$avion) {
            return $this->view->response("El avión con el id=$id no existe", 404);
        }

        if (
            empty($req->body->modelo) || 
            empty($req->body->anio) || 
            empty($req->body->origen) ||
            empty($req->body->horas_vuelo) ||
            empty($req->body->base_nombre) ||
            empty($req->body->categoria_nombre)) {

            return $this->view->response('Faltan completar datos', 400);
        }

        $modelo = $req->body->modelo;       
        $anio = $req->body->anio;       
        $origen = $req->body->origen;
        $horas_vuelo = $req->body->horas_vuelo;        
        $base_fk = $req->body->base_nombre;        
        $categoria_fk = $req->body->categoria_nombre;   

        $this->avionModel->editarAvion($id, $modelo, $anio, $origen, $horas_vuelo, $base_fk, $categoria_fk);

        $task = $this->avionModel->getAvion($id);
        $this->view->response($task, 200);
    }

    // api/avion/:id (DELETE)
    public function delete($req) {
        $id = $req->params->id;

        $avion = $this->avionModel->getAvion($id);

        if (!$avion) {
            return $this->view->response("El avión con el id=$id no existe", 404);
        }

        $this->avionModel->eliminarAvion($id);
        $this->view->response("El avión con el id=$id se eliminó con éxito");
    }
}






