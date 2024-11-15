<?php

    include(__DIR__.'../../Conexion/Conexion.php');

    class roles {

        private $id;
        private $nombre;
        private $conexion;

        public function __construct($id,$nombre) {
            $this->id = $id;
            $this->nombre = $nombre;
    
            try {
                $this->conexion = $GLOBALS['conn'];
            } catch (PDOException $e) {
                die("Error en la conexión de base de datos: " . $e->getMessage());
            }
        }

      
    }
?>