<?php include("template/cabecera.php"); ?>

<?php
include_once("config/conexion.php");
$consulta = "SELECT DISTINCT tipo_transaccionn, obtenerSumaTotal(tipo_transaccionn) AS suma_total FROM transaccion";
$resultado = mysqli_query($conn, $consulta);;
//print_r($productos);
?>


<!--inicio del contenido -->
<section>
    <article class="">

        <div class="container">

            <h2 class="text-center">¡ Reportes<span style="color: #2874A6;">Tipos de transacciones!</span></h2>


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
                                <th class="text-center">Tipo Transaccion</th>
                                <th class="text-center">Suma Valor Total</th>
                                
                        </thead>
                        <tbody>
                            <?php
                            while ($dato = mysqli_fetch_object($resultado)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $dato->tipo_transaccionn; ?></td>
                                    <td class="text-center"><?php echo $dato->suma_total; ?></td>
                                    
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