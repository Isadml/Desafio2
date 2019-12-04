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
                            <a href="Buscar_Nombre.php" class="nav-link deeppink">Buscar por nombre</a>
                            <a href="Buscar_Plataforma.php" class="nav-link deeppink">Buscar por plataformas</a>
                            <a href="Buscar_Genero.php" class="nav-link deeppink">Buscar por géneros</a>
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
                            <a href="Iniciar_Sesion.php" class="nav-link deeppink">Inicio de sesión</a>
                        </nav>
                    </div>
                </nav>

                <div class="col-2"></div>
            </div>


            <div class="row mt-2 mb-2 principal">
                <div class="col-4 "></div>
                <div class="col-4 mt-2 mb-2 cyan">
                    <h3>Buscar por plataformas</h3>
                    
                    <form name="buscar_genero" action="../../Controladores/Controlador_general.php" method="POST">
                        <div class="form-group form-check">
                            <label for="plataforma">Elige la plataforma que deseas buscar </label><br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="1">NES<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="2">Arcade<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="3">Atari<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="4">MSX<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="5">Colecovisión<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="8">Amstrad CPC<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="9">SNES<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="10">Commodore Amiga<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="11">Famicom<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="12">Sega<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="13">PlayChoice-10<br>
                            <input type="radio" class="form-check-input" id="plataforma" name="plataforma" value="14">ZX Spectrum<br>
                        </div>
                        <div class="form-group">
                            <label for="buscar_g"></label>
                            <button type="submit" class="form-control cyan principal" id="buscar_g" name="buscar_g">Buscar juegos</button>
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

