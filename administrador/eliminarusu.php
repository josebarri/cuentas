<?php 
    if(!isset($_GET['codigo'])){
        header('Location: empleados.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $conn->prepare("DELETE FROM empleados where codigo = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: empleados.php?mensaje=eliminado');
    } else {
        header('Location: empleados.php?mensaje=error');
    }
    
?>