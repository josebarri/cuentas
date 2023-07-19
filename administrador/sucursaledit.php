<?php include 'template/cabecera.php' ?>

<?php
    if(!isset($_GET['num_sucursal'])){
        header('Location: sucursal.php?mensaje=error');
        exit();
    }

    include_once 'config/conexion.php';
    $codigo = $_GET['num_sucursal'];

    $sql ="SELECT * FROM sucursal WHERE num_sucursal ='".$codigo."'";
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
                <form class="p-4" method="POST" action="editsucursal.php">

                    <div class="mb-3">
                        <label class="form-label">N. Sucursal:</label>
                        <input type="text" class="form-control" name="txtNumero" required 
                        value="<?php echo $fila['num_sucursal'] ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $fila['direccion'] ?>">
                    </div>

                    <div class="mb-3">
                            <label for="txtPrecio">COD. Empleado:</label>
                            <select class="form-select  form-group" name="txtEmpleado">
                                
                                <?php
                                include_once("config/conexion.php");
                                $consulta1 = "SELECT * FROM empleados WHERE codigo=".$fila['codigoEmpleado'];
                                $resultado1 = $conn->query($consulta1);
                                $datos = $resultado1->fetch_assoc(); 
                                 
                                    echo " <option value='" . $datos['codigo'] . "'>" . $fila['codigoEmpleado'] . "</option>";
                               $consulta2 = "SELECT * fROM empleados";
                               $resultado2 = $conn->query($consulta2);

                               while ($dato2 = $resultado2->fetch_assoc()){
                                echo " <option value='" . $dato2['codigo'] . "'>" . $dato2['codigo'] . "</option>";
                               }

                                ?>
                            </select>
                        </div>

                    <div class="mb-3">
                         <label for="txtPrecio">Dni. Cliente:</label>
                            <select class="form-select  form-group" name="txtCliente">
                                
                                <?php
                                include_once("config/conexion.php");
                                $consulta3 = "SELECT * FROM cliente WHERE Dni=".$fila['DniCliente'];
                                $resultado3 = $conn->query($consulta3);
                                $dato3 = $resultado3->fetch_assoc(); 
                                 
                                    echo " <option value='" . $dato3['Dni'] . "'>" . $fila['DniCliente'] . "</option>";
                               $consulta4 = "SELECT * fROM cliente";
                               $resultado4 = $conn->query($consulta4);

                               while ($dato4 = $resultado4->fetch_assoc()){
                                echo " <option value='" . $dato4['Dni'] . "'>" . $dato4['Dni'] . "</option>";
                               }

                                ?>
                            </select>
                        </div>
                    
                    
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $fila['num_sucursal'] ?>">
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