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
        <title>!Bienvenido <?php echo $client; ?></title>
    </head>
    <body>
        <?php
            include("../components/navigationPF.php");
        ?>
        <h1>Consultar pagos</h1>  
        <h1>id: <?php echo $_SESSION['id']; ?></h1>
         
    </body>
</html>