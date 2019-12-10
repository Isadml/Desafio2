<?php

include_once 'Constantes.php';
include_once '../Modelo/Usuario.php';
include_once '../Modelo/Videojuego.php';
include_once '../Modelo/Review.php';

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
        Conexion::abrirBBDD();
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
        Conexion::cerrarBBDD();
    }

    /**
     * Inserta usuarios en la base de datos.
     * @param type $email
     * @param type $nombre
     * @param type $edad
     * @param type $pass
     */
    static function insertarUsuario($email, $nombre, $apellidos, $pass) {
        Conexion::abrirBBDD();
        self::$sentencia = "INSERT INTO usuarios (nombre, apellidos, password, email, cod_rol, estado) VALUES (?, ?, ?, ?, 0, 0)";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellidos, $pass, $email);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }

    /**
     * Obtiene la lista completa de los usuarios que hay almacenados en la bbdd.
     * @return \Usuario
     */
    static function obtenerUsuarios() {
        Conexion::abrirBBDD();
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
                        $usuario->setEstado($fila[6]);
                        $lista [$i] = $usuario;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
        Conexion::cerrarBBDD();
    }

    /**
     * Modifica los datos del usuario usando su email para acceder a su entrada en la bbdd.
     * @param type $email
     * @param type $nombre
     * @param type $edad
     */
    static function modificarUsuario($email, $nombre, $apellidos, $rol) {
        Conexion::abrirBBDD();
        self::$sentencia = "UPDATE usuarios SET nombre = ?, apellidos = ?, cod_rol = ? WHERE email = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ssis", $nombre, $apellidos, $rol, $email);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }

    /**
     * Borra de la bbdd  a un usuario usando su email como filtro.
     * @param type $email
     */
    static function borrarUsuario($email) {
        Conexion::abrirBBDD();
        self::$sentencia = "DELETE FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro borrado con éxito' . '<br/>';
        } else {
            echo "Error al borrar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Añade reseñas en la bbdd. El campo "estado" se añade por defecto a 0 para 
     * que las reseñas queden inactivas hasta que el administrador las active.
     * @param type $nombre
     * @param type $titulo
     * @param type $descripcion
     */
    static function addReview($nombre, $titulo, $descripcion) {
        Conexion::abrirBBDD();
        self::$sentencia = "INSERT INTO reviews (usuario, descripcion, titulo, estado) VALUES (?, ?, ?, 0)";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $descripcion,  $titulo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Obtiene la lista completa de reseñas disponibles en la BBDD, independientemente de su estado.
     * @return \Review
     */
    static function obtenerReviews() {
        Conexion::abrirBBDD();
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
        Conexion::cerrarBBDD();
    }
    
    /**
     * Borra la reseña deseada de la bbdd con el código de la misma.
     * @param type $codigo
     */
    static function borrarReview($codigo) {
        Conexion::abrirBBDD();
        self::$sentencia = "DELETE FROM reviews WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "i", $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro borrado con éxito' . '<br/>';
        } else {
            echo "Error al borrar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Modifica el estado de la reseña. Si está inactiva le cambia el valor de 0 a 1 para activarla y viceversa.
     * @param type $codigo
     * @param type $num
     */
    static function modificarEstadoReview($codigo, $num) {
        Conexion::abrirBBDD();
        self::$sentencia = "UPDATE reviews SET estado = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ii", $num, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Modifica los campos descripción o título de una reseña.
     * @param type $codigo
     * @param type $descripcion
     * @param type $titulo
     */
    static function modificarReview($codigo, $descripcion, $titulo ) {
        Conexion::abrirBBDD();
        self::$sentencia = "UPDATE reviews SET descripcion = ?, titulo = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "ssi", $descripcion, $titulo, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Modifica el estado del usuario. Si está inactivo le cambia el valor de 0 a 1 para activarlo y viceversa.
     * @param type $codigo
     * @param type $num
     */
    static function modificarEstadoUsuario($codigo, $num) {
        Conexion::abrirBBDD();
        self::$sentencia = "UPDATE usuarios SET estado = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "is", $num, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Agrega juegos a la bbdd.
     * @param type $titulo
     * @param type $anio
     * @param type $pais
     * @param type $productora
     * @param type $resumen
     * @param type $plataformas
     * @param type $genero
     * @param type $imagen
     */
    static function addJuegos ($titulo, $anio, $pais, $productora, $resumen, $plataformas, $genero, $imagen){
        Conexion::abrirBBDD();
        self::$sentencia = "INSERT INTO videojuegos (codigo, titulo, anio, pais, productora, resumen, plataformas, genero, estado, imagen) VALUES (0,?, ?, ?, ?, ?, ?, ?, 0, ?)";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "sissssss", $titulo, $anio, $pais, $productora, $resumen, $plataformas, $genero, $imagen);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
        
    /**
     * Obtiene todos los videojuegos almacenados en la bbdd y los devuelve en una lista.
     * @return \Videojuego
     */
    static function obtenerJuegos() {
        Conexion::abrirBBDD();
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM videojuegos";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $videojuego = new Videojuego ();
                        $videojuego->setCodigo($fila[0]);
                        $videojuego->setTitulo($fila[1]);
                        $videojuego->setAnio($fila[2]);
                        $videojuego->setPais($fila[3]);
                        $videojuego->setProductora($fila[4]);
                        $videojuego->setResumen($fila[5]);
                        $videojuego->setPlataformas($fila[6]);
                        $videojuego->setGenero($fila[7]);
                        $videojuego->setEstado($fila[8]);
                        $videojuego->setImagen($fila[9]);
                        $lista [$i] = $videojuego;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
        Conexion::cerrarBBDD();
    }
    
    /**
     * Cambia el estado del juego activándolo o desactivándolo para aparecer en la web o no.
     * @param type $codigo
     * @param type $num
     */
    static function modificarEstadoJuego($codigo, $num) {
        Conexion::abrirBBDD();
        self::$sentencia = "UPDATE videojuegos SET estado = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "is", $num, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro modificado con éxito' . '<br/>';
        } else {
            echo "Error al modificar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Elimina juegos de la bbdd con el código del mismo.
     * @param type $codigo
     */
    static function borrarJuego($codigo) {
        Conexion::abrirBBDD();
        self::$sentencia = "DELETE FROM videojuegos WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "i", $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro borrado con éxito' . '<br/>';
        } else {
            echo "Error al borrar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Edita la información de un juego usando su código para acceder a él en la bbdd.
     * @param type $codigo
     * @param type $titulo
     * @param type $anio
     * @param type $pais
     * @param type $productora
     * @param type $resumen
     * @param type $plataformas
     * @param type $genero
     */
    static function modificarJuego($codigo, $titulo, $anio, $pais, $productora, $resumen, $plataformas, $genero){
        Conexion::abrirBBDD();
        self::$sentencia = "UPDATE videojuegos SET titulo = ?, anio = ?, pais = ?, productora = ?, resumen = ?, plataformas = ?, genero = ? WHERE codigo = ?";
        $stmt = mysqli_prepare(self::$conex, self::$sentencia);
        mysqli_stmt_bind_param($stmt, "sisssssi", $titulo, $anio, $pais, $productora, $resumen, $plataformas, $genero, $codigo);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conex) . '<br/>';
        }
        Conexion::cerrarBBDD();
    }
    
    /**
     * Selecciona los juegos que contienen en su título la palabra o palabras que se le pasa en la variable $nombre.
     * @param type $nombre
     * @return \Videojuego
     */
    static function buscarJuegosNombre ($nombre) {
        Conexion::abrirBBDD();
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM videojuegos WHERE titulo LIKE ('%$nombre%')";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $videojuego = new Videojuego ();
                        $videojuego->setCodigo($fila[0]);
                        $videojuego->setTitulo($fila[1]);
                        $videojuego->setAnio($fila[2]);
                        $videojuego->setPais($fila[3]);
                        $videojuego->setProductora($fila[4]);
                        $videojuego->setResumen($fila[5]);
                        $videojuego->setPlataformas($fila[6]);
                        $videojuego->setGenero($fila[7]);
                        $videojuego->setEstado($fila[8]);
                        $videojuego->setImagen($fila[9]);
                        $lista [$i] = $videojuego;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
        Conexion::cerrarBBDD();
    }
    
    /**
     * Permite buscar videojuegos según ls plataformas para las que estuvieron disponibles.
     * @param type $plataforma
     * @return \Videojuego
     */
    static function buscarJuegosPlataforma ($plataforma) {
        Conexion::abrirBBDD();
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM videojuegos WHERE plataformas LIKE ('%$plataforma%')";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $videojuego = new Videojuego ();
                        $videojuego->setCodigo($fila[0]);
                        $videojuego->setTitulo($fila[1]);
                        $videojuego->setAnio($fila[2]);
                        $videojuego->setPais($fila[3]);
                        $videojuego->setProductora($fila[4]);
                        $videojuego->setResumen($fila[5]);
                        $videojuego->setPlataformas($fila[6]);
                        $videojuego->setGenero($fila[7]);
                        $videojuego->setEstado($fila[8]);
                        $videojuego->setImagen($fila[9]);
                        $lista [$i] = $videojuego;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
        Conexion::cerrarBBDD();
    }
    
    static function buscarJuegosGenero ($genero) {
        Conexion::abrirBBDD();
        $lista = array();
        $i = 0;
        try {
            self::$sentencia = "SELECT * FROM videojuegos WHERE genero LIKE ('%$genero%')";
            if (self::$resultado = mysqli_query(self::$conex, self::$sentencia)) {
                if (!empty(self::$resultado)) {
                    while ($fila = mysqli_fetch_array(self::$resultado)) {
                      $videojuego = new Videojuego ();
                        $videojuego->setCodigo($fila[0]);
                        $videojuego->setTitulo($fila[1]);
                        $videojuego->setAnio($fila[2]);
                        $videojuego->setPais($fila[3]);
                        $videojuego->setProductora($fila[4]);
                        $videojuego->setResumen($fila[5]);
                        $videojuego->setPlataformas($fila[6]);
                        $videojuego->setGenero($fila[7]);
                        $videojuego->setEstado($fila[8]);
                        $videojuego->setImagen($fila[9]);
                        $lista [$i] = $videojuego;
                        $i++;
                    }
                }
            }
        } catch (Exception $ex) {
            print "Error en el acceso a la BD.";
        }
        return $lista;
        Conexion::cerrarBBDD();
    }
}

