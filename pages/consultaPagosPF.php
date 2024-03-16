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
        <title>!Bienvenido <?php echo $client; ?></title>
    </head>
    <body class = "background-pagos">
        <?php
            include("../components/navigationPF.php");
        ?>
        <h1 class="message_user">Consulta de pagos</h1>  
        <?php
            include '../config/conexion.php';
            $consultaPagos = "SELECT p.* FROM pagos p INNER JOIN usuarios u ON p.idUsuario = u.id WHERE u.id = :idUser;";
            $statement = $conexion -> prepare($consultaPagos);
            $statement -> bindParam(':idUser',$_SESSION['id']);
            $statement->execute();
            $dataPagos = $statement->fetchAll(PDO::FETCH_OBJ);
        ?>
        <div class="table-crud">
            <?php if ($dataPagos && count($dataPagos) > 0): ?>
                <h2 class="bienvenido-dos">
                    Padre de familia: <?php echo $_SESSION['idUser'];?>
                </h2>
                <h2 class="bienvenido-dos">
                    Nombre: <?php echo $client; ?> <?php echo $_SESSION['apellidoPa']; ?> <?php echo $_SESSION['apellidoMa']; ?>.
                </h2>
                <h2 class="bienvenido-dos">Pagos realizados:</h2>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Folio</th>
                        <th>Concepto</th>
                        <th>Mes</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPagos as $data): ?>
                            <tr>
                                <td><?php echo $data->idPago; ?></td>
                                <td><?php echo $data->FolioPago; ?></td>
                                <td><?php echo $data->Concepto; ?></td>
                                <td><?php echo $data->MesPagado; ?></td>
                                <td><?php echo $data->Monto; ?></td>
                                <td><?php echo $data->FechaPago; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="noData-user"><?php echo $client; ?>, aún no cuentas con registro de pagos</p>
            <?php endif; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>