<?php

/**
 * Description of Usuario
 *
 * @author daw203
 */
class Usuario {
    private $codigo;
    private $email;
    private $nombre;
    private $apellidos;
    private $clave;
    private $rol;
    private $estado;
    
    
    function __construct() {
        $this->codigo = null;
        $this->email = null;
        $this->nombre = null;
        $this->apellidos = null;
        $this->clave = null;
        $this->rol = null;
        $this->estado = null;
    }
    
    function getEmail() {
        return $this->email;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function getRol() {
        return $this->rol;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


    
//    public function __toString() {
//        return "Usuario: "."email= ".email.", nombre= ".nombre.", apellidos= ".apellidos;
//    }

}

