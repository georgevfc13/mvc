<?php
    require_once 'models/TareaModel.php';
    require_once 'config/Database.php';

    class TareaController {
        private $db;
        private $TareaModel;

        public function __construct()
        {
            $database = new Database();
            $this->db = $database->getConnection();
            $this->TareaModel = new TareaModel($this->db);
        }

        //mostrar todas las tareas
        public function home(){
            $tareas = $this->TareaModel->leer();
            include 'views/home.php';
        }
    }
?>