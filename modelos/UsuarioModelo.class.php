<?php 

require "../utils/autoload.php";

    class UsuarioModelo extends Modelo{
        public $Id;
        public $Nombre;
        public $Complete_Name;
        public $Password;
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
            $sql = "INSERT INTO usuario (username,complete_name,password) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> Complete_Name . "',
            '" . $this -> hashearPassword($this -> Password) . "')";

            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function hashearPassword($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }

        private function actualizar(){
            $sql = "UPDATE usuario SET
            username = '" . $this -> Nombre . "',
            complete_name = '" . $this -> Complete_Name . "',
            password = '" . $this -> Password . "'
            bajaLogica = " . $this -> BajaLogica . "
            WHERE id = " . $this -> id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM usuario WHERE id = " . $this -> id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['username'];
            $this -> Complete_Name = $fila['complete_name'];
            $this -> BajaLogica = $fila['bajaLogica'];
        }
        // Esta funcion en realidad se le haria un overray con modify ya que deberia hacer bajas logicas no fisicas
        public function Eliminar(){
            $sql = "DELETE FROM usuario WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM usuario";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $p = new UsuarioModelo();
                $p -> Id = $fila['id'];
                $p -> Nombre = $fila['username'];
                $p -> Complete_Name = $fila['complete_name'];
                $p -> BajaLogica = $fila['bajaLogica'];
                array_push($resultado,$p);
            }
            return $resultado;
        }

        public function Autenticar(){
            $sql = "SELECT * FROM usuario WHERE 
            username = '" . $this -> Nombre . "'
            AND bajaLogica = 0;";
            $resultado = $this -> conexionBaseDeDatos -> query($sql);
            if($resultado -> num_rows == 0) {
                return false;
            }

            $fila = $resultado -> fetch_all(MYSQLI_ASSOC)[0];
            return $this -> compararPasswords($fila['password']);
        }

        private function compararPasswords($passwordHasheado){
            return password_verify($this -> Password, $passwordHasheado);
        }

        public function ObtenerPorUsername($usr){
            $sql = "SELECT * FROM usuario WHERE username = '" . $usr . "';";
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['username'];
            $this -> Complete_Name = $fila['complete_name'];
            $this -> BajaLogica = $fila['bajaLogica'];

            return $this;
        }
    }