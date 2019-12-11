<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12 titulo">
                    <header>
                        <?php
                        include_once 'cabecera.php';
                        ?>
                    </header>
                </div>
            </div>

            <?php include_once 'menu.php'; ?> 

            <div class="row">
                <nav>
                    <div class="col-lg-12 col-sm-12 breadcrumb principal">
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Inicio</a></div>
                    </div>
                </nav>
            </div>

            <div class="row principal">
                <div class="col-lg-2 col-sm-1"></div>
                <div class="col-lg-4 col-sm-5 mt-2 mb-2 cyan">

                    <div class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/index2.jpeg" width="400px">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/04FamicomCategoria.jpg" width="400px">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/840_560.jpg" width="400px">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/exposición-videojuegos-Valencia-scaled.jpg" width="400px">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/index1.jpg" width="400px">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/NES.jpg" width="400px">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/videojuegos-juego-consola-casette.png" width="400px">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-4 col-sm-4 mt-2 mb-2 cyan">
                    <p>En RetroLovers somos amantes de los videojuegos y las consolas retro. Nos encantan los personajes pixelados
                        y la música en 8-bits.
                        Aquí podrás encontrar toda la información sobre tus videojuegos favoritos, algunas rarezas poco conocidas 
                        y reviews de otros usuarios por si te animas a probar algo nuevo (bueno... o no tan nuevo).
                        Ya sabes, ¡retrojueguizate!</p>
                </div>
                <div class="col-lg-1 col-sm-1 mt-2 mb-2"></div>
            </div>

            <audio src="audio/musica-de-super-mario-bros-tema-principal.mp3" autoplay loop></audio>
            
            <div class="row mt-5 principal cyan">
                <div class="col-lg-12 col-sm-12">
                    <footer>
                        <?php
                        include_once './pie.php';
                        ?>
                    </footer>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
