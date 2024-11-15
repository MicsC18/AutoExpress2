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

    }

?>