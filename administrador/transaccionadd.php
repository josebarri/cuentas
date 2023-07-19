<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCodigo"]) || empty($_POST["txtTipo"]) || empty($_POST["txtFecha"])|| empty($_POST["txtValor"])){
        header('Location: transaccion.php?mensaje=falta');
        exit();
    }

    include_once 'config/conexion.php';
    $codigo = $_POST["txtCodigo"];
    $tipo = $_POST["txtTipo"];
    $fecha = $_POST["txtFecha"];
    $valor = $_POST["txtValor"];
    
    $sentencia = $conn->prepare("INSERT INTO transaccion(valor,fecha,tipo_transaccionn,codigo_transaccion) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$valor,$fecha,$tipo,$codigo]);

    if ($resultado === TRUE) {
        header('Location: transaccion.php?mensaje=registrado');
    } else {
        header('Location: transaccion.php?mensaje=error');
        exit();
    }
    
?>