<?php
    require "../utils/autoload.php";

    class CargaModelo extends Modelo{
        public $IdUsuario;
        public $IdPublicacion;

        public function __construct($idPub=''){
            parent::__construct();
            if($idPub != ""){
                $this -> id = $idPub;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO carga VALUES (
            '" . $this -> IdUsuario . "',
            '" . $this -> IdPublicacion . "')";

            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE carga SET
            idUsuario = '" . $this -> IdUsuario . "',
            WHERE idPublicacion = " . $this -> IdPublicacion;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM publicacion WHERE id = " . $this -> IdPublicacion;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> IdUsuario = $fila['idUsuario'];
            $this -> IdPublicacion = $fila['idPublicacion'];
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM carga";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $c = new CargaModelo();
                $c -> IdUsuario = $fila['idUsuario'];
                $c -> IdPublicacion = $fila['idPublicacion'];
                array_push($resultado,$c);
            }
            return $resultado;
        }
    }