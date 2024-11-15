<?php
    include('../../Conexion/Conexion.php');

    class unidades{

        private $id_unidad;
        private $color;
        private $puertas;
        private $aire_acondicionado;
        private $transmision;
        private $combustible;
        private $cantidad_personas;
        private $cantidad_maletas;
        private $imagen_url;
        private $id_modelo;
        private $id_marca;
        private $disponibilidad;
        private $conexion;


        public function __construct($id_unidad,$color,$puertas,$aire_acondicionado,$transmision,$combustible,$cantidad_personas,$cantidad_maletas,$imagen_url,$id_modelo ,$id_marca,$disponibilidad){

                $this -> id_unidad = $id_unidad;
                $this -> color = $color;
                $this -> puertas= $puertas;
                $this ->aire_acondicionado =$aire_acondicionado;
                $this -> transmision= $transmision;
                $this -> combustible= $combustible;
                $this -> cantidad_personas= $cantidad_personas;
                $this -> cantidad_maletas= $cantidad_maletas;
                $this -> imagen_url= $imagen_url;
                $this -> id_modelo= $id_modelo;
                $this -> id_marca= $id_marca;
                $this -> disponibilidad= $disponibilidad;

                try {
                    $this->conexion = $GLOBALS['conn'];
                } catch (PDOException $e) {
                    die("Error en la conexión de base de datos: " . $e->getMessage());
                }
        }

        public function agregar() {
            $sql = "INSERT INTO unidades (color, puertas, aire_acondicionado, transmision, combustible, cantidad_personas, cantidad_maletas, imagen_url, id_modelo, id_marca, disponibilidad) 
                    VALUES (:color, :puertas, :aire_acondicionado, :transmision, :combustible, :cantidad_personas, :cantidad_maletas, :imagen_url, :id_modelo, :id_marca, :disponibilidad)";
           
           $stmt = $this->conexion->prepare($sql);

            $stmt->bindParam(':color', $this->color);
            $stmt->bindParam(':puertas', $this->puertas);
            $stmt->bindParam(':aire_acondicionado', $this->aire_acondicionado);
            $stmt->bindParam(':transmision', $this->transmision);
            $stmt->bindParam(':combustible', $this->combustible);
            $stmt->bindParam(':cantidad_personas', $this->cantidad_personas);
            $stmt->bindParam(':cantidad_maletas', $this->cantidad_maletas);
            $stmt->bindParam(':imagen_url', $this->imagen_url);
            $stmt->bindParam(':id_modelo', $this->id_modelo);  // Eliminado espacio extra
            $stmt->bindParam(':id_marca', $this->id_marca);
            $stmt->bindParam(':disponibilidad', $this->disponibilidad);

            try {
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                // Log detallado y opcionalmente mostrar un mensaje de error amigable
                error_log("Error al agregar la unidad en la BD: " . $e->getMessage());
                $_SESSION['mensaje'] = 'Error al agregar la unidad. Inténtalo de nuevo.';
                return false;
            }

        }

        public function mostrar() {
            $sql = "SELECT * FROM unidades";
            $stmt = $this->conexion->prepare($sql);
            
            try {
                $stmt->execute(); // Execute the statement
                return $stmt;     // Return the executed statement
            } catch (PDOException $e) {
                error_log("Error al mostrar las unidades: " . $e->getMessage());
                return false;
            }
        }

        public function eliminar($id_unidad) {
            $sql = "DELETE FROM unidades WHERE id_unidad = :id_unidad";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_unidad', $id_unidad);
        
            try {
                $stmt->execute();
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                die("Error al eliminar la unidad: " . $e->getMessage());
            }
            return false; 
        }

        public function buscarMarcaYModelo($id_unidad) {
            $sql = "SELECT id_marca, id_modelo FROM unidades WHERE id_unidad = :id_unidad";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id_unidad', $id_unidad);
        
            try {
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($result) {
                    return $result;
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                die("Error al buscar la unidad: " . $e->getMessage());
            }
        }
        
        
    }


?>