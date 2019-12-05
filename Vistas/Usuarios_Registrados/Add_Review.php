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
        <title>Añadir reseña</title>
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

            <div class="row mt-2">
                <div class="col-2"></div>
                <nav class="navbar">
                    <button class="navbar-toggler deeppink" type="button" data-toggle="collapse" data-target="#menu">Juegos</button>
                    <div class="collapse navbar-collapse" id="menu">
                        <nav class="navbar-nav">
                            <a href="../Otras/Buscar_Nombre.php" class="nav-link deeppink">Buscar por nombre</a>
                            <a href="../Otras/Buscar_Plataforma.php" class="nav-link deeppink">Buscar por plataformas</a>
                            <a href="../Otras/Buscar_Genero.php" class="nav-link deeppink">Buscar por géneros</a>
                        </nav>
                    </div>
                </nav>

                <nav class="navbar">
                    <button class="navbar-toggler deeppink" type="button" data-toggle="collapse" data-target="#menu2">Usuarios registrados</button>
                    <div class="collapse navbar-collapse" id="menu2">
                        <nav class="navbar-nav">
                            <a href="Editar_Perfil.php" class="nav-link deeppink">Editar perfil</a>
                            <a href="Add_Juego.php" class="nav-link deeppink">Añadir juego</a>
                            <a href="Add_Review.php" class="nav-link deeppink">Añadir reseña</a>
                        </nav>
                    </div>
                </nav>

                <nav class="navbar">
                    <button class="navbar-toggler deeppink" type="button" data-toggle="collapse" data-target="#menu3" disabled>Administración</button>
                    <div class="collapse navbar-collapse" id="menu3">
                        <nav class="navbar-nav">
                            <a href="../Administrador/Administrar_Juegos.php" class="nav-link deeppink">Administrar juegos</a>
                            <a href="../Administrador/Administrar_Reviews.php" class="nav-link deeppink">Administrar reseñas</a>
                            <a href="../Administrador/Administrar_Usuarios.php" class="nav-link deeppink">Administrar usuarios</a>
                        </nav>
                    </div>
                </nav>

                <nav class="navbar">
                    <div>
                        <nav class="navbar-nav">
                            <a href="../Otras/Iniciar_Sesion.php" class="nav-link deeppink">Inicio de sesión</a>
                        </nav>
                    </div>
                </nav>

                <div class="col-2"></div>
            </div>


            <div class="row mt-2 mb-2 principal">
                <div class="col-4 "></div>
                <div class="col-4 mt-2 mb-2 cyan">
                    <h3>Añadir reseña</h3>

                    <?php
                    include_once '../../Auxiliares/Usuario.php';
                    session_start();
                    $usuario = $_SESSION ['user'];
                    ?>

                    <form name="add_review" action="../../Controladores/Controlador_Usuario_Registrado.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario->getNombre() ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="titulo">Título </label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el título del juego">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción </label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escribe tu reseña" maxlength="10000">
                        </div>
                        <div class="form-group">
                            <label for="subir"></label>
                            <button type="submit" class="form-control cyan principal" id="subir" name="subir">Subir reseña</button>
                        </div>
                    </form>

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

