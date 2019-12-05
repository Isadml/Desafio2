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
                    <button class="navbar-toggler deeppink" type="button" data-toggle="collapse" data-target="#menu2" disabled>Usuarios registrados</button>
                    <div class="collapse navbar-collapse" id="menu2">
                        <nav class="navbar-nav">
                            <a href="../Usuarios_Registrados/Editar_Perfil.php" class="nav-link deeppink">Editar perfil</a>
                            <a href="../Usuarios_Registrados/Add_Juego.php" class="nav-link deeppink">Añadir juego</a>
                            <a href="../Usuarios_Registrados/Add_Review.php" class="nav-link deeppink">Añadir reseña</a>
                        </nav>
                    </div>
                </nav>

                <nav class="navbar">
                    <button class="navbar-toggler deeppink" type="button" data-toggle="collapse" data-target="#menu3">Administración</button>
                    <div class="collapse navbar-collapse" id="menu3">
                        <nav class="navbar-nav">
                            <a href="Administrar_Juegos.php" class="nav-link deeppink">Administrar juegos</a>
                            <a href="Administrar_Reviews.php" class="nav-link deeppink">Administrar reseñas</a>
                            <a href="Administrar_Usuarios.php" class="nav-link deeppink">Administrar usuarios</a>
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
                    <h3>Administración de juegos</h3>

                    <?php
                    include_once '../../Auxiliares/Videojuego.php';
                    session_start();
                    $listaJuegos = $_SESSION['listaJuegos'];

                    for ($i = 0; $i < count($listaJuegos); $i++) {
                        $j = $listaJuegos [$i];
                        ?>
                        <form action="../../Controladores/Controlador_Administrador.php" name="admin_juegos" method="POST">
                            <div class="form-group">
                            <label for="titulo">Título </label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $j ?>">
                        </div>
                        <div class="form-group">
                            <label for="anio">Año de publicación </label>
                            <input type="text" class="form-control" id="anio" name="anio" value="<?= $j ?>">
                        </div>
                        <div class="form-group">
                            <label for="pais">País de procedencia </label>
                            <input type="text" class="form-control" id="pais" name="pais" value="<?= $j ?>">
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa que lo produjo </label>
                            <input type="text" class="form-control" id="empresa" name="empresa" value="<?= $j ?>">
                        </div>
                        <div class="form-group">
                            <label for="resumen">Resumen </label>
                            <input type="text" class="form-control" id="resumen" name="resumen" value="<?= $j ?>">
                        </div>
                        <div class="form-group form-check">
                            <label for="plataforma">Plataformas para las que estuvo disponible </label><br>
<!--                            Añadir las plataformas-->
                        </div>
                        <div class="form-group">
                            <label for="genero">Género </label>
<!--                            Añadir el género-->
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen </label> 
                            <img/>
                        </div>
                            <?php if ($j->getEstado() == 0){ ?>
                                <div class="form-group">
                                <label for="estado"></label>
                                <button type="submit" class="form-control cyan principal" id="estado" name="estado">Inactivo</button>
                            </div>
                            <?php } else { ?>
                                <div class="form-group">
                                <label for="estado"></label>
                                <button type="submit" class="form-control cyan principal" id="estado" name="estado">Activo</button>
                            </div>
                            <?php }
                            ?>
                            <div class="form-group">
                                <label for="modificar"></label>
                                <button type="submit" class="form-control cyan principal" id="modificar" name="modificar">Modificar</button>
                            </div>
                            <div class="form-group">
                                <label for="borrar"></label>
                                <button type="submit" class="form-control cyan principal" id="borrar" name="borrar">Borrar</button>
                            </div>
                        </form>

                    <?php } ?>
                    <form name="add" action="../../Controladores/Controlador_Administrador.php" method="POST">
                        <div class="form-group">
                            <label for="add"></label>
                            <button type="submit" class="form-control cyan principal" id="add" name="add">+</button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control cyan principal" name="cerrar">Cerrar sesión</button>
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

