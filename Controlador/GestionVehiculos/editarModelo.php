<?php
    require_once('../../Modelo/modelo.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $id_modelo=$_POST['id_modelo'];
        $nombreModelo=$_POST['nombreModeloNuevo'];
        $marca=$_POST['MarcaModelo'];
        $fabricacion=$_POST['FabricacionNuevo'];
        $TipoVehiculo=$_POST['tipoVehiculoNuevo'];

        if(empty($nombreModelo) || empty($marca) || empty($fabricacion) || empty($TipoVehiculo)){
            echo'Campos vacios';
            exit();
        }

        $objModelo= new modelo($id_modelo,$nombreModelo,$marca,$fabricacion,$TipoVehiculo);
        $existe=$objModelo->NoDobles($nombreModelo,$marca);

        if($existe){
            $_SESSION['mensaje'] = 'El modelo ya fue agregado y existe en la bdd.';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos'); 
            exit();
        }else{
            $editar=$objModelo->editar($id_modelo);
            if($editar){
                header('Location: ../../Vistas/GestionVehiculos/IndexGV.php#modelos'); 
                exit();
            }
        }
        exit();

    }




?>