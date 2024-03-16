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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet">
        <title>!Bienvenid@ <?php echo $client; ?></title>
    </head>
    <body class = "background-pagos">
        <?php
            include("../components/navigationPDC.php");
        ?>
        <div class="custom-container mt-5">
            <h2 class="my-4 text-center">Búsqueda de pagos</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="usuario">IDUsuario</label>
                    <input  class="form-control" type="number" id="idUserInput" name="IDUser" required="true">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-2 ">Búscar</button>                
                </div>
            </form>
        </div>
        <?php
            if(isset($_GET['error']) && $_GET['error'] == 1 )
            {
                echo "<p class='error-page text-center'>*Error: No se pudo eliminar el pago</p>";
            }
            if(isset($_GET['error']) && $_GET['error'] == 2 )
            {
                echo "<p class='error-page text-center'>*Error: No se pudo actualizar el pago</p>";
            }
            if(isset($_GET['successful']) && $_GET['successful'] == 1 )
            {
                echo "<p class='succesful-page text-center'>Se ha elimiando el pago</p>";
            } 
            if(isset($_GET['successful']) && $_GET['successful'] == 2 )
            {
                echo "<p class='succesful-page text-center'>Se ha actualizado el pago</p>";
            }   
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include '../config/conexion.php';
                $IDUsuario = $_POST['IDUser'];
                $consultaIsUser = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno,IDUsuario FROM usuarios WHERE IDUsuario = :idUser";
                $statement = $conexion -> prepare($consultaIsUser);
                $statement->bindParam(':idUser',$IDUsuario);
                $statement->execute();
                $existUser = $statement->fetch(PDO::FETCH_ASSOC);
                if(empty($IDUsuario)){
                    echo "<p class='error-page text-center'>El campo del IDUsuario esta vacío.</p>";
                }else if(!$existUser){
                    echo "<p class='error-page text-center'>El usuario ingresado no existe.</p>";
                }else{
                    $consultaPagosById = "SELECT p.*FROM pagos p INNER JOIN usuarios u ON p.idUsuario = u.id WHERE u.IDUsuario = :idUser;";
                    $statement = $conexion -> prepare($consultaPagosById);
                    $statement -> bindParam(':idUser',$IDUsuario);
                    $statement->execute();
                    $dataPagos = $statement->fetchAll(PDO::FETCH_OBJ);
                    if($existUser && $dataPagos && count($dataPagos) > 0){
                        echo "<h1 class='text-center'>Consulta de pagos</h1> ";
                        echo"<h2 class='text-center'>Padre de familia: ".$existUser['IDUsuario']."</h2>";
                        echo"<h2 class='text-center'>Nombre: ".$existUser['Nombre']." ".$existUser['ApellidoPaterno']." ".$existUser['ApellidoMaterno'].".</h2>";
                        echo"<h2 class='text-center'>Pagos realizados.</h2>";
                        echo"<div class='container'>";
                        echo"<div class='table table-responsive table-bordered'>";
                        echo "<table class='table table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Folio</th>";
                        echo "<th>Concepto</th>";
                        echo "<th>Mes</th>";
                        echo "<th>Monto</th>";
                        echo "<th>Fecha</th>";
                        echo "<th></th>";
                        echo "<th></th>";
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
                            echo "<td><a class='btn btn-warning' href='../pages/actualizarPagoPDF.php?id=$pago->idPago'>Actualizar</a></td>";
                            echo "<td><a id='btn-eliminar' class='btn btn-danger' href='../config/deletePagos.php?id=$pago->idPago'>Eliminar</a></td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";    
                        echo"</div>";
                        echo"</div>";
                    }else{
                        echo "<p class='error-page text-center'>El usuario: ".$IDUsuario.", no tiene registros de pagos.</p>";
                    }
                }
            }
        ?>
        <script src="../js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>