<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Colegio Instituto México</title>
    </head>
    <body>
        <?php
            include("../components/navigationGeneral.php");
        ?>
        <div class="contenedor">
            <h2>Registro</h2>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 1 )
                {
                    echo "<p class='error'>*Error: No se ha registrado al usuario</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] == 2 )
                {
                    echo "<p class='error'>*Error: Hay campos vacíos</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] == 3 )
                {
                    echo "<p class='error'>*Error: La contraseña debe ser mayor a 8 caracteres</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] == 4 )
                {
                    echo "<p class='error'>*Error: Las contraseñas debe de coincidir</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] == 5 )
                {
                    echo "<p class='error'>*Error: La contraseña debe de contener un caracter especial (#,$,-,_,&,%)</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] == 6 )
                {
                    echo "<p class='error'>*Error: La contraseña debe de contener números</p>";
                }
                if(isset($_GET['error']) && $_GET['error'] == 7 )
                {
                    echo "<p class='error'>*Error: El correo debe de contener el @</p>";
                }
                if(isset($_GET['succesful']) && $_GET['succesful'] == 1 )
                {
                    echo "<p class='succesful'>Se ha registrado un usuario correctamente. Id Usuario Asignado=".$_GET['id']."</p>";
                }       
            ?>
            <form action="../config/createUser.php" method="POST">
                <div class="elemento">
                    <label for="userName">Nombre</label>
                    <input type="text" id="userName" name="userName">
                </div> 
                <div class="elemento">
                    <label for="userApellidoPaterno">Apellido Paterno</label>
                    <input type="text" id="userApellidoPaterno" name="userApellidoPaterno" required="true">
                </div> 
                <div class="elemento">
                    <label for="userApellidoMaterno">Apellido Materno</label>
                    <input type="text" id="userApellidoMaterno" name="userApellidoMaterno" required="true">
                </div> 
                <div class="elemento">
                    <label for="userEdad">Edad</label>
                    <input type="number" id="userEdad" name="userEdad" required="true">
                </div> 
                <div class="elemento">
                    <label for="userSexo">Sexo</label>
                    <select name="userSexo" id="userSexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="elemento">
                    <label for="userCorreo">Correo</label>
                    <input type="text" id="userCorreo" name="userCorreo" required="true">
                </div>
                <div class="elemento">
                    <label for="userPassword">Contraseña</label>
                    <input type="password" id="userPassword" name="userPassword" required="true">
                </div>
                <div class="elemento">
                    <label for="userPasswordDos">Confirmar contraseña</label>
                    <input type="password" id="userPasswordDos" name="userPasswordDos" required="true">
                </div>
                <div class="elemento">
                    <input id="btn-agregar" type="submit" name= "userSubmit" value="Agregar">
                </div>    
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>