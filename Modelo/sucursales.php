<?php

    require_once(__DIR__ . "../../Conexion/Conexion.php");

    class sucursales{

        private $id_sucursal;
        private $nombre;
        private $provincia;
        private $c_postal;
        private $ubicacion;
        private $conn;
        
        public function __construct($id_sucursal,$nombre,$provincia,$c_postal,$ubicacion)
        {
            $this -> id_sucursal = $id_sucursal;
            $this -> nombre = $nombre;
            $this -> provincia = $provincia;
            $this -> c_postal = $c_postal;
            $this -> ubicacion = $ubicacion;

            try {
                $this->conn = $GLOBALS['conn'];
            } catch (PDOException $e) {
                die("Error en la conexión de base de datos: " . $e->getMessage());
            }

        }

        public function mostrar() {
            $sql = "SELECT * FROM sucursales";
            $stmt = $this->conn->prepare($sql);
            
            try {
                $stmt->execute(); // Ejecutar la consulta
                return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve los resultados como un array asociativo
            } catch (PDOException $e) {
                error_log("Error al mostrar las sucursales: " . $e->getMessage());
                return false; // Si ocurre un error, retornar false
            }
        }
        

    }

?>