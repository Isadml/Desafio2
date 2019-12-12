<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>controlador</title>
    </head>
    <body>
        <?php
        include_once '../Auxiliares/Conexion.php';
        include_once '../Modelo/Usuario.php';
        include_once '../Modelo/Review.php';
        include_once '../Modelo/Videojuego.php';
        session_start();

//************************************************************************************************************************
//*****************************************CONTROLADOR INICIO SESIÓN******************************************************
//************************************************************************************************************************
        if (isset($_REQUEST['aceptar'])) {
            $email = $_REQUEST ['email'];
            $password = $_REQUEST['passw'];
            $pasword_encriptado = md5($password);

            $usuario = Conexion::existeUsuario($email);

            if (!empty($usuario)) {
                $em = $usuario->getEmail();
                $clave = $usuario->getClave();
                $_SESSION['user'] = $usuario;

                if ($em == $email && $clave == $pasword_encriptado) {
                    if ($usuario->getRol() == 1) {
                        header("Location: ../Vistas/Usuarios_Registrados/Editar_Perfil.php");
                    } else {
                        header("Location: ../Vistas/Administrador/Elegir_Accion.php");
                    }
                } else {
                    print "Datos de login incorrectos.";
                }
            } else {
                header("Location: ../index.php");
            }
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR REGISTRO***********************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['registro'])) {
            $email = $_REQUEST['email'];
            $password = $_REQUEST['passw'];
            $pasword_encriptado = md5($pass);
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];

            Conexion::insertarUsuario($email, $nombre, $apellidos, $pasword_encriptado);

            header("Location: ../index.php");
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR RECUPERAR PASS*****************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['aceptar_email'])) {
            $email = $_REQUEST['email'];

            $u = Conexion::existeUsuario($email);

            if (!empty($u)) {
                $from = "From: auxiliardaw2@gmail.com";
                $clave = "Chubaca20";
                $message = "Su contraseña de inicio de sesión es " . $clave . "\r\nLe recomendamos que la cambie al volver a iniciar sesión.";
                $subject = "Contraseña olvidada";

                $mandado = mail($email, $subject, $message, $from);
                if ($mandado) {
                    echo "Correo enviado.";
                } else {
                    echo "No se ha podido mandar el email de recuperación de contraseña.";
                }
            }
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR BUSCAR NOMBRE******************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['buscar_n'])) {
            $nombre = $_REQUEST ['titulo'];

            $juegos = Conexion::buscarJuegosNombre($nombre);

            $_SESSION['juegos'] = $juegos;
            header("Location: ../Vistas/Otras/Resultados.php");
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR BUSCAR GENERO******************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['buscar_g'])) {
            $genero = $_REQUEST ['genero'];

            $juegos = Conexion::buscarJuegosGenero($genero);

            $_SESSION['juegos'] = $juegos;
            header("Location: ../Vistas/Otras/Resultados.php");
        }

//************************************************************************************************************************
//*****************************************CONTROLADOR BUSCAR PLATAFORMA**************************************************
//************************************************************************************************************************

        if (isset($_REQUEST['buscar_p'])) {
            $plataforma = $_REQUEST ['plataforma'];

            $juegos = Conexion::buscarJuegosPlataforma($plataforma);

            $_SESSION['juegos'] = $juegos;
            header("Location: ../Vistas/Otras/Resultados.php");
        }
        ?>
    </body>
</html>
