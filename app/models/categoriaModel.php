<?php
require_once __DIR__ . '/../models/dbModel.php';

class CategoriaModel {

    private $db;

    public function __construct(){
        $dbModel = new dbModel;
        $this->db = $dbModel->connect();
    }

    // OBTENER TODAS LAS CATEGORÍAS
    public function getAllCategorias() {
        $query = $this->db->prepare('SELECT * FROM categoria ORDER BY nombre ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // OBTENER NOMBRE DE 1 CATEGORIA
    public function getCategoria($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // OBTENER TODOS LOS AVIONES POR CATEGORÍA
    public function getAvionesPorCategoria($categoria_id) {
        $query = $this->db->prepare('SELECT avion.id, avion.modelo, base.nombre AS base_nombre FROM avion INNER JOIN base ON avion.base_fk = base.id WHERE avion.categoria_fk = ?');
        $query->execute([$categoria_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    

    // AGREGAR UNA CATEGORÍA
    public function agregarCategoria($nombre) {
        $query = $this->db->prepare('INSERT INTO categoria (nombre) VALUES (?)');
        $query->execute([$nombre]);
    }

    // EDITAR UNA CATEGORÍA
    public function editarCategoria($id, $nombre) {
        $query = $this->db->prepare('UPDATE categoria SET nombre = ? WHERE id = ?');
        $query->execute([$nombre, $id]);
    }

    // ELIMINAR UNA CATEGORÍA
    public function eliminarCategoria($id) {
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
    }
}
