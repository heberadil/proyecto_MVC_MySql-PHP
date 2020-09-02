<?php
    class Conexion{
        static public function conectar(){
            #PDO("nombre de l servidor; nombre de la base de datos", "nombre de usuario", "la contraseña de la base de datos")
            $link = new PDO('mysql:host=localhost;dbname=curso-php','root','');
            $link -> exec('set names utf8');
            return $link;
        }
    }