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
        <title>Página de registro</title>
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


            <div class="row mt-2 mb-2 principal">
                <div class="col-4 "></div>
                <div class="col-4 mt-2 mb-2 cyan">
                    <h3>Página de registro</h3>

                    <form name="editar_perfil" action="../../Controladores/Controlador_general.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Inserte su email">
                        </div>
                        <div class="form-group">
                            <label for="passw">Contraseña </label>
                            <input type="password" class="form-control" id="passw" name="passw" placeholder="Inserte su contraseña">
                        </div>
                        <div class="form-group">
                            <label for="passw2">Reescribir contraseña </label>
                            <input type="password" class="form-control" id="passw2" name="passw2" placeholder="Inserte su contraseña otra vez">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba su nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos </label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escriba sus apellidos">
                        </div>
                        <div class="form-group">
                            <label for="registro"></label>
                            <button type="submit" class="form-control cyan principal" id="registro" name="registro">Registrarse</button>
                        </div>
                    </form>

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

