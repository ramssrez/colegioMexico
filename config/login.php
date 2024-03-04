<?php
    include './conexion.php';
    session_start();
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
        if($dataUser['TipoUsuario']==='PF'){
            header("Location: ../pages/userPF.html");
        }else if($dataUser['TipoUsuario']==='PDC'){
            header("Location: ../pages/userPDC.html");
        }else{
            header("Location: ../pages/iniciarSession.php?error=1");
        }
    }else{
        header("Location: ../pages/iniciarSession.php?error=1");
    }

?>