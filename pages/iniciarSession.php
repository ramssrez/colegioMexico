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
            <form action="#" method="post">
                <div class="elemento">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="user" required="true">
                </div>
                <div class="elemento">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pass" required="true">
                </div>
                <div class="elemento">
                    <input type="submit" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </body>
</html>