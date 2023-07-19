<?php include 'template/cabecera.php' ?>

<?php
    if(!isset($_GET['Dni'])){
        header('Location: clientes.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $codigo = $_GET['Dni'];

    $sql ="SELECT * FROM cliente WHERE Dni ='".$codigo."'";
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
                <form class="p-4" method="POST" action="editcliente.php">
                    <div class="mb-3">
                        <label class="form-label">Dni:</label>
                        <input type="text" class="form-control" name="txtDni" required 
                        value="<?php echo $fila['Dni'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required
                        value="<?php echo $fila['nombre'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion</label>
                        <input type="txt" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $fila['direccion'] ?>">
                    </div>
                    <div class="mb-3">

                            <label for="txtPrecio"># Cuentas:</label>
                            <select class="form-select  form-group" name="txtNcuenta">
                                
                                <?php
                                include_once("config/conexion.php");
                                $consulta1 = "SELECT * FROM cuenta WHERE numero_cuenta=".$fila['numero_cuenta'];
                                $resultado1 = $conn->query($consulta1);
                                $datos = $resultado1->fetch_assoc(); 
                                 
                                    echo " <option value='" . $datos['numero_cuenta'] . "'>" . $fila['numero_cuenta'] . "</option>";
                               $consulta2 = "SELECT * fROM cuenta";
                               $resultado2 = $conn->query($consulta2);

                               while ($dato2 = $resultado2->fetch_assoc()){
                                echo " <option value='" . $dato2['numero_cuenta'] . "'>" . $dato2['numero_cuenta'] . "</option>";
                               }

                                ?>
                            </select>

                        </div>
                    
                    
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $fila['Dni'] ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                        <a href="clientes.php" class="btn btn-danger">Cacelar</a>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'template/pie.php' ?>