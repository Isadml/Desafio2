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
        <title>Administración de reseñas</title>
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
                    <h3>Administración de reseñas</h3>

                    <?php
                    include_once '../../Modelo/Review.php';
                    include_once '../../Modelo/Usuario.php';
                    session_start();
                    $usuario = $_SESSION ['user'];
                     if (!empty($usuario)) {
                        $listaReviews = $_SESSION['listaReviews'];

                        for ($i = 0; $i < count($listaReviews); $i++) {
                            $r = $listaReviews [$i];
                            ?>
                            <form action="../../Controladores/Controlador_Administrador.php" name="admin_reviews" method="POST">
                                <div class="form-group">
                                    <label for="codigo"></label>
                                    <input type="hidden" class="form-control" id="codigo" name="codigo" value="<?= $r->getCodigo() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Título: </label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $r->getTitulo() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción: </label>
                                    <input type="text" id="descripcion" class="form-control" name="descripcion" value="<?= $r->getDescripcion() ?>">
                                </div>
                                <?php if ($r->getEstado() == 0) { ?>
                                    <div class="form-group">
                                        <label for="inactivo_r"></label>
                                        <button type="submit" class="form-control cyan principal" id="inactivo_r" name="inactivo_r">Inactivo</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="activo_r"></label>
                                        <button type="submit" class="form-control cyan principal" id="activo_r" name="activo_r">Activo</button>
                                    </div>
                                <?php }
                                ?>
                                <div class="form-group">
                                    <label for="modificar_r"></label>
                                    <button type="submit" class="form-control cyan principal" id="modificar_r" name="modificar_r">Modificar</button>
                                </div>
                                <div class="form-group">
                                    <label for="borrar_r"></label>
                                    <button type="submit" class="form-control cyan principal" id="borrar_r" name="borrar_r">Borrar</button>
                                </div>
                            </form>

                        <?php } ?>
                        <form name="add" action="../../Controladores/Controlador_Administrador.php" method="POST">
                            <div class="form-group">
                                <label for="add_r"></label>
                                <button type="submit" class="form-control cyan principal" id="add_r" name="add_r">+</button>
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

