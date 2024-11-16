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
        } else {
            //obtengo las funciones del modelo
            $aviones = $this->avionModel->getAllAvion();
        }

        //mando las respuestas a la vista
        return $this->view->response($aviones);
        
    } 
    
    // /api/avion/:id
    public function get() {
        //obtengo el id del avion
        $id = $this->request->params->id;

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






