<?php
    include '../config/conexion.php';
    $idPago = $_GET['id'];
    $consultaPagoById = "SELECT * FROM pagos WHERE idPago=:idPagoPage;";
    $statement = $conexion -> prepare($consultaPagoById);
    $statement -> bindParam(':idPagoPage',$idPago);
    $statement->execute();
    $dataPago = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Actualizar pago</title>
    </head>
    <body>
        <nav class="navbar column">
            <ul>
                <li><a href="../pages/consultarPagosPDC.php">Regresar</a></li>
            </ul>
        </nav> 
        <div class="contenedor">
            <h2>Actualizar datos pago</h2>
            <form action="../config/actualizarPago.php" method="POST">
                <div class="elemento">
                    <input type="hidden" id="idPago" name="idPago" readonly value=<?php echo $dataPago["idPago"]?>>
                </div>
                <div class="elemento">
                    <label for="usuario">Folio pago</label>
                    <input type="text" id="pagoFolio" name="pagoFolio" value=<?php echo $dataPago["FolioPago"]?> required="true">
                </div>
                <div class="elemento">
                    <label for="usuario">Concepto</label>
                    <input type="text" id="pagoConcepto" name="pagoConcepto" value="<?php echo $dataPago["Concepto"]?>" required="true">
                </div>
                <div class="elemento">
                    <label for="usuario">Mes Pagado</label>
                    <input type="text" id="pagoMes" name="pagoMes" value="<?php echo $dataPago["MesPagado"]?>" required="true">
                </div>
                <div class="elemento">
                    <label for="usuario">Monto</label>
                    <input type="number" id="pagoMonto" name="pagoMonto" value="<?php echo $dataPago["Monto"]?>" required="true">
                </div>
                <div class="elemento">
                    <label for="usuario">Fecha Pago</label>
                    <input type="text" id="pagoFecha" name="pagoFecha" value="<?php echo $dataPago["FechaPago"]?>" required="true">
                </div>
                <div class="elemento">
                    <input type="submit" value="Actualizar">
                </div>
            </form>
        </div>       
    </body>
</html>