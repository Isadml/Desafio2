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
        <link rel="stylesheet" href="../../css/estilo.css"/>
        <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
        <script type="text/javascript" src="../../miJavaScript.js"></script>
        <title>Inicio de sesión</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="titulo">
                    <header>
                        <?php
                        include_once '../../cabecera.php';
                        ?>
                    </header>
                </div>
            </div>

            <?php include_once '../../menu.php'; ?> 
            
            <div class="row">
                <nav>
                    <div class="breadcrumb principal">
                        <div class="breadcrumb-item"><a href="../../index.php" class="deeppink">Inicio</a></div>
                        <div class="breadcrumb-item"><a href="../../Vistas/Otras/Iniciar_Sesion.php" class="deeppink">Inicio de sesión</a></div>
                        <div class="breadcrumb-item"><a href="../Usuarios_Registrados/" class="deeppink">Usuarios registrados</a></div>
                        <div class="breadcrumb-item"><a href="../Otras/Buscar_Genero.php" class="deeppink">Búsqueda</a></div>
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Resultados de búsqueda</a></div>
                    </div>
                </nav>
            </div>

            <div class="row">
                <nav>
                    <div class="breadcrumb principal">
                        <div class="breadcrumb-item"><a href="../../index.php" class="deeppink">Inicio</a></div>
                        <div class="breadcrumb-item"><a href="../../Vistas/Otras/Iniciar_Sesion.php" class="deeppink">Inicio de sesión</a></div>
                        <div class="breadcrumb-item"><a href="../Administrador/" class="deeppink">Administración</a></div>
                        <div class="breadcrumb-item"><a href="../Administrador/Elegir_Accion.php" class="deeppink">Elegir acción</a></div>
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Administrar juegos</a></div>
                    </div>
                </nav>
            </div>

            <div class="row mt-2 mb-2 principal">
                <div class="col-4 "></div>
                <div class="col-4 mt-2 mb-2 cyan">
                    <?php
                    include_once '../../Modelo/Videojuego.php';
                    session_start();
                    $juegos = $_SESSION ['juegos'];
                    for ($i = 0; $i < count($juegos); $i++) {
                        $juego = $juegos [$i];
                        ?>
                        <a> <?php echo $juego->getTitulo(); ?></a></br> 
                    <?php }
                    ?>
                    <div class="form-group">
                        <label for="volver"></label>
                        <input type="submit" id="volver" name="volver" class="form-control cyan principal" value="Volver" onclick="pag_Anterior()">
                    </div>
                </div>
                <div class="col-4 mt-3 mb-2"></div>
            </div>

            <div class="row mt-5 principal cyan">
                <div class="col">
                    <footer>
                        <?php
                        include_once '../../pie.php';
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
