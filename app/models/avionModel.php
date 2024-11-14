<?php

require_once __DIR__ . '/../models/dbModel.php';

class AvionModel {

    private $db;


    public function __construct(){
        $dbModel = new dbModel;
        $this->db = $dbModel->connect();
    }
 
    // OBTENER LISTA DE AVIONES

    public function getAllAvion() {
        $query = $this->db->prepare('SELECT avion.id, avion.modelo, avion.anio, avion.origen, avion.horas_vuelo, categoria.nombre AS categoria_nombre, base.nombre AS base_nombre FROM avion INNER JOIN base ON avion.base_fk = base.id INNER JOIN categoria ON avion.categoria_fk = categoria.id ORDER BY avion.modelo ASC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // OBTENER 1 AVION

    public function getAvion($id_avion) {
        $query = $this->db->prepare('SELECT avion.*, categoria.nombre AS categoria_nombre FROM avion INNER JOIN categoria ON avion.categoria_fk = categoria.id WHERE avion.id = ?');
        $query->execute(array($id_avion));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    // BUSCAR AVION POR MODELO

    function searchAvion($letras) {
        $query = $this->db->prepare('SELECT * FROM avion WHERE modelo LIKE ?');
        $query->execute(array("%$letras%"));

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // AGREGAR UN AVIÓN

    function agregarAvion($modelo, $anio, $origen, $horas_vuelo, $base_fk, $categoria_fk) {
        $query = $this->db->prepare('INSERT INTO avion(modelo, anio, origen, horas_vuelo, base_fk, categoria_fk) VALUES (?,?,?,?,?,?)');
        $query->execute([$modelo, $anio, $origen, $horas_vuelo, $base_fk, $categoria_fk]);
    }

    // EDITAR UN AVIÓN
    function editarAvion($id_seleccionado, $modelo, $anio, $origen, $horas_vuelo, $base_fk, $categoria_fk) {
        $query = $this->db->prepare('UPDATE avion SET modelo = ?, anio = ?, origen = ?, horas_vuelo = ?, base_fk = ?, categoria_fk = ? WHERE id = ?');
        $query->execute([$modelo, $anio, $origen, $horas_vuelo, $base_fk, $categoria_fk, $id_seleccionado]);
    }

    // ELIMINAR UN AVIÓN
    function eliminarAvion($id_seleccionado) {
        $query = $this->db->prepare('DELETE FROM avion WHERE id = ?');
        $query->execute([$id_seleccionado]);
    }

}