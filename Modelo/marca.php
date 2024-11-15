<?php

include('../../Conexion/Conexion.php');

class Marca {

    private $id_marca;
    private $nombre;
   // private $id_modelo;
    private $conexion;

    public function __construct($id_marca,$nombre,/* $id_modelo*/) {
        $this->id_marca = $id_marca;
        $this->nombre = $nombre;
      
        //$this -> id_modelo = $id_modelo;

        try {
            $this->conexion = $GLOBALS['conn'];
        } catch (PDOException $e) {
            die("Error en la conexión de base de datos: " . $e->getMessage());
        }
    }

    public function agregar() {
        $sql = "INSERT INTO marcas (nombre) VALUES (:nombre)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $this->nombre);
        
        try {
            $stmt->execute();
            echo "Marca agregada correctamente.";
        } catch (PDOException $e) {
            die("Error al agregar la marca: " . $e->getMessage());
        }
    }

    public function mostrar(){
        $sql = "SELECT * FROM marcas";
        $stmt = $this->conexion->prepare($sql);
        try{
            $stmt->execute();
        }catch(PDOException $e){
            die("Error al mostrar las marca: " . $e->getMessage());
        }
    }
    
    public function editar($nombre, $id_marca) {
        $sql = "UPDATE marcas SET nombre = :nombre WHERE id_marca = :id_marca";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_marca', $id_marca);
        
        try {
            $stmt->execute();
            return $stmt->rowCount() > 0; // Devuelve true si se actualizó al menos una fila
        } catch (PDOException $e) {
            error_log("Error al editar la marca: " . $e->getMessage());
        } 
        return false; 
    }

    public function eliminar($id_marca) {
        $sql = "DELETE FROM marcas WHERE id_marca = :id_marca";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_marca', $id_marca);
    
        try {
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error al eliminar la marca: " . $e->getMessage());
            return false; 
        }
        
    }
    
    public function NoDobles($nombre) {
    
        $sql = "SELECT COUNT(*) AS count FROM marcas WHERE nombre = :nombre" ;
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);

        try {
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['count'] > 0; // Devuelve true si hay marcas con el mismo nombre
        } catch (PDOException $e) {
            error_log("Error al verificar la marca: " . $e->getMessage());
            return false;
        }
    }
    
}
?>

