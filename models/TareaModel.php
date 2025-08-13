<?php
    class TareaModel {
        private $conn;
        private $table_name = "tareas";

        public function __construct($db)
        {
            $this->conn = $db;
        }
        
        //leer tarea
        public function leer(){
            $query = "SELECT id, titulo, descripcion, fecha_creacion FROM " . $this->table_name . " ORDER BY fecha_creacion";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        //crear tareas
        public function crear($titulo, $descripcion){
            $query = "INSERT INTO" . $this->table_name . " SET titulo =:titulo, descripcion =:descripcion";
            $stmt = $this->conn->prepare($query);

            $titulo = htmlspecialchars(strip_tags($titulo));
            $titulo = htmlspecialchars(strip_tags($descripcion));

            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":descripcion", $descripcion);
            
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>