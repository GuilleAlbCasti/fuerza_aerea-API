<?php


require_once __DIR__ . '/../models/avionModel.php';
require_once __DIR__ .'/../views/json.view.php';



class UserApicontroller {

    private $avionModel;
    private $view;

    public function __construct() {
        $this->avionModel = new AvionModel();
        $this->view = new JSONView();
        echo('ENTRE A CONTROLLER: '.$_SERVER['REQUEST_URI']);
    }

    // /api/aviones
    public function getAll($req) {

        $filtrarOrigen = null;

        if(isset($req->query->origen)) {
            $filtrarOrigen = $req->query->origen;
        }

        //obtengo las funciones del modelo
        $aviones = $this->avionModel->getAllAvion($filtrarOrigen);
        //mando las respuestas a la vista
        return $this->view->response($aviones);
    } 
    
    // /api/avion/:id
    public function get($req) {
        //obtengo el id del avion
        $id = $req->params->id;

        //obtengo la funcion del modelo
        $avion = $this->avionModel->getAvion($id);

        //si no existe el avion requerido
        if(!$avion) {
            return $this->view->response("La tarea con el id=$id no existe", 404);
        }

        //mando la respuesta a la vista
        return $this->view->response($avion);
    }
    
}

