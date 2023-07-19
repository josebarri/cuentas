<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNumero"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtEmpleado"])|| empty($_POST["txtCliente"])){
        header('Location: sucursal.php?mensaje=falta');
        exit();
    }

    include_once 'config/conexion.php';
    $sucursal = $_POST["txtNumero"];
    $direccion = $_POST["txtDireccion"];
    $empleado = $_POST["txtEmpleado"];
    $cliente = $_POST["txtCliente"];
    
    $sentencia = $conn->prepare("INSERT INTO sucursal(num_sucursal,direccion,codigoEmpleado,DniCliente) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$sucursal,$direccion,$empleado,$cliente]);

    if ($resultado === TRUE) {
        header('Location: sucursal.php?mensaje=registrado');
    } else {
        header('Location: sucursal.php?mensaje=error');
        exit();
    }
    
?>