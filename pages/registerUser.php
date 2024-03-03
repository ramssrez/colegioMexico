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
            <form action="#">
                <div class="elemento">
                    <label for="name-user">Nombre</label>
                    <input type="text" id="name-user" name="name-user">
                </div> 
                <div class="elemento">
                    <label for="apellido-paterno-user">Apellido Paterno</label>
                    <input type="text" id="apellido-paterno-user" name="apellido-paterno-user">
                </div> 
                <div class="elemento">
                    <label for="apellido-materno-user">Apellido Materno</label>
                    <input type="text" id="apellido-materno-user" name="apellido-materno-user">
                </div> 
                <div class="elemento">
                    <label for="name-actor">Edad</label>
                    <input type="number" id="name-actor" name="name-actor">
                </div> 
                <div class="elemento">
                    <label for="name-actor">Sexo</label>
                    <input type="text" id="name-actor" name="name-actor">
                </div> 
                <div class="elemento">
                    <label for="name-actor">Sexo</label>
                    <select name="" id="">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="elemento">
                    <label for="name-actor">Correo</label>
                    <input type="text" id="name-actor" name="name-actor">
                </div>
                <div class="elemento">
                        <input id="btn-agregar" type="submit" name= "submit-cliente" value="Agregar">
                </div>
                
            </form>
        </div>
    </body>
</html>