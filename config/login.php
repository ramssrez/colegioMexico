<?php
    session_start();
    include './conexion.php';
    $usuario = $_POST['user'];
    $pass = $_POST['pass']; 
    //SELECT * FROM `usuarios` WHERE IDUsuario = '9999' AND Pasword = 'Progweb2#';
    $consultaUsuario = "SELECT * FROM usuarios WHERE IDUsuario=:idUsuario AND Pasword = :userPass;";
    $statement = $conexion -> prepare($consultaUsuario);
    $statement -> bindParam(':idUsuario',$usuario);
    $statement -> bindParam(':userPass',$pass);
    $statement->execute();
    $dataUser = $statement->fetch(PDO::FETCH_ASSOC);
    if($dataUser){
        $_SESSION['user'] = $dataUser['Nombre'];
        $_SESSION['apellidoPa'] = $dataUser['ApellidoPaterno'];
        $_SESSION['apellidoMa'] = $dataUser['ApellidoMaterno'];
        $_SESSION['tipo'] = $dataUser['TipoUsuario'];
        if($dataUser['TipoUsuario']==='PF'){
            header("Location: ../pages/homeUserPF.php");
        }else if($dataUser['TipoUsuario']==='PDC'){
            header("Location: ../pages/homeUserPDC.php");
        }else{
            header("Location: ../pages/iniciarSession.php?error=1");
        }
    }else{
        header("Location: ../pages/iniciarSession.php?error=1");
    }

?>