<?php 
	/*
		*Melitza Mondragón	 
	*/

	
	//Esta clase tiene todas la funciones  
	include ('class/Inspector.php');//se incluye la clase inspector.

	class Graficos extends Inspector

	{
			
			//Función formulario de busqueda. 
			
			function ayudar()
			{
				$salida="";
				$salida="<a href='ayuda.php'><img src='imagenes/hello.png' align='right'></a>";//imagen de ayuda
				return $salida;
			}

			/**********************************************************************************************/

			
				//Aquí esta ubicado el encabezado (img) de la página. 
			
			function encabezados()
			{
				$salida="";
				$salida="<img class='img img-responsive' src='imagenes/Imagen2.png'>";//imagen del encabezado
				return $salida;
			}

			/***********************************************************************************************/

			
				//Con esta función podremos dirijirnos al index.php nuevamente. 
			
			function home()
			{
				$salida="";
				$salida="<a href='index.php'><img src='imagenes/retroceso.png' align='right' class='img img-responsive'></a>";//imagen de volver al inicio
				return $salida;
			}

			/***********************************************************************************************/

			
			 //Aquí esta ubicado el link de la libreria de bootstrap. 
			
			function estilo($carpeta=null)
			{
				$salida="";
				$salida=" <link rel='stylesheet'  href='css/bootstrap.min.css'>";
						 
				return $salida;		 
			}

	}
?>
