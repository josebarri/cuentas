<?php 
    if(!isset($_GET['num_sucursal'])){
        header('Location: clientes.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $codigo = $_GET['num_sucursal'];

    $sentencia = $conn->prepare("DELETE FROM sucursal where num_sucursal = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: sucursal.php?mensaje=eliminado');
    } else {
        header('Location: sucursal.php?mensaje=error');
    }
    
?>