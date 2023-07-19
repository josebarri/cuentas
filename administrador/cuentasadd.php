<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtCuenta"]) || empty($_POST["txtSaldo"]) || empty($_POST["txtValor"])){
        header('Location: cuentas.php?mensaje=falta');
        exit();
    }

    include_once 'config/conexion.php';
    $cuenta = $_POST["txtCuenta"];
    $saldo = $_POST["txtSaldo"];
    $valor = $_POST["txtValor"];
   
    
    $sentencia = $conn->prepare("INSERT INTO cuenta(numero_cuenta,saldo,valor_retiro) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$cuenta,$saldo,$valor]);

    if ($resultado === TRUE) {
        header('Location: cuentas.php?mensaje=registrado');
    } else {
        header('Location: cuentas.php?mensaje=error');
        exit();
    }
    
?>