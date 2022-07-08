<?php
    require "../utils/autoload.php";

    class PublicacionModelo extends Modelo{
        public $Id;
        public $Autor;
        public $FechaHora;
        public $Cuerpo;
        public $BajaLogica;

        public function __construct($id=""){
            parent::__construct();
            if($id != ""){
                $this -> id = $id;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO publicacion (autor,fechaHora,cuerpo) VALUES (
            '" . $this -> Autor . "',
            CURRENT_DATETIME,
            '" . $this -> Cuerpo . "')";

            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE publicacion SET
            autor = '" . $this -> Autor . "',
            fechaHora = CURRENT_DATETIME,
            cuerpo = '" . $this -> Cuerpo . "'
            bajaLogica = " . $this -> BajaLogica . "
            WHERE id = " . $this -> id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM publicacion WHERE id = " . $this -> id . ";";
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Autor = $fila['autor'];
            $this -> FechaHora = $fila['fechaHora'];
            $this -> Cuerpo = $fila['cuerpo'];
            $this -> BajaLogica = $fila['bajaLogica'];
        }
        // Esta funcion en realidad se le haria un overray con modify ya que debe hacer bajas logicas no fisicas sino se romperia todo
        public function Eliminar(){
            $sql = "DELETE FROM publicacion WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM publicacion";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $p = new PublicacionModelo();
                $p -> Id = $fila['id'];
                $p -> Autor = $fila['autor'];
                $p -> FechaHora = $fila['fechaHora'];
                $p -> Cuerpo = $fila['cuerpo'];
                $p -> BajaLogica = $fila['bajaLogica'];
                array_push($resultado,$p);
            }
            return $resultado;
        }
    }