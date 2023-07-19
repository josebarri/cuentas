<?php 
    if(!isset($_GET['codigo_transaccion'])){
        header('Location: transaccion.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $codigo = $_GET['codigo_transaccion'];

    $sentencia = $conn->prepare("DELETE FROM transaccion where codigo_transaccion = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: transaccion.php?mensaje=eliminado');
    } else {
        header('Location: transaccion.php?mensaje=error');
    }
    
?>