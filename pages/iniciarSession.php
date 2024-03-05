<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Colegio Instituto México</title>
    </head>
    <body>
        <?php
            include("../components/navigationGeneral.php");
        ?>
        <div class="contenedor">
            <h2>Login</h2>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 1 )
                {
                    echo "<p class='error'>*Error: El usuario no existe</p>";
                } 
                if(isset($_GET['error']) && $_GET['error'] == 2 )
                {
                    echo "<p class='error'>*Error: Se deben de ingresar los campos necesarios</p>";
                } 
                if(isset($_GET['sesion']) && $_GET['sesion'] == 1 )
                {
                    echo "<p class='succesful'>Sesión cerrada correctamente</p>";
                }  
            ?>
            <form action="../config/login.php" method="POST">
                <div class="elemento">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="user" >
                </div>
                <div class="elemento">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pass" >
                </div>
                <div class="elemento">
                    <input type="submit" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </body>
</html>