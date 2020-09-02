<?php
    require_once 'conexion.php';

    class ModeloFormularios{

        /* INSERTAR REGISTROS */
        static public function mdlRegistro($tabla, $datos){
            #statement: declaración

            #prepare() Prepara una sentencia SQL para se ejecutada por el metodo PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la nesecidad de entrecomillar manualmente los parámetros 
            $stmt = Conexion::conectar()->prepare("insert into $tabla(nombre, email, password) values(:nombre, :email, :password)");
            #bindParam() Vincula una variable de PHP a un párametro de sutitución con nomnre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
            
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);

            if($stmt -> execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            mysqli_close($stmt);
            //$stmt->close();
            $stmt = null;
        }

        /* SELECCIONAR REGISTROS */
        static public function mldSeleccionarRegistros($tabla, $item, $valor){
            if($item == null && $valor == null){
                $stmt = Conexion::conectar()->prepare("select *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha from $tabla ORDER BY id DESC");
                $stmt->execute();

                #fetchAll() Devuelve todos los registros
                #fetch() Devuelve un solo registro
                return $stmt->fetchAll();
            }else{
                $stmt = Conexion::conectar()->prepare("select *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha from $tabla WHERE $item = :$item ORDER BY id DESC");

                $stmt->bindParam(':'.$item, $valor, PDO::PARAM_STR);

                $stmt->execute();

                #fetchAll() Devuelve todos los registros
                #fetch() Devuelve un solo registro
                return $stmt->fetch();
            }

            //mysqli_close($stmt);
            $stmt = null;
        }


         /* ACTUALIZAR REGISTRO */
         static public function mdlActualizarRegistro($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("update $tabla set nombre=:nombre, email=:email, password=:password where id=:id");
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $datos['password'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);

            if($stmt -> execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            mysqli_close($stmt);
            //$stmt->close();
            $stmt = null;
        }
        

        /* ELIMINAR REGISTRO */
        
        static public function mdlEliminarRegistro($tabla, $valor){

            $stmt = Conexion::conectar()->prepare("delete from $tabla where id=:id");
            $stmt->bindParam(':id', $valor, PDO::PARAM_INT);

            if($stmt -> execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            mysqli_close($stmt);
            //$stmt->close();
            $stmt = null;
        }
    }