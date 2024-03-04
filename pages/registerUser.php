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
            <h2>Registro</h2>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 1 )
                {
                    echo "<p class='error'>No se ha registrado al usuario</p>";
                }
                if(isset($_GET['succesful']) && $_GET['succesful'] == 1 )
                {
                    echo "<p class='succesful'>Se ha registrado un usuario correctamente</p>";
                }       
            ?>
            <form action="../config/createUser.php" method="POST">
                <div class="elemento">
                    <label for="userName">Nombre</label>
                    <input type="text" id="userName" name="userName">
                </div> 
                <div class="elemento">
                    <label for="userApellidoPaterno">Apellido Paterno</label>
                    <input type="text" id="userApellidoPaterno" name="userApellidoPaterno">
                </div> 
                <div class="elemento">
                    <label for="userApellidoMaterno">Apellido Materno</label>
                    <input type="text" id="userApellidoMaterno" name="userApellidoMaterno">
                </div> 
                <div class="elemento">
                    <label for="userEdad">Edad</label>
                    <input type="number" id="userEdad" name="userEdad">
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
                    <input type="text" id="userCorreo" name="userCorreo">
                </div>
                <div class="elemento">
                    <label for="userPassword">Contraseña</label>
                    <input type="password" id="userPassword" name="userPassword">
                </div>
                <div class="elemento">
                    <input id="btn-agregar" type="submit" name= "userSubmit" value="Agregar">
                </div>    
            </form>
        </div>
    </body>
</html>