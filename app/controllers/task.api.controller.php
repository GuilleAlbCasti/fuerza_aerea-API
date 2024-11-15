<?php

require_once __DIR__ . '/../models/avionModel.php';
require_once __DIR__ .'/../views/json.view.php';



class UserApiController {
    
    private $avionModel;
    private $view;
    private $request;

    public function __construct($request) {
        echo ("ACA ESTOY");
        $this->avionModel = new AvionModel();
        $this->view = new JSONView();
        $this->request = $request;

        if ($request === null) {
            echo "El objeto request es null!";
        } else {
            var_dump($request);
        }
    
    }

    // /api/aviones

    
    public function getAll() {


        $origen = $this->request->query->origen ?? null;
;
        echo('ORIGEN:---------------->');
        var_dump($origen);
        
        //obtengo las funciones del modelo
        //armo lógica de query

        if(isset($origen)) {
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

// class ErrorController {
//     public function notFound($request, $response) {
//         $response->send([
//             "error" => "Recurso no encontrado",
//             "resource" => $request->url ?? "desconocido"
//         ], 404);
//     }
// }





