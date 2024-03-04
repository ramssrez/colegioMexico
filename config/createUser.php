<?php
    include './conexion.php';
    $userName = $_POST['userName'];
    $userApellidoPaterno = $_POST['userApellidoPaterno'];
    $userApellidoMaterno = $_POST['userApellidoMaterno'];
    $userEdad = $_POST['userEdad'];
    $userSexo = $_POST['userSexo'];
    $userCorreo = $_POST['userCorreo'];
    $userPassword = $_POST['userPassword'];

    $consultaLastUsuario = "SELECT IDUsuario FROM usuarios ORDER BY id DESC LIMIT 1;";
    $statement = $conexion -> prepare($consultaLastUsuario);
    $statement->execute();
    $ultimo_registro = $statement->fetch(PDO::FETCH_ASSOC);
    $idUsuario = $ultimo_registro['IDUsuario'] + 1;
    $userTipo = "PF";
    $consultaInsertarUsuario = "INSERT INTO usuarios (IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, TipoUsuario, Pasword) 
    VALUES (:idUsuario,:nombre,:apellidoPa,:apellidoMa,:edad,:sexo,:email,:tipo,:passw)";
    $statement = $conexion -> prepare($consultaInsertarUsuario);
    $statement -> bindParam(':idUsuario',$idUsuario);
    $statement -> bindParam(':nombre',$userName);
    $statement -> bindParam(':apellidoPa',$userApellidoPaterno);
    $statement -> bindParam(':apellidoMa',$userApellidoMaterno);
    $statement -> bindParam(':edad',$userEdad);
    $statement -> bindParam(':sexo',$userSexo);
    $statement -> bindParam(':email',$userCorreo);
    $statement -> bindParam(':tipo',$userTipo);
    $statement -> bindParam(':passw',$userPassword);    
    if($statement -> execute()){
        header("Location: ../pages/registerUser.php?succesful=1");
    }else{
        header("Location: ../pages/registerUser.php?error=1");
    }
?>