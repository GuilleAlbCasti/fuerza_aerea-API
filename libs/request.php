<?php
class Request {
    public $body = null;
    public $params = null;
    public $query = null;

    // public function __construct() {
    //     try {
    //         $this->body = json_decode(file_get_contents('php://input'), true);
    //     } catch(Exception $e) {
    //         $this->body = null;
    //     }

    //     if (empty($this->query)) {
    //         $this->query = new stdClass();
    //     }

    // }

    public function __construct() {
        $this->body = json_decode(file_get_contents('php://input'), true);
        $this->params = new stdClass();
        $this->query = (object) $_GET; // Asegura que siempre tenga datos.
        
    }
    

}


//class Request {
//    public $body = null;     // Datos enviados en el cuerpo de la petición (JSON).
//    public $params = null;   // Parámetros dinámicos de la ruta.
//    public $query = null;    // Parámetros de la consulta (?key=value).
//    public $pagination = null; // Parámetros de paginación (page y limit).
//
//    public function __construct() {
//        // Manejar el cuerpo de la petición.
//        $this->handleBody();
//
//        // Asignar parámetros de consulta.
//        $this->query = (object) $_GET;
//
//        // Manejar la paginación automáticamente.
//        $this->handlePagination();
//    }
//
//    private function handleBody() {
//        try {
//            $this->body = json_decode(file_get_contents('php://input'), true);
//        } catch (Exception $e) {
//            $this->body = null; // Si hay un error, se deja como null.
//        }
//    }
//
//    private function handlePagination() {
//        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
//        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
//
//        // Validación básica para evitar números inválidos.
//        $this->pagination = (object) [
//            'page' => max($page, 1),   // Mínimo 1.
//            'limit' => max($limit, 1) // Mínimo 1.
//        ];
//    }
//}
