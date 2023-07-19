<?php include 'template/cabecera.php' ?>

<?php
    if(!isset($_GET['codigo_transaccion'])){
        header('Location: empleados.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $codigo = $_GET['codigo_transaccion'];

    $sql ="SELECT * FROM transaccion WHERE codigo_transaccion ='".$codigo."'";
    $resultado = mysqli_query($conn, $sql); 
     while ($fila=mysqli_fetch_assoc($resultado)){
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editartrans.php">
                    <div class="mb-3">
                        <label class="form-label">C. transaccion:</label>
                        <input type="text" class="form-control" name="txtCodigo" required 
                        value="<?php echo $fila['codigo_transaccion'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">T.Transaccion::</label>
                        <input type="text" class="form-control" name="txtTipo" autofocus required
                        value="<?php echo $fila['tipo_transaccionn'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha::</label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $fila['fecha'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor::</label>
                        <input type="text" class="form-control" name="txtValor" autofocus required
                        value="<?php echo $fila['valor'] ?>">
                    </div>
                    
                    
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $fila['codigo_transaccion'] ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                        <a href="transaccion.php" class="btn btn-danger">Cacelar</a>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'template/pie.php' ?>