<?php

require_once __DIR__ . '/../models/avionModel.php';
require_once __DIR__ .'/../views/json.view.php';



class UserApicontroller {
    
    private $avionModel;
    private $view;

    public function __construct() {
        $this->avionModel = new AvionModel();
        $this->view = new JSONView();
    }

    // /api/aviones
    
    public function getAll($request) {

        echo ('¡¡¡Entra aca!!!!');

        $origen = $request->query->origen ?? null;

        //obtengo las funciones del modelo
        //armo lógica de query
        echo ('>>>> $request: ');
        var_dump($request);
        echo ('<<<<');
        echo ('>>>> $request->query: ');
        var_dump($request->query);
        echo ('<<<<');
        echo ('>>>> $request->query->origen: ');
        var_dump($request->query->origen);
        echo ('<<<<');
        echo ('Esto es el $origen -------> '.$origen);

        if($origen) {
            echo ('Esto es el $origen -------> '.$origen);
            $aviones = $this->avionModel->getAllAvionByOrigen($origen);
        } else {
            
            $aviones = $this->avionModel->getAllAvion();
            
        }

        

        //mando las respuestas a la vista
        if (empty($aviones)) {
            return $this->view->response("No se encontraron aviones con el origen especificado.", 404);
        } else {
            return $this->view->response($aviones);
        }
        
        
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

class ErrorController {
    public function notFound($request, $response) {
        $response->send(['Error' => 'Ruta no encontrada'], 404);
    }
}

