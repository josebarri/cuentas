<?php
    if(!isset($_POST['txtNumero'])){
        header('Location: sucursal.php?mensaje=error');
    }

    include 'config/conexion.php';
    $sucursal = $_POST["txtNumero"];
    $direccion = $_POST["txtDireccion"];
    $empleado = $_POST["txtEmpleado"];
    $cliente = $_POST["txtCliente"];

    $sentencia = $conn->prepare("UPDATE sucursal SET direccion = ?, codigoEmpleado = ?, DniCliente = ? where num_sucursal = ?");
    $sentencia->bind_param("ssss", $direccion,$empleado,$cliente, $sucursal);
    $resultado = $sentencia->execute();


    if ($resultado === TRUE) {
        header('Location: sucursal.php?mensaje=editado');
    } else {
        header('Location: sucursal.php?mensaje=error');
        exit();
    }
    
?>