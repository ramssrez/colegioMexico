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
            include("./components/navigationGeneral.php");
        ?> 
        <div class="container">
            <h1 class="text-center my-4">Imágenes Alusivas a la Institución Educativa</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active center">
                        <img src="./img/fachada.jpg" class="d-block w-100 img-fluid" alt="Fachada Principal" alt="Fachada Principal" data-bs-toggle="modal" data-bs-target="#modalFachada">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/laboratorio.jpg" class="d-block w-100 img-fluid" alt="Salones de Clase">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/salones.jpg" class="d-block w-100" alt="Gimnasio">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/canchas.jpg" class="d-block w-100" alt="Biblioteca">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/gimnasio.jpg" class="d-block w-100" alt="Laboratorios">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/biblioteca.jpg" class="d-block w-100" alt="Canchas Deportivas">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="text-center">Haz clic en una imagen para ver más detalles.</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col text-center m-2">
                    <h1>Colegio Instituto México</h1> 
                </div>
            </div>
        </div>   
        <div class="container p-3">
            <div class="row">
                <div class="col text-center">
                    <img src="./img/escuela.jpg" class="img-fluid" alt="Descripción de la imagen">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col text-center m-2">
                    <p class="text-justify">
                        El Colegio Instituto México, con domicilio en Av. De las Torres #780,
                        Alcaldía Cuauhtémoc, C.P. 06500, Ciudad de México; escuela de tradición con 50 años de experiencia
                        en la preparación de tus hijos con la mejor educación posible.
                    </p>
                    <p class="text-justify">
                        Contamos con diferentes planes de estudio, constantemente en cambio con las nuevas necesidades  
                        mundiales, enfocada en tener una mayor preparación de nuestros alumnos en los ámbitos técnicos, 
                        personales y financieros.
                    </p>
                </div>
            </div>
        </div>  
        
        



        <div class="modal fade" id="modalFachada" tabindex="-1" aria-labelledby="modalFachadaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFachadaLabel">Fachada Principal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="./img/escuela.jpg" class="d-block mx-auto mb-3 img-fluid" alt="Fachada Principal">
                        <p>Descripción de la Fachada Principal...</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>