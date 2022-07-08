<?php
    require "../utils/autoload.php";

    class CargaControlador {
        public static function Alta($context){
            $usuario = UsuarioControlador::ObtenerPorUsername($_SESSION['nombreUsuario']);
            $publicacion = PublicacionControlador::ObtenerUltima($_SESSION['nombreUsuario']);
            $c = new CargaModelo();
            $c -> IdUsuario = $usuario -> Id;
            $c -> IdPublicacion = $publicacion -> Id;
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