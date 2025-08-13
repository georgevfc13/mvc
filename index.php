<?php
    require_once 'controllers/TareaController.php';

    $controller = new TareaController();

    $accion = isset($_GET['action']) ? $_GET['action'] : 'index';

    switch ($accion){
            default: 
        $controller->index();
        break;
    }
?>