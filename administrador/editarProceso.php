<?php
    print_r($_POST);
    if(!isset($_POST['txtCuenta'])){
        header('Location: cuentas.php?mensaje=error');
    }

    include 'config/conexion.php';
    $cuenta = $_POST["txtCuenta"];
    $saldo = $_POST["txtSaldo"];
    $valor = $_POST["txtValor"];

    $sentencia = $conn->prepare("UPDATE cuenta SET saldo = ?, valor_retiro = ? where numero_cuenta = ?;");
    $sentencia->bind_param("sss", $saldo, $valor, $cuenta);
    $resultado = $sentencia->execute();

    if ($resultado === TRUE) {
        header('Location: cuentas.php?mensaje=editado');
    } else {
        header('Location: cuentas.php?mensaje=error');
        exit();
    }
    
?>