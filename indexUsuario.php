<?php
include 'global/config.php';
include "global/sesiones.php";
include 'global/conexion.php';
include 'templates/cabeceraUsuario.php';
include 'templates/sidebar.php';
?>

    <div class="content-wrapper" style="padding: 1%">

        <div class="row">
            
            <?php 
            
               $response = json_decode(file_get_contents('http://localhost/gift.com/productos/api-productos.php?Elementos=verdadero'),true); 
                if($response['statuscode'] == 200){
                    foreach($response['items'] as $item){
                        include('layout/items.php');
                    }

                }
                 ?>
  
        </div>
        <script>

        $(function () {
            $('[data-toggle="popover"]').popover()
        });

        </script>

    </div>
<?php
include 'templates/piePagina.php';
?>

