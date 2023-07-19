<?php include("template/cabecera.php"); ?>

<?php
include_once("config/conexion.php");
$consulta = "SELECT * FROM sucursal";
$resultado = mysqli_query($conn, $consulta);
//print_r($productos);
?>


<!--inicio del contenido -->
<section>
    <article class="">

        <div class="container">

            <h2 class="text-center">¡Gestion de <span style="color: #2874A6;">Sucursales!</span></h2>


            <!-- alerta de mensage-->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {


            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php
            }
            ?>




            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {


            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se guardaron los datos
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {


            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {


            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {


            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php
            }
            ?>



            <div class="row mt-5">

                <div class="col-md-8 d-flex align-self-center">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>N. Sucursal</th>
                                <th>Direccion</th>
                                <th>COD. Empleado</th>
                                <th>Dni. Cliente</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($dato = mysqli_fetch_object($resultado)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $dato->num_sucursal; ?></td>
                                    <td class="text-center"><?php echo $dato->direccion; ?></td>
                                    <td class="text-center"><?php echo $dato->codigoEmpleado; ?></td>
                                    <td class="text-center"><?php echo $dato->DniCliente; ?></td>
                                    <td class="text-center"><a class="text-success" href="sucursaledit.php?num_sucursal=<?php echo $dato->num_sucursal; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="sucursaldelete.php?num_sucursal=<?php echo $dato->num_sucursal; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">
                            Sucursal
                        </div>
                        <div class="card-body">
                            <form method="POST" action="sucursaladd.php">


                                <div class="form-group">
                                    <label for="txtNombre">N. Sucursal:</label>
                                    <input type="text" class="form-control" name="txtNumero" placeholder="Ingresa el numero de sucursal" autofocus required>
                                </div>

                                <div class="form-group">
                                    <label for="">Direccion:</label>
                                    <input type="text" class="form-control" name="txtDireccion" placeholder="Ingresa la direccion" autofocus required>
                                </div>

                                <div class="form-group">
                                <label for="txtPrecio">COD. Empleado:</label>
                                <select class="form-select  form-group" name="txtEmpleado">
                                    <option selected disabled>-- COD. Empleado --</option>
                                    <?php
                                    include_once("config/conexion.php");
                                    $consulta = $conn->query("SELECT * FROM empleados");
                                    while($datos = $consulta->fetch_assoc()) {
                                        echo " <option value='".$datos['codigo']."'>".$datos['codigo']."</option>";
                                    }
                            
                                        ?>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="txtPrecio">Dni. Cliente:</label>
                                <select class="form-select  form-group" name="txtCliente">
                                    <option selected disabled>-- Dni. Cliente --</option>
                                    <?php
                                    include_once("config/conexion.php");
                                    $consulta = $conn->query("SELECT * FROM cliente");
                                    while($datos1 = $consulta->fetch_assoc()) {
                                        echo " <option value='".$datos1['Dni']."'>".$datos1['Dni']."</option>";
                                    }
                            
                                        ?>
                                </select>
                                </div>

                                <div class="d-grid">
                                    <input type="hidden" name="oculto" value="1">
                                    <input type="submit" class="btn btn-success" value="Registrar">

                                </div>

                            </form>

                        </div>

                    </div>




                </div>
            </div>
        </div>
    </article>
</section>
<!--fin del contenido -->


<?php include("template/pie.php"); ?>