<?php
    $pass_db = "";
    $user_db = "root";
    $name_db = "db_instituto_mexico";
    try{
        $db = new PDO('mysql:host=localhost:3308;dbname='.$name_db,$user_db,$pass_db);
    }catch(Exception $ex){
        echo "Error de conexión a la base de datos ".$ex->getMessage();
    }
?>