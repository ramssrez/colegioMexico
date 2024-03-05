<?php
    @session_start();
    session_destroy();
    header("Location: ../pages/iniciarSession.php?sesion=1");
?>