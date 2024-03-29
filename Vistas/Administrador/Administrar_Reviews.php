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
        <?php
        include_once '../../Modelo/Review.php';
        include_once '../../Modelo/Usuario.php';
        session_start();
        $usuario = $_SESSION ['user'];
        ?>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-12 titulo">
                    <header>
                        <img src="../../imagenes/logo.svg" width="100px">
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
                        <div class="breadcrumb-item"><a href="../Administrador/" class="deeppink">Administración</a></div>
                        <div class="breadcrumb-item"><a href="../Administrador/Elegir_Accion.php" class="deeppink">Elegir acción</a></div>
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Administrar reseñas</a></div>
                    </div>
                </nav>
            </div>

            <div class="row mt-2 mb-2 principal">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 col-sm-8 mt-2 mb-2 cyan">
                    <h3>Administración de reseñas</h3>

                    <?php
                    if (!empty($usuario)) {
                        $listaReviews = $_SESSION['listaReviews'];
                        ?>
                        <table>
                            <tbody>

                                <?php
                                for ($i = 0; $i < count($listaReviews); $i++) {
                                    $r = $listaReviews [$i];
                                    ?>
                                    <tr>
                                <form action="../../Controladores/Controlador_Administrador.php" name="admin_reviews" method="POST">
                                    <td>
                                        <div class="form-group">
                                            <label for="codigo"></label>
                                            <input type="hidden" class="form-control" id="codigo" name="codigo" value="<?= $r->getCodigo() ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="titulo">Título: </label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $r->getTitulo() ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción: </label>
                                            <input type="text" id="descripcion" class="form-control" name="descripcion" value="<?= $r->getDescripcion() ?>">
                                        </div>
                                    </td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="modificar_r"></label>
                                            <button type="submit" class="form-control cyan principal" id="modificar_r" name="modificar_r">Modificar</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="borrar_r"></label>
                                            <button type="submit" class="form-control cyan principal" id="borrar_r" name="borrar_r">Borrar</button>
                                        </div>
                                    </td>
                                </form>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <div class="col-lg-2"></div>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-sm-2"></div>
                    <div class="col-lg-4 col-sm-4">
                        <form name="add" action="../../Controladores/Controlador_Administrador.php" method="POST">
                            <div class="form-group">
                                <label for="add_u"></label>
                                <input type="submit" class="form-control cyan principal" id="add_u" name="add_u" value="+">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control cyan principal" id="cerrar"name="cerrar" value="Cerrar sesión">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="form-group">
                            <label for="volver"></label>
                            <input type="submit" id="volver" name="volver" class="form-control cyan principal" value="Volver" onclick="pag_Anterior()">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2"></div>
                </div>

                <?php
            } else {
                echo 'No tiene permisos para acceder a esta página.';
                ?>
                <img src="../../imagenes/04FamicomCategoria.gif" width="300px">
                <?php
            }
            ?>

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

