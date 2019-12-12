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
        <title>Administración de juegos</title>
    </head>
    <body>
        <?php
        include_once '../../Modelo/Videojuego.php';
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
                        <div class="breadcrumb-item active"><a href="#" class="deeppink">Administrar juegos</a></div>
                    </div>
                </nav>
            </div>


            <div class="row mt-2 mb-2 principal">
                <div class="col-lg-4 col-sm-2"></div>
                <div class="col-lg-4 col-sm-8 mt-2 mb-2 cyan">
                    <h3>Administración de juegos</h3>

                    <?php
                    if (!empty($usuario)) {

                        $listaJuegos = $_SESSION['listaJuegos'];

                        for ($i = 0; $i < count($listaJuegos); $i++) {
                            $j = $listaJuegos [$i];
                            ?>
                            <form action="../../Controladores/Controlador_Administrador.php" name="admin_juegos" method="POST">
                                <div class="form-group">
                                    <label for="codigo"></label>
                                    <input type="hidden" class="form-control" id="codigo" name="codigo" value="<?= $j->getCodigo() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Título </label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $j->getTitulo() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="anio">Año de publicación </label>
                                    <input type="text" class="form-control" id="anio" name="anio" value="<?= $j->getAnio() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pais">País de procedencia </label>
                                    <input type="text" class="form-control" id="pais" name="pais" value="<?= $j->getPais() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="empresa">Empresa que lo produjo </label>
                                    <input type="text" class="form-control" id="empresa" name="empresa" value="<?= $j->getProductora() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="resumen">Resumen </label>
                                    <input type="text" class="form-control" id="resumen" name="resumen" value="<?= $j->getResumen() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="plataforma">Plataformas para las que estuvo disponible </label>
                                    <input type="text" class="form-control" id="plataforma" name="plataforma" value="<?= $j->getPlataformas() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="genero">Género </label>
                                    <input type="text" class="form-control" id="genero" name="genero" value="<?= $j->getGenero() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen </label>
                                    <img src="<?= $j->getImagen() ?>" width="200px">
                                </div>
                                <?php if ($j->getEstado() == 0) { ?>
                                    <div class="form-group">
                                        <label for="inactivo_j"></label>
                                        <button type="submit" class="form-control cyan principal" id="inactivo_j" name="inactivo_j">Inactivo</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="activo_j"></label>
                                        <button type="submit" class="form-control cyan principal" id="activo_j" name="activo_j">Activo</button>
                                    </div>
                                <?php }
                                ?>
                                <div class="form-group">
                                    <label for="modificar_j"></label>
                                    <button type="submit" class="form-control cyan principal" id="modificar_j" name="modificar_j">Modificar</button>
                                </div>
                                <div class="form-group">
                                    <label for="borrar_j"></label>
                                    <button type="submit" class="form-control cyan principal" id="borrar_j" name="borrar_j">Borrar</button>
                                </div>
                            </form>

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

