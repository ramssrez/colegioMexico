<?php
    include './conexion.php';
    //$usuario = ;
    $IDUsuario = $_POST['IDUser'];
    $consultaIsUser = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno,IDUsuario FROM usuarios WHERE IDUsuario = :idUser";
    $statement = $conexion -> prepare($consultaIsUser);
    $statement->bindParam(':idUser',$IDUsuario);
    $statement->execute();
    $existUser = $statement->fetch(PDO::FETCH_ASSOC);
    if(empty($IDUsuario)){
        header("Location: ../pages/consultarPagosPDC.php?error=1");
    }else if(!$existUser){
        header("Location: ../pages/consultarPagosPDC.php?error=2");
    }else{
        $consultaPagosById = "SELECT p.*FROM pagos p INNER JOIN usuarios u ON p.idUsuario = u.id WHERE u.IDUsuario = :idUser;";
        $statement = $conexion -> prepare($consultaPagosById);
        $statement -> bindParam(':idUser',$IDUsuario);
        $statement->execute();
        $dataPagos = $statement->fetchAll(PDO::FETCH_OBJ);
        print_r($existUser);
        print_r($dataPagos);
        if($existUser && $dataPagos){
            echo "Hay usuairo y datos de pago";
        }else{
            echo "No hay usuairo y datos de pago";
        }
    }
    //
?>