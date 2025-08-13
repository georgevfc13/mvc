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
        public function index(){
            $tareas = $this->TareaModel->leer();
            include 'views/home.php';
        }
        //crear tarea
        public function crear(){
            include 'views/crear.php';
        }

        //guardar tarea

        public function guardar(){
            if ($_POST){
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];

                if ($this->TareaModel->crear($titulo, $descripcion)){
                    header("Location: index.php");
                } else {
                    echo "Error al crear la tabla";
                }
            }
        }

    }
?>