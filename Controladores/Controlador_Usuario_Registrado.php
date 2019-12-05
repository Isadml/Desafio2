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
        include_once '../Auxiliares/Videojuego.php';
        include_once '../Auxiliares/Conexion.php';
        include_once '../Auxiliares/Usuario.php';
        session_start();

//************************************************************************************************************************
//*****************************************CONTROLADOR ADD JUEGO**********************************************************
//************************************************************************************************************************
        if (isset($_REQUEST['aceptar'])) {
            // Datos de la imagen
            $nombre_img = $_FILES['imagen']['name'];
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];

            //Si existe imagen y tiene un tamaño correcto
            if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) {
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {

                    // Ruta donde se guardarán las imágenes que subamos
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Ejercicios/Desafio2_Isabel/imagenes/';
                    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);
                } else {
                    //si no cumple con el formato
                    echo 'Error al subir la imagen, formato no válido.';
                }
            } else {
                //si existe la variable pero se pasa del tamaño permitido
                if ($nombre_img == !NULL) {
                    echo 'Error al subir la imagen, tamaño no válido.';
                }
            }

            $titulo = $_REQUEST['titulo'];
            $anio = $_REQUEST['anio'];
            $pais = $_REQUEST['pais'];
            $productora = $_REQUEST['empresa'];
            $resumen = $_REQUEST['resumen'];
            foreach ($plataformas as $dato){
                $plataform = $plataform + $dato;
            }
            
            $genero  = $_REQUEST['genero'];

            Conexion::abrirBBDD();
            Conexion::addJuegos($titulo, $anio, $pais, $productora, $resumen, $plataform, $genero, $directorio);
            Conexion::cerrarBBDD();
            header("Location: ../Vistas/Usuarios_Registrados/Add_Juego.php");
        }


//************************************************************************************************************************
//*****************************************CONTROLADOR EDITAR PERFIL******************************************************
//************************************************************************************************************************
        if (isset($_REQUEST['editar'])) {
            $email = $_REQUEST['email'];
            $password = $_REQUEST['passw'];
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];

            Conexion::abrirBBDD();
            Conexion::modificarUsuario($email, $nombre, $apellidos, $password);
            $usuario = Conexion::existeUsuario($email);
            $_SESSION['user'] = $usuario;
            Conexion::cerrarBBDD();
            header("Location: ../Vistas/Usuarios_Registrados/Editar_Perfil.php");
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR ADD REVIEW*********************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['subir'])) {
            $user = $_REQUEST['nombre'];
            $titulo = $_REQUEST['titulo'];
            $descripcion = $_REQUEST['descripcion'];

            Conexion::abrirBBDD();
            Conexion::addReview($user, $titulo, $descripcion);
            Conexion::cerrarBBDD();
            header("Location: ../Vistas/Usuarios_Registrados/Add_Review.php");
        }
        ?>
    </body>
</html>
