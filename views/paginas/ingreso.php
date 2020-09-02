<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="POST">
        <div class="form-group">
            <label for="email">Correo Electronico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div> 
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="ingresoEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div> 
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="ingresoPassword">
            </div>
        </div>

        <?php

        /* FORMA EN QUE SE INSTANCIA LA CLASE DE UN METODO NO ESTATICO */
            //$registro = new ControllerFormularios();
            //$registro -> ctrRegistro();

        /* FORMA EN QUE SE INSTANCIA LA CLASE DE UN METODO ESTATICO */

            $ingreso =  new ControllerFormularios();
            $ingreso->ctrIngreso();

        ?>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>