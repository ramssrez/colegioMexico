<?php
    if(!isset($_GET['id'])){
        exit();
    }
    print_r($_GET);
    include './conexion.php';
    $idPago = $_GET['id'];
    $eliminarPago = "DELETE FROM pagos WHERE idPago=:idGet;";
    $statement = $conexion->prepare($eliminarPago);
    $statement -> bindParam(':idGet',$idPago);
    $resultado = $statement->execute();
    if($resultado){
        header("Location: ../pages/consultarPagosPDC.php?successful=1");
    }else{
        header("Location: ../pages/consultarPagosPDC.php?error=1");
    }
?>