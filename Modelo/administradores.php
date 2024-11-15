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

        public function verificarAdministrador($id_administrador, $nombre) {
            
            $sql = "SELECT 1 FROM administradores WHERE id_administrador = :id_administrador AND nombre = :nombre LIMIT 1";
            
            // Preparamos la consulta
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_administrador', $id_administrador, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            
            try {
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                error_log('Error al verificar administrador: ' . $e->getMessage());
                return false;
            }
        }

        public function ObtenerClave($id_administrador) {
        
            $sql = "SELECT clave FROM administradores WHERE id_administrador = :id_administrador";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_administrador', $id_administrador, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resultado) {
                    // Retornar solo la clave
                    return $resultado['clave'];
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function eliminar($id_administrador) {
            $sql = "DELETE FROM administradores WHERE id_administrador = :id_administrador";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_administrador', $id_administrador);
        
            try {
                $stmt->execute();
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                error_log("Error al eliminar al administrador: " . $e->getMessage());
                return false; 
            }
            
        }
    
    }

        
?>
