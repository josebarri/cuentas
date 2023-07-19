<?php
    if(!isset($_POST['txtDni'])){
        header('Location: clientes.php?mensaje=error');
    }

    include 'config/conexion.php';
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $direccion = $_POST["txtDireccion"];
    $ncuenta = $_POST["txtNcuenta"];

    $sentencia = $conn->prepare("UPDATE cliente SET nombre = ?, direccion = ?, numero_cuenta = ? where Dni = ?");
    $sentencia->bind_param("ssss",$nombre,$direccion,$ncuenta,$dni);
    $resultado = $sentencia->execute();


    if ($resultado === TRUE) {
        header('Location: clientes.php?mensaje=editado');
    } else {
        header('Location: clientes.php?mensaje=error');
        exit();
    }
    
?>