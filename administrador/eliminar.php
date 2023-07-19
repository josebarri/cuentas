<?php 
    if(!isset($_GET['numero_cuenta'])){
        header('Location: cuentas.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $cuenta = $_GET['numero_cuenta'];

    $sentencia = $conn->prepare("DELETE FROM cuenta where numero_cuenta = ?;");
    $resultado = $sentencia->execute([$cuenta]);

    if ($resultado === TRUE) {
        header('Location: cuentas.php?mensaje=eliminado');
    } else {
        header('Location: cuentas.php?mensaje=error');
    }
    
?>