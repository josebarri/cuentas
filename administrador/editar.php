<?php include 'template/cabecera.php' ?>

<?php
if (!isset($_GET['numero_cuenta'])) {
    header('Location: Productos.php?mensaje=error');
    exit();
}

include_once 'config/conexion.php';
$cuenta = $_GET['numero_cuenta'];

$sql = "SELECT * FROM cuenta WHERE numero_cuenta ='" . $cuenta . "'";
$resultado = mysqli_query($conn, $sql);
while ($fila = mysqli_fetch_assoc($resultado)) {
    //print_r($persona);
?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Editar datos:
                    </div>
                    <form class="p-4" method="POST" action="editarProceso.php">
                        <div class="mb-3">
                            <label class="form-label"># cuenta: </label>
                            <input type="text" class="form-control" name="txtCuenta" required value="<?php echo $fila['numero_cuenta'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Saldo: </label>
                            <input type="txt" class="form-control" name="txtSaldo" autofocus required value="<?php echo $fila['saldo'] ?>">
                        </div>
                        <div class="mb-3">

                            <label for="txtPrecio">Valor Retiro:</label>
                            <select class="form-select  form-group" name="txtValor">
                                
                                <?php
                                include_once("config/conexion.php");
                                $consulta1 = "SELECT * FROM transaccion WHERE valor=".$fila['valor_retiro'];
                                $resultado1 = $conn->query($consulta1);
                                $datos = $resultado1->fetch_assoc(); 
                                 
                                    echo " <option value='" . $datos['valor'] . "'>" . $fila['valor_retiro'] . "</option>";
                               $consulta2 = "SELECT * fROM transaccion";
                               $resultado2 = $conn->query($consulta2);

                               while ($dato2 = $resultado2->fetch_assoc()){
                                echo " <option value='" . $dato2['valor'] . "'>" . $dato2['valor'] . "</option>";
                               }

                                ?>
                            </select>

                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="id" value="<?php echo $fila['numero_cuenta']; ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                            <a href="cuentas.php" class="btn btn-danger">Cacelar</a>
                        </div>
                    </form>
                <?php }?>
                
                </div>
            </div>
        </div>
    </div>

    <?php include 'template/pie.php' ?>