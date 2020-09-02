<?php
class ControllerPlantilla{
    
    public function ctrTraerPlantilla(){
        #include() Se utiliza para invocar el archivo que contiene codigo html-php.
        include 'views/plantilla.php';
    }
}

?>