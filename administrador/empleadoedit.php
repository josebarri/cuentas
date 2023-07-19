<?php
    if(!isset($_POST['txtCodigo'])){
        header('Location: empleados.php?mensaje=error');
        exit();
    }

    include 'config/conexion.php';
    $codigo = $_POST['txtCodigo'];
    $cedula = $_POST['txtCedula'];
    $nombre = $_POST['txtNombre'];

    $sentencia = $conn->prepare("UPDATE empleados SET cedula = ?, nombre = ? WHERE codigo = ?");
    $sentencia->bind_param("sss", $cedula, $nombre, $codigo);
    $resultado = $sentencia->execute();

    if ($resultado === TRUE) {
        header('Location: empleados.php?mensaje=editado');
        exit();
    } else {
        header('Location: empleados.php?mensaje=error');
        exit();
    }
    
?>