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
        <title>Añadir juego</title>
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
                <div class="col-3 "></div>
                <div class="col-6 mt-2 mb-2 cyan">
                    <h3>Añadir juego</h3>

                    <?php
                    include_once '../../Modelo/Usuario.php';
                    session_start();
                    $usuario = $_SESSION ['user'];
                     if (!empty($usuario)) {
                        ?>

                        <form name="add_juego" action="../../Controladores/Controlador_Usuario_Registrado.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="titulo">Título </label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el título">
                            </div>
                            <div class="form-group">
                                <label for="anio">Año de publicación </label>
                                <input type="text" class="form-control" id="anio" name="anio" placeholder="Escribe el año">
                            </div>
                            <div class="form-group">
                                <label for="pais">País de procedencia </label>
                                <input type="text" class="form-control" id="pais" name="pais" placeholder="Escribe el país">
                            </div>
                            <div class="form-group">
                                <label for="empresa">Empresa que lo produjo </label>
                                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Escribe la empresa">
                            </div>
                            <div class="form-group">
                                <label for="resumen">Resumen </label>
                                <input type="text" class="form-control" id="resumen" name="resumen" placeholder="Escribe un resumen">
                            </div>
                            <div class="form-group form-check">
                                <label for="plataforma">Plataformas para las que estuvo disponible </label><br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="nes">NES<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="arcade">Arcade<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="atari">Atari<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="msx">MSX<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="colecovision">Colecovisión<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="amstrad">Amstrad CPC<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="snes">SNES<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="commodore">Commodore Amiga<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="famicom">Famicom<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="sega">Sega<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="playchoice">PlayChoice-10<br>
                                <input type="checkbox" class="form-check-input" id="plataforma" name="plataforma[]" value="zxspectrum">ZX Spectrum<br>
                            </div>
                            <div class="form-group form-check">
                                <label for="genero">Género </label><br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="arcade">Arcade<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="plataformas">Plataformas<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="beat">Beat 'em up<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="accion">Acción<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="aventuras">Aventuras<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="rol">Rol<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="vuelo">Simulador de vuelo<br>
                                <input type="checkbox" class="form-check-input" id="genero" name="genero[]" value="shoot">Shoot 'em up<br>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen </label> 
                                <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                                <input id="imagen" name="imagen" size="30" type="file" class="form-control-file"/>
                            </div>

                            <div class="form-group">
                                <label for="add_juego"></label>
                                <button type="submit" class="form-control cyan principal" id="add_juego" name="add_juego">Añadir juego</button>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="form-control cyan principal" name="cerrar">Cerrar sesión</button>
                            </div>
                        </form>
                    <?php
                    } else {
                        echo 'No tiene permisos para acceder a esta página.';
                    }
                    ?>
                    
                    <div class="form-group">
                        <label for="volver"></label>
                        <input type="submit" id="volver" name="volver" class="form-control cyan principal" value="Volver" onclick="pag_Anterior()">
                    </div>

                </div>
                <div class="col-3 mt-3 mb-2"></div>
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
