<?php

    require_once(__DIR__.'../../Conexion/Conexion.php');

    class empleados {
        private $id_empleado_sucursal;
        private $nombre;
        private $id_sucursal;
        private $clave;
        private $conexion;

        public function __construct($id_empleado_sucursal,$nombre,$id_sucursal,$clave)
        {
            $this -> id_empleado_sucursal = $id_empleado_sucursal;
            $this -> nombre = $nombre;
            $this -> id_sucursal = $id_sucursal;
            $this -> clave = $clave;

            try {
                $this->conexion = $GLOBALS['conn'];
            } catch (PDOException $e) {
                die("Error en la conexión de base de datos: " . $e->getMessage());
            }
            
        }

        public function agregar() {
            $sql = "INSERT INTO empleados_sucursales (nombre, id_sucursal, clave) 
                    VALUES (:nombre, :id_sucursal, :clave)";
            
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':id_sucursal', $this->id_sucursal);
            $stmt->bindParam(':clave', $this->clave);
            
            try {
                $stmt->execute();
                return true; 
            } catch (PDOException $e) {
                error_log('Ha ocurrido un error.'); 
                return false; 
            }
        }

        public function mostrar() {
            $sql = "SELECT nombre, id_sucursal FROM empleados_sucursales";
            $stmt = $this->conexion->prepare($sql);
            
            try {
                $stmt->execute(); // Ejecutar la consulta
                return $stmt->fetchAll(PDO::FETCH_ASSOC); 
            } catch (PDOException $e) {
                error_log("Error al mostrar las sucursales: " . $e->getMessage());
                return false; 
            }
        }

        public function verificarEmpleado($id_empleado_sucursal, $nombre) {
            
            $sql = "SELECT 1 FROM empleados_sucursales WHERE id_empleado_sucursal = :id_empleado_sucursal AND nombre = :nombre LIMIT 1";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_empleado_sucursal', $id_empleado_sucursal, PDO::PARAM_INT);
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

        public function ObtenerClave($id_empleado_sucursal) {
        
            $sql = "SELECT clave FROM empleados_sucursales WHERE id_empleado_sucursal = :id_empleado_sucursal";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_empleado_sucursal', $id_empleado_sucursal, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resultado) {
                    return $resultado['clave'];
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function eliminar($id_empleado_sucursal) {
            $sql = "DELETE FROM empleados_sucursales WHERE id_empleado_sucursal = :id_empleado_sucursal";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_empleado_sucursal', $id_empleado_sucursal);
            try {
                $stmt->execute();
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                error_log("Error al eliminar el empleado: " . $e->getMessage());
                return false; 
            }
            
        }

    }

?>
