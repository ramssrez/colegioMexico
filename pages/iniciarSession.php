<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet">

        <title>Colegio Instituto México</title>
    </head>
    <body>
        <?php
            include("../components/navigationGeneral.php");
        ?>
        <div class="custom-container mt-2">
            <h2 class="my-4 text-center">Iniciar sesión</h2>
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
                <div class="form-group">
                    <label for="user">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="user" data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa el usuario que se te asigno.">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="password" name="pass" data-bs-toggle="tooltip"  data-bs-placement="right" title="Ingresa la contraseña que creaste.">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-2 ">Iniciar sesión</button>                
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../js/main.js"></script>
    </body>
</html>