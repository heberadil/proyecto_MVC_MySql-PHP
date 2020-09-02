<?php
#require() establece que el codigo del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa 
require_once 'Controllers/plantilla.controller.php';
require_once 'Controllers/formularios.controller.php';
require_once 'models/formularios.model.php';


$plantilla = new ControllerPlantilla();
$plantilla -> ctrTraerPlantilla();