<?php
    require "../utils/autoload.php";

    class CargaControlador {
        public static function Alta($context){
            $p = new CargaModelo();
            $p -> IdUsuario = $context['post']['idUsuario'];
            $p -> IdPublicacion = $context['post']['idPublicacion'];
            $p -> Guardar();
        }

        // No tiene funcion eliminar porque actua como una especie de log del usuario

        public static function Modificar($context){
            $p = new PublicacionModelo($context['post']['id']);
            $p -> Autor = $context['post']['autor'];
            $p -> FechaHora = $context['post']['fechaHora'];
            $p -> Guardar();
        }

        public static function ObtenerTodos(){
            $p = new PublicacionModelo();
            return $p -> ObtenerTodos();
        }
    }