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
        <title>Administración de usuarios</title>
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
                    <h3>Administración de usuarios</h3>

                    <?php
                    include_once '../../Modelo/Usuario.php';
                    session_start();
                    $usuario = $_SESSION ['user'];
                     if (!empty($usuario)) {
                        $listaUsuarios = $_SESSION['listaUsuarios'];

                        for ($i = 0; $i < count($listaUsuarios); $i++) {
                            $u = $listaUsuarios [$i];
                            ?>
                            <form action="../../Controladores/Controlador_Administrador.php" name="admin_usuarios" method="POST">
                                <div class="form-group">
                                    <label for="codigo"></label>
                                    <input type="hidden" class="form-control" id="codigo" name="codigo" value="<?= $u->getCodigo() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $u->getEmail() ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $u->getNombre() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos: </label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $u->getApellidos() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="rol">Rol: </label>
                                    <input type="text" id="rol" class="form-control" name="rol" value="<?= $u->getRol() ?>">
                                </div>
                                <?php if ($u->getEstado() == 0) { ?>
                                    <div class="form-group">
                                        <label for="inactivo_u"></label>
                                        <button type="submit" class="form-control cyan principal" id="inactivo_u" name="inactivo_u">Inactivo</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="activo_u"></label>
                                        <button type="submit" class="form-control cyan principal" id="activo_u" name="activo_u">Activo</button>
                                    </div>
                                <?php }
                                ?>
                                <div class="form-group">
                                    <label for="modificar_u"></label>
                                    <button type="submit" class="form-control cyan principal" id="modificar_u" name="modificar_u">Modificar</button>
                                </div>
                                <div class="form-group">
                                    <label for="borrar_u"></label>
                                    <button type="submit" class="form-control cyan principal" id="borrar_u" name="borrar_u">Borrar</button>
                                </div>
                            </form>

                        <?php } ?>
                        <form name="add" action="../../Controladores/Controlador_Administrador.php" method="POST">
                            <div class="form-group">
                                <label for="add_u"></label>
                                <button type="submit" class="form-control cyan principal" id="add_u" name="add_u">+</button>
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

