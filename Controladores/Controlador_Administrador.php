<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../Auxiliares/Conexion.php';
        include_once '../Modelo/Review.php';
        include_once '../Modelo/Videojuego.php';
        include_once '../Modelo/Usuario.php';
        session_start();
//************************************************************************************************************************
//*****************************************CONTROLADOR ACCIÓN*************************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['acept'])) {
            $accion = $_REQUEST ['accion'];
            if ($accion == "juegos") {
                $listaJuegos = Conexion::obtenerJuegos();
                $_SESSION['listaJuegos'] = $listaJuegos;
                header("Location: ../Vistas/Administrador/Administrar_Juegos.php");
            }
            if ($accion == "reviews") {
                $listaReviews = Conexion::obtenerReviews();
                $_SESSION['listaReviews'] = $listaReviews;
                header("Location: ../Vistas/Administrador/Administrar_Reviews.php");
            }
            if ($accion == "usuarios") {
                $listaUsuarios = Conexion::obtenerUsuarios();
                $_SESSION['listaUsuarios'] = $listaUsuarios;
                header("Location: ../Vistas/Administrador/Administrar_Usuarios.php");
            }
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR GESTIÓN REVIEWS****************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['inactivo_r'])) {
            $codigo = $_REQUEST['codigo'];
            $num = 1;
            Conexion::modificarEstadoReview($codigo, $num);
            $listaReviews = Conexion::obtenerReviews();
            $_SESSION['listaReviews'] = $listaReviews;
            header("Location: ../Vistas/Administrador/Administrar_Reviews.php");
        }

        if (isset($_REQUEST['activo_r'])) {
            $codigo = $_REQUEST['codigo'];
            $num = 0;
            Conexion::modificarEstadoReview($codigo, $num);
            $listaReviews = Conexion::obtenerReviews();
            $_SESSION['listaReviews'] = $listaReviews;
            header("Location: ../Vistas/Administrador/Administrar_Reviews.php");
        }

        if (isset($_REQUEST['modificar_r'])) {
            $codigo = $_REQUEST['codigo'];
            $descripcion = $_REQUEST ['descripcion'];
            $titulo = $_REQUEST ['titulo'];
            Conexion::modificarReview($codigo, $descripcion, $titulo);
            $listaReviews = Conexion::obtenerReviews();
            $_SESSION['listaReviews'] = $listaReviews;
            header("Location: ../Vistas/Administrador/Administrar_Reviews.php");
        }

        if (isset($_REQUEST['borrar_r'])) {
            $codigo = $_REQUEST['codigo'];
            Conexion::borrarReview($codigo);
            $listaReviews = Conexion::obtenerReviews();
            $_SESSION['listaReviews'] = $listaReviews;
            header("Location: ../Vistas/Administrador/Administrar_Reviews.php");
        }

        if (isset($_REQUEST['add_r'])) {
            header("Location: ../Vistas/Usuarios_Registrados/Add_Review.php");
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR GESTIÓN JUEGOS*****************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['inactivo_j'])) {
            $codigo = $_REQUEST['codigo'];
            $num = 1;
            Conexion::modificarEstadoJuego($codigo, $num);
            $listaJuegos = Conexion::obtenerJuegos();
            $_SESSION['listaJuegos'] = $listaJuegos;
            header("Location: ../Vistas/Administrador/Administrar_Juegos.php");
        }

        if (isset($_REQUEST['activo_j'])) {
            $codigo = $_REQUEST['codigo'];
            $num = 0;
            Conexion::modificarEstadoJuego($codigo, $num);
            $listaJuegos = Conexion::obtenerJuegos();
            $_SESSION['listaJuegos'] = $listaJuegos;
            header("Location: ../Vistas/Administrador/Administrar_Juegos.php");
        }

        if (isset($_REQUEST['modificar_j'])) {
            $titulo = $_REQUEST['titulo'];
            $anio = $_REQUEST['anio'];
            $pais = $_REQUEST['pais'];
            $productora = $_REQUEST['empresa'];
            $resumen = $_REQUEST['resumen'];
            $plataformas = $_REQUEST['plataforma'];
            $genero = $_REQUEST['genero']; 
            $codigo = $_REQUEST['codigo'];
            
            Conexion::modificarJuego($codigo, $titulo, $anio, $pais, $productora, $resumen, $plataformas, $genero);
            $listaJuegos = Conexion::obtenerJuegos();
            $_SESSION['listaJuegos'] = $listaJuegos;
            header("Location: ../Vistas/Administrador/Administrar_Juegos.php");
        }

        if (isset($_REQUEST['borrar_j'])) {
            $codigo = $_REQUEST['codigo'];
            Conexion::borrarJuego($codigo);
            $listaJuegos = Conexion::obtenerJuegos();
            $_SESSION['listaJuegos'] = $listaJuegos;
            header("Location: ../Vistas/Administrador/Administrar_Juegos.php");
        }

        if (isset($_REQUEST['add_j'])) {
            header("Location: ../Vistas/Usuarios_Registrados/Add_Juego.php");
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR GESTIÓN USUARIOS***************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['inactivo_u'])) {
            $codigo = $_REQUEST['codigo'];
            $num = 1;
            Conexion::modificarEstadoUsuario($codigo, $num);
            $listaUsuarios = Conexion::obtenerUsuarios();
            $_SESSION['listaUsuarios'] = $listaUsuarios;
            header("Location: ../Vistas/Administrador/Administrar_Usuarios.php");
        }

        if (isset($_REQUEST['activo_u'])) {
            $codigo = $_REQUEST['codigo'];
            $num = 0;
            Conexion::modificarEstadoUsuario($codigo, $num);
            $listaUsuarios = Conexion::obtenerUsuarios();
            $_SESSION['listaUsuarios'] = $listaUsuarios;
            header("Location: ../Vistas/Administrador/Administrar_Usuarios.php");
        }

        if (isset($_REQUEST['modificar_u'])) {
            $email = $_REQUEST['email'];
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            $rol = $_REQUEST['rol'];
            Conexion::modificarUsuario($email, $nombre, $apellidos, $rol);
            $listaUsuarios = Conexion::obtenerUsuarios();
            $_SESSION['listaUsuarios'] = $listaUsuarios;
            header("Location: ../Vistas/Administrador/Administrar_Usuarios.php");
        }

        if (isset($_REQUEST['borrar_u'])) {
            $email = $_REQUEST['email'];
            Conexion::borrarUsuario($email);
            $listaUsuarios = Conexion::obtenerUsuarios();
            $_SESSION['listaUsuarios'] = $listaUsuarios;
            header("Location: ../Vistas/Administrador/Administrar_Usuarios.php");
        }

        if (isset($_REQUEST['add_u'])) {
            header("Location: ../Vistas/Otras/Registro.php");
        }

        if (isset($_REQUEST['cerrar'])) {
            session_destroy();
            header("Location: ../index.php");
        }
        ?>
    </body>
</html>
