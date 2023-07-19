<?php include("template/cabecera.php"); ?>

<?php
include_once("config/conexion.php");
$consulta = "SELECT * FROM transaccion_eliminada";
$resultado = mysqli_query($conn, $consulta);;
//print_r($productos);
?>


<!--inicio del contenido -->
<section>
    <article class="">

        <div class="container">

            <h2 class="text-center">¡ Reportes<span style="color: #2874A6;">Transacciones Eliminadas!</span></h2>


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




            <div class="mt-5">

                <div class="align-self-center">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Tipo Transaccion</th>
                                <th class="text-center">Codigo Transaccion</th>
                                <th scope="col" colspan="2">Opciones</th>

                        </thead>
                        <tbody>
                            <?php
                            while ($dato = mysqli_fetch_object($resultado)) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td class="text-center"><?php echo $dato->valor; ?></td>
                                    <td class="text-center"><?php echo $dato->fecha; ?></td>
                                    <td class="text-center"><?php echo $dato->tipo_transaccion; ?></td>
                                    <td class="text-center"><?php echo $dato->codigo_transaccion; ?></td>
                                    <td class="text-center"><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminart.php?id=<?php echo $dato->id; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></a></td>

                                </tr>
                                

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </article>
</section>
<!--fin del contenido -->


<?php include("template/pie.php"); ?>