<?php
    require "../utils/autoload.php";

    class PublicacionControlador {
        public static function Alta($context){
            $p = new PublicacionModelo();
            $p -> Autor = $context['post']['autor'];
            $p -> FechaHora = $context['post']['fechaHora'];
            $p -> Cuerpo = $context['post']['cuerpo'];
            $p -> Guardar();
        }

        public static function Baja($context){
            $p = new PublicacionModelo($context['post']['id']);
            $p -> Eliminar();
        }

        public static function Modificar($context){
            $p = new PublicacionModelo($context['post']['id']);
            $p -> Autor = $context['post']['autor'];
            $p -> FechaHora = $context['post']['fechaHora'];
            $p -> Cuerpo = $context['post']['cuerpo'];
            $p -> BajaLogica = $context['post']['bajaLogica'];
            $p -> Guardar();
        }

        public static function ObtenerTodos(){
            $p = new PublicacionModelo();
            return $p -> ObtenerTodos();
        }
    }