<?php
    require "../utils/autoload.php";

    class CargaControlador {
        public static function Alta($context){
            $filasUsuario = UsuarioControlador::ObtenerPorUsername($context['session']['nombreUsuario']);
            PublicacionControlador::Alta($context);
            $c = new CargaModelo($context['post']['id']);
            $c -> IdUsuario = $filasUsuario[0]['id'];
            $c -> IdPublicacion = $context['post']['id'];
            $c -> Guardar();
        }

        public static function Modificar($context){
            $c = new CargaModelo($context['post']['id']);
            $c -> IdUsuario = $context['post']['idUsuario'];
            $c -> IdPublicacion = $context['post']['idPublicacion'];
            $c -> Guardar();
        }

        public static function ObtenerTodos(){
            $c = new CargaModelo();
            return $c -> ObtenerTodos();
        }
    }