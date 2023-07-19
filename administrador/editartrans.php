<?php
    if(!isset($_POST['txtCodigo'])){
        header('Location: transaccion.php?mensaje=error');
    }

    include 'config/conexion.php';
    $codigo = $_POST["txtCodigo"];
    $tipo = $_POST["txtTipo"];
    $fecha = $_POST["txtFecha"];
    $valor = $_POST["txtValor"];

    $sentencia = $conn->prepare("UPDATE transaccion SET valor = ?, fecha = ?, tipo_transaccionn = ? where codigo_transaccion = ?");
    $sentencia->bind_param("ssss",$valor,$fecha,$tipo,$codigo);
    $resultado = $sentencia->execute();


    if ($resultado === TRUE) {
        header('Location: transaccion.php?mensaje=editado');
    } else {
        header('Location: transaccion.php?mensaje=error');
        exit();
    }
    
?>