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

        public static function Baja($context){
            $u = new UsuarioModelo($context['post']['id']);
            $u -> Eliminar();
        }

        public static function Modificar($context){
            $u = new UsuarioModelo($context);
            $u -> Nombre = $context['post']['usuario'];
            $u -> Complete_Name = $context['post']['complete_name'];
            $u -> Password = $context['post']['password'];
            $u -> BajaLogica = $context['post']['bajaLogica'];
            $u -> Guardar();
        }
    }

