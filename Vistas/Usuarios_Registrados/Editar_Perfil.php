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
        <title>Editar perfil</title>
    </head>
    <body>
        <?php
        include_once '../../Modelo/Usuario.php';
        session_start();
        $usuario = $_SESSION ['user'];
        ?>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-12 titulo">
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
                    <div class="col-lg-12 col-sm-12 breadcrumb principal">
                        <div class="breadcrumb-item"><a href="../../index.php" class="deeppink">Inicio</a></div>
                        <div class="breadcrumb-item"><a href="../../Vistas/Otras/Iniciar_Sesion.php" class="deeppink">Inicio de sesión</a></div>
                        <div class="breadcrumb-item"><a href="../Usuarios_Registrados" class="deeppink">Usuarios registrados</a></div>
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Editar perfil</a></div>
                    </div>
                </nav>
            </div>

            <div class="row mt-2 mb-2 principal">
                <div class="col-lg-4 col-sm-2"></div>
                <div class="col-lg-4 col-sm-8 mt-2 mb-2 cyan">
                    <h3>Editar perfil</h3>

                    <?php
                    if (!empty($usuario)) {
                        ?>

                        <form name="editar_perfil" action="../../Controladores/Controlador_Usuario_Registrado.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $usuario->getEmail() ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="passw">Contraseña </label>
                                <input type="password" class="form-control" id="passw" name="passw" placeholder="Escribe tu nueva contraseña">
                            </div>
                            <div class="form-group">
                                <label for="passw2">Reescribir contraseña </label>
                                <input type="password" class="form-control" id="passw2" name="passw2" placeholder="Escribe tu nueva contraseña otra vez">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario->getNombre() ?>">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos </label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $usuario->getApellidos() ?>">
                            </div>
                            <div class="form-group">
                                <label for="editar"></label>
                                <button type="submit" class="form-control cyan principal" id="editar" name="editar">Editar perfil</button>
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
                <div class="col-lg-4 col-sm-2 mt-3 mb-2"></div>
            </div>

            <div class="row mt-5 principal cyan">
                <div class="col-lg-12 col-sm-12">
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
