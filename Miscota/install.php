<?php ob_start(); ?>
<?php 
$tituloPagina = "Instalacion aplicacion" ;
$pagina = "install";
include('inc/header.php'); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Instalación</h1>
        <p>¡Bienvenido al proceso de instalación de la página MISCOTA!
      Solo te llevara un momento.
      Debes rellenar los campos del siguiente formulario y una vez completado, podrá disfrutar de la página web m´s completa en prductos para perros</p>

        
        <form role="form" method="post" enctype="multipart/form-data">
            <legend>Rellene el siguiente formulario:</legend>

            <div class="form-group">
                <label for="nombre">Nombre de usuario</label>
                <input type="text" class="form-control" name="us" placeholder="Introduce nombre" required>
            </div>
        
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="pw" placeholder="Introduce tu contraseña" required>
            </div>
            
            <div class="form-group">
                <label for="password">Host de la Base de Datos</label>
                <input type="text" class="form-control" name="lc" placeholder="Introduce host" required>
            </div>
            
            <div class="form-group">
                <label for="password">Nombre de la Base de Datos</label>
                <input type="text" class="form-control" name="db" placeholder="Introduce nombre de la BBDD" required>
            </div>

            <span><input type="submit" value="ACEPTAR"></span><br><br>
            <span><input type="reset" value="LIMPIAR"></span>

        </form>


        <?php
          if(isset($_POST["us"])){
              $username=$_POST["us"];
              $password=$_POST["pw"];
              $database=$_POST["db"];
              $localhost=$_POST["lc"];
              $connection = new mysqli($localhost, $username, $password, $database);
                 //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                   printf("Connection failed: %s\n", $connection->connect_error);
                   exit();
              }
              else {
                include("miscota.php");
                $file = fopen("inc/vconexion.php", "a");
                fwrite($file, "<?php"."\n");
                fwrite($file, "$"."localhost="."'".$localhost."';");
                fwrite($file, "$"."username="."'".$username."';");
                fwrite($file, "$"."password="."'".$password."';");
                fwrite($file, "$"."database="."'".$database."';"); 
                fwrite($file, "?>"."\n");
                fclose($file);

                unlink('install.php');
                unlink('miscota.php');
                rmdir('install.php');
                rmdir('miscota.php');

              header("Location: index.php");
              }
          }

        ?> 

          

    </div>
</div>
<?php ob_end_flush(); ?>