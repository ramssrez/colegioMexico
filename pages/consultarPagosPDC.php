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
                        echo "<h1 class='message_user'>Consulta de pagos</h1> ";
                        echo"<h2 class='bienvenido-dos'>Padre de familia: ".$existUser['IDUsuario']."</h2>";
                        echo"<h2 class='bienvenido-dos'>Nombre: ".$existUser['Nombre']." ".$existUser['ApellidoPaterno']." ".$existUser['ApellidoMaterno'].".</h2>";
                        echo"<h2 class='bienvenido-dos'>Pagos realizados.</h2>";
                        echo"<div class='table-crud'>";
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Folio</th>";
                        echo "<th>Concepto</th>";
                        echo "<th>Mes</th>";
                        echo "<th>Monto</th>";
                        echo "<th>Fecha</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($dataPagos as $pago) {
                            echo "<tr>";
                            echo "<td>" . $pago->idPago . "</td>";
                            echo "<td>" . $pago->FolioPago . "</td>";
                            echo "<td>" . $pago->Concepto . "</td>";
                            echo "<td>" . $pago->MesPagado . "</td>";
                            echo "<td>" . $pago->Monto . "</td>";
                            echo "<td>" . $pago->FechaPago . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";    
                        echo"</div>";
                    }else{
                        echo "<p class='error-page'>El usuario: ".$IDUsuario.", no tiene registros de pagos.</p>";
                    }
                }
            }
        ?>
    </body>
</html>