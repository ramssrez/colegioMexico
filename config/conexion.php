<?php
    $pass_db = "admin";
    $user_db = "root";
    $name_db = "db_instituto_mexico";
    try{
        $conexion = new PDO('mysql:host=localhost:3306;dbname='.$name_db,$user_db,$pass_db);
    }catch(Exception $ex){
        echo "Error de conexión a la base de datos ".$ex->getMessage();
    }
?>