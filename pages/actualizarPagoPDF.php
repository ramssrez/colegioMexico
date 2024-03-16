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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Actualizar pago</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../pages/homeUserPDC.php">Colegio Instituto México</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../pages/consultarPagosPDC.php">Regresar</a>
                        </li>
                    </ul>
                </div>
            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>     
    </body>
</html>