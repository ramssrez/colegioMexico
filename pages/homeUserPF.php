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
    <body class="background-home">
        <?php
            include("../components/navigationPF.php");
        ?> 
        <h1 class="bienvenido">!Bienvenid@ <?php echo $client; ?> <?php echo $_SESSION['apellidoPa']; ?> <?php echo $_SESSION['apellidoMa']; ?>!</h1>
        <h2 class="bienvenido-dos">¡Has ingresado como <?php echo $_SESSION['tipo']; ?>!</h2>
    </body>
</html>