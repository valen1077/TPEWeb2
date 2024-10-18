<?php
    require_once './app/model/model.php';

    class LibroModel extends Model{
        
        public function getBooks(){
            $query = $this->db->prepare("SELECT * FROM libros INNER JOIN libreria ON libros.id_libreria = libreria.id_libreria");
            $query ->execute();
            $libros = $query->fetchAll(PDO::FETCH_OBJ);
            return $libros;
        }

        public function getBook($id){
            $query = $this->db->prepare("SELECT * FROM `libros` WHERE `id_libro` = ?");
            $query ->execute([$id]);
            $libro = $query->fetch(PDO::FETCH_OBJ);
            //

            /* $query = $this->db->prepare("SELECT * FROM `libreria` WHERE `id_libreria` = ?");
            $query ->execute([$libro->id_libreria]);
            $libreria = $query->fetch(PDO::FETCH_OBJ);
            $libro->libreria_Nombre = $libreria->nombre; */
            return $libro;
        }

        public function deleteBook($id){
            $query = $this->db->prepare("DELETE FROM `libros` WHERE `id_libro` = ?");
            $query ->execute([$id]);
            return $query;
        }

        public function addBook($nombre,$genero,$editorial,$id_libreria){
            $query = $this->db->prepare("INSERT INTO libros (nombre_libro,genero,editorial,id_libreria) VALUES (?,?,?,?)");
            $query->execute([$nombre,$genero,$editorial,$id_libreria]);
            return $query;
        }

        public function setBook($id,$nombre,$genero,$editorial,$id_libreria){
            $query = $this->db->prepare("UPDATE libros SET nombre_libro = ?,genero = ?,editorial = ?,id_libreria = ? WHERE id_libro = ?");
            $query->execute([$nombre,$genero,$editorial,$id_libreria, $id]);
            return $query;
        }

        public function getBookByLibrary($id){
            $query = $this->db->prepare("SELECT * FROM `libros` WHERE `id_libreria` = ?");
            $query ->execute([$id]);
            $libros = $query->fetchAll(PDO::FETCH_OBJ);
            return $libros;
        }


    }