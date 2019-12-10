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
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Inicio de sesión</a></div>
                </nav>
            </div>

            <div class="row mt-2 mb-2 principal">
                <div class="col-4 "></div>
                <div class="col-4 mt-2 mb-2 cyan">
                    <h3>Inicio de sesión</h3>

                    <form name="inicio_sesion" action="../../Controladores/Controlador_general.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu email">
                        </div>
                        <div class="form-group">
                            <label for="passw">Contraseña </label>
                            <input type="password" class="form-control" id="passw" name="passw" placeholder="Escribe tu contraseña">
                        </div>
                        <div class="form-group">
                            <label for="aceptar"></label>
                            <button type="submit" class="form-control cyan principal" id="aceptar" name="aceptar">Aceptar</button>
                        </div>
                    </form>
                    <a href="Registro.php" class="nav-link cyan">Registrarse</a>
                    <a href="Recuperar_Password.php" class="nav-link cyan">He olvidado mi contraseña</a>

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

