<?php
    include './conexion.php';
    define('CLAVE','6LfAjKIpAAAAAOwxGPh3mTeaTP5wReCzIVKhZ3gw');
    $userName = $_POST['userName'];
    $userApellidoPaterno = $_POST['userApellidoPaterno'];
    $userApellidoMaterno = $_POST['userApellidoMaterno'];
    $userEdad = $_POST['userEdad'];
    $userSexo = $_POST['userSexo'];
    $userCorreo = $_POST['userCorreo'];
    $userPassword = $_POST['userPassword'];
    $userPasswordDos = $_POST['userPasswordDos'];
    $token = $_POST['token'];
    $action = $_POST['action'];
    $patron = '/[#$\-_&%]/';

    $cu = curl_init();
    curl_setopt($cu,CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($cu,CURLOPT_POST, 1);
    curl_setopt($cu,CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
    curl_setopt($cu,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($cu);
    curl_close($cu);
    $datos = json_decode($response,true);
    if(empty($userName) || empty($userApellidoPaterno || empty($userApellidoMaterno) ||
        empty($userEdad) || empty($userCorreo) || empty($userPassword))){
        header("Location: ../pages/registerUser.php?error=2");
    }else if(strlen($userPassword < 8)){
        header("Location: ../pages/registerUser.php?error=3");
    }else if($userPassword != $userPasswordDos){
        header("Location: ../pages/registerUser.php?error=4");
    }else if(!preg_match($patron, $userPassword)){
        header("Location: ../pages/registerUser.php?error=5");
    }else if(!preg_match('/\d/', $userPassword)){
        header("Location: ../pages/registerUser.php?error=6");
    }else if(strpos($userCorreo,'@') === false){
        header("Location: ../pages/registerUser.php?error=7");
    }else if($datos['success'] != 1 && $datos['score'] <= 0.5){
        header("Location: ../pages/registerUser.php?error=8");
    }else{
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
            header("Location: ../pages/registerUser.php?succesful=1&id=".$idUsuario);
        }else{
            header("Location: ../pages/registerUser.php?error=1");
        }
    }
?>