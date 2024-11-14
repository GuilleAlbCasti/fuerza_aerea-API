<?php

require_once __DIR__ . '/../models/dbModel.php';

class BaseModel {

    private $db;

    public function __construct(){
        $dbModel = new dbModel();
        $this->db = $dbModel->connect();
    }

    // OBTENER LISTA DE BASES AÉREAS

    public function getAllBase() {
        $query = $this->db->prepare('SELECT * FROM base ORDER BY id ASC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // SELECIONAR 1 BASE AÉREA

    function getBase($id) {
        $query = $this->db->prepare('SELECT * FROM base WHERE id = ?');
        $query->execute(array($id));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    // BUSCAR BASE AÉREA POR NOMBRE

    function searchBase($letras) {
        $query = $this->db->prepare('SELECT * FROM base WHERE FIELD_A LIKE ?');
        $query->execute(array('%'.$letras.'%'));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    // AGREGAR UNA BASE AÉREA
    public function agregarBase($nombre, $ubicacion, $capacidad) {
        $query = $this->db->prepare('INSERT INTO base (nombre, ubicacion, capacidad) VALUES (?, ?, ?)');
        $query->execute([$nombre, $ubicacion, $capacidad]);
    }

    // EDITAR UNA BASE AÉREA
    public function editarBase($id, $nombre, $ubicacion, $capacidad) {
        $query = $this->db->prepare('UPDATE base SET nombre = ?, ubicacion = ?, capacidad = ? WHERE id = ?');
        $query->execute([$nombre, $ubicacion, $capacidad, $id]);
    }

    // ELIMINAR UNA BASE AÉREA
    public function eliminarBase($id) {
        $query = $this->db->prepare('DELETE FROM base WHERE id = ?');
        $query->execute([$id]);
    }
    
}