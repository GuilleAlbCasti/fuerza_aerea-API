<?php

require_once __DIR__ . '/../models/dbModel.php';

class UserModel {

    private $db;

    public function __construct(){
        $dbModel = new dbModel();
        $this->db = $dbModel->connect();
    }

    // OBTENER USUARIO POR NOMBRE

    public function getUsuarioByNombre($nombre) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ? ');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
    
}