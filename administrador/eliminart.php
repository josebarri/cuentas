<?php 
    if(!isset($_GET['id'])){
        header('Location: transaccioneliminada.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $codigo = $_GET['id'];

    $sentencia = $conn->prepare("DELETE FROM transaccion_eliminada where id = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: transaccioneliminada.php?mensaje=eliminado');
    } else {
        header('Location: transaccioneliminada.php?mensaje=error');
    }
    
?>