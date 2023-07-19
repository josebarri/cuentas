<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtDni"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDireccion"])|| empty($_POST["txtNcuenta"])){
        header('Location: clientes.php?mensaje=falta');
        exit();
    }

    include_once 'config/conexion.php';
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $direccion = $_POST["txtDireccion"];
    $ncuenta = $_POST["txtNcuenta"];
    
    $sentencia = $conn->prepare("INSERT INTO cliente(Dni,nombre,direccion,numero_cuenta) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$dni,$nombre,$direccion,$ncuenta]);

    if ($resultado === TRUE) {
        header('Location: clientes.php?mensaje=registrado');
    } else {
        header('Location: clientes.php?mensaje=error');
        exit();
    }
    
?>