<?php
    /*
    	* Melitza Mondragón 
    */
    //Este código borra los archivos de la instalación y redirige al sitio.
    include( "class/Inspector.php" );//se incluye la clase Inspector 
    $objeto_Inspector = new Inspector();//se nombra una variable.

    $objeto_Inspector->borrar( "instalador.php" );//Con  esta linea de código se elimina el archivo instalador.php.
    $objeto_Inspector->borrar( "instalando.php" );//Con  esta linea de código se elimina el archivo instalando.php.
    header( "location: index.php" );//Cuando esten eleiminados los archivos nos direccionara al index.php.
?>
