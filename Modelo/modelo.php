<?php

    include('../../Conexion/Conexion.php');

    class modelo{
        private $id_modelo;
        private $modelo;
        private $id_marca;
        private $fabricacion;
        private $tipo_vehiculo;
        private $conexion;
       

        public function __construct($id_modelo, $modelo,$id_marca, $fabricacion, $tipo_vehiculo)
        {
                $this -> id_modelo = $id_modelo;
                $this -> modelo = $modelo;
                $this -> id_marca = $id_marca;
                $this -> fabricacion = $fabricacion;
                $this -> tipo_vehiculo = $tipo_vehiculo;

                try {
                    $this->conexion = $GLOBALS['conn'];
                } catch (PDOException $e) {
                    die("Error en la conexión de base de datos: " . $e->getMessage());
                }
        }

        public function agregar() {
            $sql = "INSERT INTO modelos (modelo, id_marca, fabricacion, tipo_vehiculo) 
                    VALUES (:modelo, :id_marca, :fabricacion, :tipo_vehiculo)";
            
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':modelo', $this->modelo);
            $stmt->bindParam(':id_marca', $this->id_marca);
            $stmt->bindParam(':fabricacion', $this->fabricacion);
            $stmt->bindParam(':tipo_vehiculo', $this->tipo_vehiculo);
            
            try {
                $stmt->execute();
                return true; // Devuelve true si la inserción fue exitosa
            } catch (PDOException $e) {
                error_log('Ha ocurrido un error.'); 
                return false; 
            }
        }
    
        public function mostrar(){
            $sql = "SELECT * FROM modelos";
            $stmt = $this->conexion->prepare($sql);
            try{
                $stmt->execute();
            }catch(PDOException $e){
                die("Error al mostrar los modelos: " . $e->getMessage());
            }
        }
        
        public function editar($id_modelo) {
            $sql = "UPDATE modelos SET modelo = :modelo, id_marca = :id_marca, fabricacion = :fabricacion, tipo_vehiculo = :tipo_vehiculo WHERE id_modelo = :id_modelo";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':modelo', $this->modelo);
            $stmt->bindParam(':id_marca', $this->id_marca);
            $stmt->bindParam(':fabricacion', $this->fabricacion);
            $stmt->bindParam(':tipo_vehiculo', $this->tipo_vehiculo);
            $stmt->bindParam(':id_modelo', $id_modelo); // Usar el parámetro de entrada
        
            try {
                $stmt->execute();
                return $stmt->rowCount() > 0; 
            } catch (PDOException $e) {
                die("Error al editar el modelo: " . $e->getMessage());
            } 
            return false; 
        }
        
    
        public function eliminar($id_modelo) {
            $sql = "DELETE FROM modelos WHERE id_modelo = :id_modelo";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_modelo', $id_modelo);
        
            try {
                $stmt->execute();
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                die("Error al eliminar el modelo: " . $e->getMessage());
            }
            return false; 
        }
        
        public function NoDobles($modelo, $id_marca) {
            $sql = "SELECT COUNT(*) AS count FROM modelos WHERE modelo = :modelo AND id_marca = :id_marca";
            
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':id_marca', $id_marca);
        
            try {
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado['count'] > 0; // Devuelve true si ya existe un modelo con el mismo nombre para esa marca
            } catch (PDOException $e) {
                return false;
            }
        }
      

    }

?>