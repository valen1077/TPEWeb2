<?php
require_once './app/model/model.php'; // Asegúrate de que estás incluyendo el modelo base

class LibreriaModel extends Model {

    // Método para obtener todas las librerías
    public function getLibraries() {
        $query = $this->db->prepare("SELECT * FROM libreria");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); // Devuelve todas las librerías
    }

    // Método para obtener una librería por su ID
    public function getLibrary($id) {
        $query = $this->db->prepare("SELECT * FROM libreria WHERE id_libreria = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ); // Devuelve una librería específica
    }

    // Método para insertar una nueva librería
    public function insertLibrary($nombre, $direccion) {
        $query = $this->db->prepare("INSERT INTO libreria (nombre, direccion) VALUES (?, ?)");
        $query->execute([$nombre, $direccion]);
    }

    // Método para actualizar una librería existente
    public function updateLibrary($id, $nombre, $direccion) {
        $query = $this->db->prepare("UPDATE libreria SET nombre = ?, direccion = ? WHERE id_libreria = ?");
        $query->execute([$nombre, $direccion, $id]);
    }

    // Método para eliminar todos los libros asociados a una librería
    private function deleteBooksByLibrary($libraryId) {
        $query = $this->db->prepare("DELETE FROM libros WHERE id_libreria = ?");
        $query->execute([$libraryId]);
        return $query->rowCount(); // Devuelve el número de libros eliminados
    }

    // Método para eliminar una librería
    public function deleteLibrary($id) {
        // Primero, elimina los libros asociados a la librería
        $this->deleteBooksByLibrary($id);
        
        // Luego, elimina la librería
        $query = $this->db->prepare("DELETE FROM libreria WHERE id_libreria = ?");
        $query->execute([$id]);
        return $query->rowCount(); // Devuelve el número de filas afectadas
    }
}