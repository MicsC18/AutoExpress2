<?php

    require_once(__DIR__.'../../Conexion/Conexion.php');

    class administradores{
        private $id_administrador;
        private $nombre;
        private $clave;
        private $conexion;

        public function __construct($id_administrador,$nombre,$clave)
        {
            $this -> id_administrador = $id_administrador;
            $this -> nombre = $nombre;
            $this -> clave = $clave;

            try {
                $this->conexion = $GLOBALS['conn'];
            } catch (PDOException $e) {
                die("Error en la conexión de base de datos: " . $e->getMessage());
            }
        }

        public function agregar() {
            $sql = "INSERT INTO administradores (nombre, clave) 
                    VALUES (:nombre, :clave)";
            
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':clave', $this->clave);
            
            try {
                $stmt->execute();
                return true; 
            } catch (PDOException $e) {
                error_log('Ha ocurrido un error.'); 
                return false; 
            }
        }
    }
?>