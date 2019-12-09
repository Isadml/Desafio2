<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../../miJavaScript.js"></script>
        <title>Resultados de la búsqueda</title>
    </head>
    <body>
        <?php
        include_once '../../Modelo/Videojuego.php';
        session_start();
        $juegos = $_SESSION ['juegos'];
        for ($i = 0; $i < count($juegos); $i++) {
            $juego = $juegos [$i];
            ?>
            <a> <?php echo $juego->getTitulo(); ?></a></br> 
        <?php }
        ?>
        <div class="form-group">
            <label for="volver"></label>
            <input type="submit" id="volver" name="volver" class="form-control cyan principal" value="Volver" onclick="pag_Anterior()">
        </div>
    </body>
</html>
