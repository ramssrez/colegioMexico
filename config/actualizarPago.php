<?php
    include '../config/conexion.php';
    print_r($_POST);
    $idPago = $_POST['idPago'];
    $folioPago=$_POST['pagoFolio'];
    $concepto = $_POST['pagoConcepto'];
    $mesPago = $_POST['pagoMes'];
    $monto = $_POST['pagoMonto'];
    $fecha = $_POST['pagoFecha'];
    $queryUpdatePago = "UPDATE pagos SET FolioPago=:folioPago, Concepto=:concepto, MesPagado=:mesPagado, Monto = :monto, FechaPago = :fechaPago  WHERE idPago=:idPagoPage;";
    $statement = $conexion -> prepare($queryUpdatePago);
    $statement -> bindParam(':folioPago',$folioPago);
    $statement -> bindParam(':concepto',$concepto);
    $statement -> bindParam(':mesPagado',$mesPago);
    $statement -> bindParam(':monto',$monto);
    $statement -> bindParam(':fechaPago',$fecha);
    $statement -> bindParam(':idPagoPage',$idPago);
    $resultado = $statement->execute();
    if($resultado){
        header("Location: ../pages/consultarPagosPDC.php?successful=2");
    }else{
        header("Location: ../pages/consultarPagosPDC.php?error=2");
    }
?>