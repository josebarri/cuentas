<?php include 'template/cabecera.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: empleados.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $codigo = $_GET['codigo'];

    $sql ="SELECT * FROM empleados WHERE codigo ='".$codigo."'";
    $resultado = mysqli_query($conn, $sql); 
     while ($fila=mysqli_fetch_assoc($resultado)){

     
    
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="empleadoedit.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo: </label>
                        <input type="text" class="form-control" name="txtCodigo" required 
                        value="<?php echo $fila['codigo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cedula: </label>
                        <input type="text" class="form-control" name="txtCedula" autofocus required
                        value="<?php echo $fila['cedula'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required
                        value="<?php echo $fila['nombre'] ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $fila['codigo'] ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                        <a href="empleados.php" class="btn btn-danger">Cacelar</a>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'template/pie.php' ?>