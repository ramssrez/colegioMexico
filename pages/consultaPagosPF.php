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
    </body>
</html>