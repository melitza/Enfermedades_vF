<?php

    /*
      * Melitza Mondragón
      * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
    */

include'class/BD.php'; //Se incluye el BD.php
    $nuevo_obj=new BD(); // llama la clase BD
           
     if( isset( $_GET[ 'cadena' ] ) )//Aquí se recibe todo lo que contiene cadena
    {     
        $valores=$_GET['cadena'];
        echo  $nuevo_obj->consultar($valores);//Trae la función consultar de la clase BD.php
    }

     if( isset( $_GET[ 'busqueda' ] ) )//Aqui recibe todo lo que contiene busqueda
    {  
        if ($_GET['busqueda']!="") 
        {
           $valores=$_GET['busqueda'];
           echo  $nuevo_obj->buscar();//Trae la función buscar de la clase BD.php
        }
        
    }

?>
