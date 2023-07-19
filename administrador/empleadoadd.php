<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCodigo"]) || empty($_POST["txtCedula"]) || empty($_POST["txtNombre"])){
        header('Location: empleados.php?mensaje=falta');
        exit();
    }

    include_once 'config/conexion.php';
    $codigo = $_POST["txtCodigo"];
    $cedula = $_POST["txtCedula"];
    $nombre = $_POST["txtNombre"];
    
    $sentencia = $conn->prepare("INSERT INTO empleados(codigo,cedula,nombre) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$codigo,$cedula,$nombre]);

    if ($resultado === TRUE) {
        header('Location: empleados.php?mensaje=registrado');
    } else {
        header('Location: empleados.php?mensaje=error');
        exit();
    }
    
?>