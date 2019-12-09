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
        include_once '../../Modelo/Videojuego.php';
        session_start();
        $juegos = $_SESSION ['juegos'];
        for ($i = 0; $i < count($juegos); $i++) {
            $juego = $juegos [$i];
            ?>
            <a> <?php echo $juego->getTitulo(); ?></a></br> 
        <?php }
        ?>
    </body>
</html>
