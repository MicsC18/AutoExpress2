<?php

    require_once(__DIR__.'../../Conexion/Conexion.php');

    class clientes{

        private $id;
        private $usuario;
        private $correo;
        private $clave;
        private $conexion;

        public function __construct($id,$usuario,$correo,$clave){

            $this -> id = $id;
            $this -> usuario = $usuario;
            $this -> correo = $correo;
            $this -> clave = $clave;

            try {
                $this->conexion = $GLOBALS['conn'];
            } catch (PDOException $e) {
                die("Error en la conexión de base de datos: " . $e->getMessage());
            }

        }

        public function mostrar() {
            $sql = "SELECT id, usuario, correo FROM clientes";
            $stmt = $this->conexion->prepare($sql);
            
            try {
                $stmt->execute(); 
                return $stmt->fetchAll(PDO::FETCH_ASSOC); 
            } catch (PDOException $e) {
                error_log("Error al mostrar las sucursales: " . $e->getMessage());
                return false; 
            }
        }

        public function agregar() {
            $sql = "INSERT INTO clientes (usuario,correo,clave) VALUES (:usuario, :correo, :clave)";
            $stmt = $this->conexion->prepare($sql);

            $hash_clave = password_hash($this->clave, PASSWORD_BCRYPT);

            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':clave', $hash_clave);
            
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                die("Error al agregar la marca: " . $e->getMessage());
            }
        }
        
    }

?>