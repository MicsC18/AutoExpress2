<?php

include(__DIR__.'../../Conexion/Conexion.php');

class roles_usuarios {

    private $id;
    private $id_rol;
    private $id_usuario;
    private $conexion;

    public function __construct($id,$id_rol,$id_usuario) {

        $this->id = $id;
        $this->id_rol = $id_rol;
        $this->id_usuario = $id_usuario;

        try {
            $this->conexion = $GLOBALS['conn'];
        } catch (PDOException $e) {
            die("Error en la conexión de base de datos: " . $e->getMessage());
        }
    }


    public function editar($id_rol, $id_usuario) {
        $sql = "UPDATE roles_usuarios SET id_rol = :id_rol WHERE id_usuario = :id_usuario";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_rol', $id_rol);
        $stmt->bindParam(':id_usuario', $id_usuario);
        
        try {
            $stmt->execute();
            return $stmt->rowCount() > 0; 
        } catch (PDOException $e) {
            error_log("Error al editar la marca: " . $e->getMessage());
        } 
        return false; 
    }
    
}
?>

