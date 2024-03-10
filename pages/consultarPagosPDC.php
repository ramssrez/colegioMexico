<?php
    session_start();
    if($_SESSION['user']){
        $client = $_SESSION['user'];
    }
    else{
        header("Location: ../index.php");
        die();
    }
    if(isset($_POST[''])){

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
            <form method="POST">
                <div class="elemento">
                    <label for="usuario">IDUsuario</label>
                    <input type="number" id="usuario" name="IDUser" >
                </div>
                <div class="elemento">
                    <input type="submit" value="Búscar">
                </div>
            </form>
        </div>
        <h1>Consulta de pagos</h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include '../config/conexion.php';
                $IDUsuario = $_POST['IDUser'];
                $consultaIsUser = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno,IDUsuario FROM usuarios WHERE IDUsuario = :idUser";
                $statement = $conexion -> prepare($consultaIsUser);
                $statement->bindParam(':idUser',$IDUsuario);
                $statement->execute();
                $existUser = $statement->fetch(PDO::FETCH_ASSOC);
                if(empty($IDUsuario)){
                    echo "<p class='error-page'>El campo del IDUsuario esta vacío.</p>";
                }else if(!$existUser){
                    echo "<p class='error-page'>El usuario ingresado no existe.</p>";
                }else{
                    $consultaPagosById = "SELECT p.*FROM pagos p INNER JOIN usuarios u ON p.idUsuario = u.id WHERE u.IDUsuario = :idUser;";
                    $statement = $conexion -> prepare($consultaPagosById);
                    $statement -> bindParam(':idUser',$IDUsuario);
                    $statement->execute();
                    $dataPagos = $statement->fetchAll(PDO::FETCH_OBJ);
                    if($existUser && $dataPagos && count($dataPagos) > 0){
                        print_r($existUser);
                        print_r($dataPagos);
                        echo "<p>Hay un usuario con los siguientes datos.</p>";
                    }else{
                        echo "<p class='error-page'>El usuario: ".$IDUsuario.", no tiene registros de pagos.</p>";
                    }
                }
            }
        ?>
    </body>
</html>