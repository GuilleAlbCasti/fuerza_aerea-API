<?php

class ErrorController {
    public function notFound($response) {
        $response->setStatus(404);
        echo json_encode(["error" => "Recurso no encontrado"]);
    }
}
