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

        //moostrar la informacion en el formulario
        public function editar(){
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $tarea = $this->TareaModel->leerUno($id);
                if ($tarea){
                    include 'views/editar.php';
                } else {
                    echo "tarea no encontrada";
                }
            }
        }

        //actualizar tarea
        public function actualizar(){
            if ($_POST){
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                
                if ($this->TareaModel->actualizar($id, $titulo, $descripcion)){
                    header("location: index.php");
                } else {
                    echo "Error al actualizar la tarea";
                }
            }
        }
    
        //eliminar tarea
        public function eliminar(){
            $id = $_GET['id'] ?? $_POST['id'] ?? null;
            if ($id) {
                if ($this->TareaModel->eliminar($id)){
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error al eliminar la tarea";
                }
            }
        }
    
    }
?>