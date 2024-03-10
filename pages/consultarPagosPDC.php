<?php
    session_start();
    if($_SESSION['user']){
        $client = $_SESSION['user'];
    }
    else{
        header("Location: ../index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <title>!Bienvenid@ <?php echo $client; ?></title>
    </head>
    <body>
        <?php
            include("../components/navigationPDC.php");
        ?>
        <div class="contenedor">
            <h2>Búsqueda de pagos</h2>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 1 )
                {
                    echo "<p class='error'>*Error: El campo esta vacío.</p>";
                } 
                if(isset($_GET['error']) && $_GET['error'] == 2 )
                {
                    echo "<p class='error'>*Error: El usuario ingresado, no existe.</p>";
                }  
            ?>
            <form action="../config/busquedaIDUsuario.php" method="POST">
                <div class="elemento">
                    <label for="usuario">IDUsuario</label>
                    <input type="text" id="usuario" name="IDUser" >
                </div>
                <div class="elemento">
                    <input type="submit" value="Búscar">
                </div>
            </form>
        </div>
        <h1>Consulta de pagos</h1>
    </body>
</html>