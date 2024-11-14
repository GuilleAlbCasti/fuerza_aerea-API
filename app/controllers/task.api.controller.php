<?php

require_once __DIR__ . '/../models/avionModel.php';
require_once __DIR__ .'/../views/json.view.php';



class UserApicontroller {

    private $avionModel;
    private $view;

    public function __construct($res) {
        $this->avionModel = new AvionModel();
        $this->view = new JSONView();
    }

    // /api/aviones
    public function getAll($req, $res) {
        //obtengo las funciones del modelo
        $aviones = $this->avionModel->getAllAvion();
        //mando las respuestas a la vista
        return $this->view->response($aviones);
    } 
    
    // /api/avion/:id
    public function get($req, $res) {
        //obtengo el id del avion
        $id = $req->params->id;

        //obtengo la funcion del modelo
        $avion = $this->avionModel->getAvion($id);

        //mando la respuesta a la vista
        return $this->view->response($avion);
    }
    
}

