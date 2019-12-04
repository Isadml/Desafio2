<?php

/**
 * Description of Videojuego
 *
 * @author daw203
 */
class Videojuego {
    private $codigo;
    private $titulo;
    private $anio;
    private $pais;
    private $productora;
    private $resumen;
    private $plataformas;
    private $genero;
    private $estado;
    private $imagen;
    
    function __construct() {
        $this->codigo = null;
        $this->titulo = null;
        $this->anio = null;
        $this->pais = null;
        $this->productora = null;
        $this->resumen = null;
        $this->plataformas = null;
        $this->genero = null;
        $this->estado = null;
        $this->imagen = null;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAnio() {
        return $this->anio;
    }

    function getPais() {
        return $this->pais;
    }

    function getProductora() {
        return $this->productora;
    }

    function getResumen() {
        return $this->resumen;
    }

    function getPlataformas() {
        return $this->plataformas;
    }

    function getGenero() {
        return $this->genero;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setProductora($productora) {
        $this->productora = $productora;
    }

    function setResumen($resumen) {
        $this->resumen = $resumen;
    }

    function setPlataformas($plataformas) {
        $this->plataformas = $plataformas;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



}
