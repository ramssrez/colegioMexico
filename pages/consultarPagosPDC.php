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
        <h1>Consulta de pagos</h1>
    </body>
</html>