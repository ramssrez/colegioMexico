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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Document</title>
    </head>
    <body>
        <?php
            include("../components/navigationPDC.php");
        ?>
        <h1>!Bienvenido <?php echo $client; ?> <?php echo $_SESSION['apellidoPa']; ?> <?php echo $_SESSION['apellidoMa']; ?>!</h1>
        <h2>¡Has ingresado como <?php echo $_SESSION['tipo']; ?>!</h2>
    </body>
</html>