<?php

    class JSONView {
        public function response($body, $status = 200) {
            header("Content-type: aplication/json");
            $statusText = $this->_requestStatus($status);
            header("HTTP/1.1 $status $statusText");
            echo json_encode($body);
        }

        private function _requestStatus($code) {
            $status = array(
                200 => "OK",
                201 => "Created",
                204 => "No Content",
                400 => "Bad Request",
                404 => "Not Found",
                500 => "Internal Server Errro",
            );
            return (isset($status[$code])) ? $status[$code] : $status[500];
        }
    
    }

