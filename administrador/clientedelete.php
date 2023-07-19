<?php 
    if(!isset($_GET['Dni'])){
        header('Location: clientes.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $codigo = $_GET['Dni'];

    $sentencia = $conn->prepare("DELETE FROM cliente where Dni = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: clientes.php?mensaje=eliminado');
    } else {
        header('Location: clientes.php?mensaje=error');
    }
    
?>