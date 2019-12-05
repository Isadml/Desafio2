<?php

include_once 'Constantes.php';
include_once 'Usuario.php';
include_once 'Videojuego.php';
include_once 'Review.php';

/**
 * Description of Conexion
 *
 * @author daw203
 */
class Conexion {

    private static $conex;
    private static $sentencia;
    private static $resultado;

    /**
     * Abre la base de datos con los datos incluidos en la clase constantes.
     */
    static function abrirBBDD() {
        try {
            self::$conex = mysqli_connect(Constantes::$host, Constantes::$usuario, Constantes::$password, Constantes::$BBDD);
        } catch (Exception $ex) {
            if (mysqli_connect_errno(self::$conex)) {
                print "Fallo al conectar a MySQL: " . mysqli_connect_error(self::$conex);
                print $ex->getMessage();
            }
        }
    }

    /**
     * Cierra la conexión de la base de datos tras liberar la variable $resultado.
     */
    static function cerrarBBDD() {

        self::$resultado = mysqli_free_result();
        self::$conex = mysqli_close();
    }

    /**
     * Busca en la BBDD si el usuario que intenta hacer login existe (por su email) y si existe, obtiene sus datos.
     * @param type $email
     * @param string $usuario
     */
    static function existeUsuario($email) {
        try {
            self::$sentencia = "SELECT * FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare(self::$conex, self::$sentencia);
            mysqli_stmt_bind_param($stmt, "s", $email);
            if (self::$resultado = mysqli_stmt_execute($stmt)) {
                self::$resultado = mysqli_stmt_get_result($stmt);
                    if ($fila = mysqli_fetch_row(self::$resultado)) {
                        $usuario = new Usuario ();
                        $usuario->setCodigo($fila[0]);
                        $usuario->setNombre($fila[1]);
                        $usuario->setApellidos($fila[2]);
                        $usuario->setClave($fila[3]);
                        $usuario->setEmail($fila[4]);
                        $usuario->setRol($fila[5]);
                    }
                }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $usuario;
    }

    /**
     * Inserta usuarios en la base de datos.
     * @param type $email
     * @param type $nombre
     * @param type $edad
     * @param type $pass
     */
    static function insertarUsuario($email, $nombre, $apellidos, $pass) {
        self::$sentencia = "INSERT INTO usuarios (nombre, apellidos, password, email, cod_rol) VALUES (?, ?, ?, ?, 0)";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellidos, $pass, $email);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }

    /**
     * Obtiene la lista completa de los usuarios que hay almacenados en la bbdd.
     * @return \Usuario
     */
    static function obtenerUsuarios() {
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM usuarios";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $usuario = new Usuario ();
                        $usuario->setCodigo($fila[0]);
                        $usuario->setNombre($fila[1]);
                        $usuario->setApellidos($fila[2]);
                        $usuario->setClave($fila[3]);
                        $usuario->setEmail($fila[4]);
                        $usuario->setRol($fila[5]);
                        $lista [$i] = $usuario;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
    }

    /**
     * Modifica los datos del usuario usando su email para acceder a su entrada en la bbdd.
     * @param type $email
     * @param type $nombre
     * @param type $edad
     */
    static function modificarUsuario($email, $nombre, $apellidos, $pass) {
        self::$sentencia = "UPDATE usuarios SET nombre = ?, apellidos = ?, password = ? WHERE email = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellidos, $pass, $email);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }

    /**
     * Borra de la bbdd  a un usuario usando su email como filtro.
     * @param type $email
     */
    static function borrarUsuario($email) {
        self::$sentencia = "DELETE FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro borrado con éxito' . '<br/>';
        } else {
            echo "Error al borrar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }
    
    /**
     * Añade reseñas en la bbdd. El campo "estado" se añade por defecto a 0 para 
     * que las reseñas queden inactivas hasta que el administrador las active.
     * @param type $nombre
     * @param type $titulo
     * @param type $descripcion
     */
    static function addReview($nombre, $titulo, $descripcion) {
        self::$sentencia = "INSERT INTO reviews (usuario, descripcion, titulo, estado) VALUES (?, ?, ?, 0)";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $descripcion,  $titulo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }
    
    /**
     * Obtiene la lista completa de reseñas disponibles en la BBDD, independientemente de su estado.
     * @return \Review
     */
    static function obtenerReviews() {
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM reviews";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $review = new Review ();
                        $review->setCodigo($fila[0]);
                        $review->setUsuario($fila[1]);
                        $review->setDescripcion($fila[2]);
                        $review->setTitulo($fila[3]);
                        $review->setEstado($fila[4]);
                        $lista [$i] = $review;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
    }
    
    /**
     * Borra la reseña deseada de la bbdd con el código de la misma.
     * @param type $codigo
     */
    static function borrarReview($codigo) {
        self::$sentencia = "DELETE FROM reviews WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "i", $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro borrado con éxito' . '<br/>';
        } else {
            echo "Error al borrar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }
    
    /**
     * Modifica el estado de la reseña. Si está inactiva le cambia el valor de 0 a 1 para activarla y viceversa.
     * @param type $codigo
     * @param type $num
     */
    static function modificarEstadoReview($codigo, $num) {
        self::$sentencia = "UPDATE reviews SET estado = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ii", $num, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }
    
    
    static function modificarReview($codigo, $descripcion, $titulo ) {
        self::$sentencia = "UPDATE reviews SET descripcion = ?, titulo = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ssi", $descripcion, $titulo, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
    }
    
    static function obtenerJuegos() {
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM usuarios";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $usuario = new Usuario ();
                        $usuario->setCodigo($fila[0]);
                        $usuario->setNombre($fila[1]);
                        $usuario->setApellidos($fila[2]);
                        $usuario->setClave($fila[3]);
                        $usuario->setEmail($fila[4]);
                        $usuario->setRol($fila[5]);
                        $lista [$i] = $usuario;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
    }
}

