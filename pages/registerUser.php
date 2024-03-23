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
        <div class="custom-container mt-5">
            <h2 class="my-4 text-center">Registro</h2>
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
                if(isset($_GET['error']) && $_GET['error'] == 8 )
                {
                    echo "<p class='error'>*Error: El captcha se ha activado, vuelve a intentarlo</p>";
                }
                if(isset($_GET['succesful']) && $_GET['succesful'] == 1 )
                {
                    echo "<p class='succesful'>Se ha registrado un usuario correctamente. Id Usuario Asignado=".$_GET['id']."</p>";
                }       
            ?>
            <form id="formRegister" action="../config/createUser.php" method="POST">
                <div class="form-group">
                    <label for="userName">Nombre</label>
                    <input class="form-control" type="text" id="userName" name="userName" data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu nombre.">
                </div> 
                <div  class="form-group">
                    <label for="userApellidoPaterno">Apellido Paterno</label>
                    <input class="form-control"  type="text" id="userApellidoPaterno" name="userApellidoPaterno" data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu apellido paterno.">
                </div> 
                <div class="form-group">
                    <label for="userApellidoMaterno">Apellido Materno</label>
                    <input class="form-control" type="text" id="userApellidoMaterno" name="userApellidoMaterno" data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu apellido materno.">
                </div> 
                <div class="form-group">
                    <label for="userEdad">Edad</label>
                    <input class="form-control" type="number" id="userEdad" name="userEdad" data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu edad.">
                </div> 
                <div class="form-group">
                    <label for="userSexo">Sexo</label>
                    <select class="form-select" name="userSexo" id="userSexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="userCorreo">Correo</label>
                    <input class="form-control" type="email" id="userCorreo" name="userCorreo" data-bs-toggle="tooltip" data-bs-placement="right" title="Ingresa tu correo electronico">
                </div>
                <div class="form-group">
                    <label for="userPassword">Contraseña</label>
                    <input class="form-control" type="password" id="userPassword" name="userPassword" data-bs-toggle="tooltip" data-bs-placement="right" title="Longitud mínima de 8 posiciones, con letras y números y por lo menos un carácter especial (#,$,-,_,&,%)”.">
                </div>
                <div class="form-group">
                    <label for="userPasswordDos">Confirmar contraseña</label>
                    <input class="form-control" type="password" id="userPasswordDos" name="userPasswordDos" data-bs-toggle="tooltip" data-bs-placement="right" title="Longitud mínima de 8 posiciones, con letras y números y por lo menos un carácter especial (#,$,-,_,&,%)”.">
                </div>
                <div class="text-center">
                    <button id= "registerButton" type="button" class="btn btn-success mt-2 ">Registrarse</button> 
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../js/tooltipImplementacion.js"></script> 
        <script src="https://www.google.com/recaptcha/api.js?render=6LfAjKIpAAAAAKwDxv55K50TYrGYFgsl1dd8414s"></script>        
        <script>
            document.getElementById('registerButton').addEventListener('click', function() {
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LfAjKIpAAAAAKwDxv55K50TYrGYFgsl1dd8414s', {action: 'validaUsuario'})
                        .then(function(token) {
                            var form = document.getElementById('formRegister');
                            var inputToken = document.createElement('input');
                            var inputAccion = document.createElement('input');
                            inputToken.type = "hidden";
                            inputToken.name = "token"
                            inputToken.value = token;

                            inputAccion.type = "hidden";
                            inputAccion.name = "action";
                            inputAccion.value = "validaUsuario";
                            form.appendChild(inputToken);
                            form.appendChild(inputAccion);
                            form.submit();
                        });
                    });
            });
        </script>
    </body>
</html>