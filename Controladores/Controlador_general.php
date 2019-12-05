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
        include_once '../Auxiliares/Usuario.php';
        session_start();

//************************************************************************************************************************
//*****************************************CONTROLADOR INICIO SESIÓN******************************************************
//************************************************************************************************************************
        if (isset($_REQUEST['aceptar'])) {
            $email = $_REQUEST ['email'];
            $password = $_REQUEST['passw'];

            Conexion::abrirBBDD();
            $usuario = Conexion::existeUsuario($email);
            Conexion::cerrarBBDD();

            if (!empty($usuario)) {
                $em = $usuario->getEmail();
                $clave = $usuario->getClave();
                $_SESSION['user'] = $usuario;

                if ($em == $email && $clave == $password) {
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
        
        if (isset($_REQUEST['registro'])){
            $email = $_REQUEST['email'];
            $password = $_REQUEST['passw'];
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            
            Conexion::abrirBBDD();
            Conexion::insertarUsuario($email, $nombre, $apellidos, $password);
            Conexion::cerrarBBDD();
            
            header("Location: ../index.php");
        }
        
//************************************************************************************************************************
//*****************************************CONTROLADOR RECUPERAR PASS*****************************************************
//************************************************************************************************************************
        
        if (isset($_REQUEST['aceptar_email'])){
            $email = $_REQUEST['email'];
            Conexion::abrirBBDD();
            $u = Conexion::existeUsuario($email);
            Conexion::cerrarBBDD();
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
        
        ?>
    </body>
</html>
