<?php 
    require "../utils/autoload.php";

    class UsuarioControlador {
        public static function Alta($context){
            $u = new UsuarioModelo();
            $u -> Nombre = $context['post']['usuario'];
            $u -> Complete_Name = $context['post']['complete_name'];
            $u -> Password = $context['post']['password'];
            $u -> Guardar();
        }

        public static function ObtenerTodos(){
            $u = new UsuarioModelo();
            return $u -> ObtenerTodos();
        }
    }

