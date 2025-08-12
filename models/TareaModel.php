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
    }
?>