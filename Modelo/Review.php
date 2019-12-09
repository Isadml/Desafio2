<?php

/**
 * Description of Review
 *
 * @author daw203
 */
class Review {
    private $codigo;
    private $usuario;
    private $descripcion;
    private $titulo;
    private $estado;
    
    function __construct() {
        $this->codigo = null;
        $this->usuario = null;
        $this->descripcion = null;
        $this->$titulo = null;
        $this->estado = null;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
