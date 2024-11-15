<?php
class Response {
    public $user = null;

    public function send($body, $status = 200) {
        // Configurar el código de estado HTTP
        http_response_code($status);

        // Enviar encabezados JSON
        header('Content-Type: application/json; charset=utf-8');

        // Convertir el cuerpo a JSON y enviarlo
        echo json_encode($body);
    }

    public function setStatus($code) {
        http_response_code($code); // Esta función nativa de PHP establece el código de estado HTTP
    }
    

}
