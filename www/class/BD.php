<?php
	/*
		* Melitza Mondragón
	*/


	//Aquí se encuentran todas la funciones  
	include('Graficos.php');//Aquí se incluye el archivo Graficos.php

	class BD extends Graficos
	{
		public $conexion; //variable publica

		function BD ()
		{//Esta funcion es el constructor.
			$this->conexion=$this->crear_conexion();
		}
		
		
		
		 function crear_conexion ()
		 {//Aquí se crea la conexion con el servidor.
		 	include('config.php');
		 	return mysqli_connect($servidor,$usuario,$clave,$bd);
		 }
		 

		function traer_lista( $nombre_lista, $tabla, $campo_llave_primaria, $campo_a_mostrar ) 
		{//Esta función sirve para mostrar el formulario el cual contiene un select que trae los datos de una tabla
			include( "config.php" );//Aquí se hace conexión con la bd 
			$salida = "";

			//Se seleccionan todos los campos de una tabla
			$sql = "SELECT * FROM  $tabla "; 
			if( $sn_diagnostico == "s" ) echo "<div class='contenedor-sql-pruebas'>".$sql."</div>";
			

			$conexion = mysqli_connect( $servidor, $usuario, $clave, $bd );
			$resultado = $conexion->query( $sql );
					           
			$salida.="<label for='exampleInputEmail1'><h2>SINTOMAS:</h2>  </label><br>";//Titulo
			$salida.="<select ng-model='id_sintomas' ng-change='cargar_datos_php()' id='datos' multiple size='8' class='form-control' name='$nombre_lista' >";//Sintomas
			$contador=0;
					
			while ($fila = mysqli_fetch_assoc($resultado)) 
				
			{ 
				$contador ++;
				
	    		if ($fila != '..' && $fila !='.' && $fila !='')
	    		{
		         	$salida.= "<option value='$fila[$campo_llave_primaria]' >" . $contador . " - ". $fila[$campo_a_mostrar]."</option>"; //Los datos que contiene la tabla se muestran en un select.

	        	}
	      
			}
			$salida.="</select>";//cierra la etiqueta 
				
			return $salida;//retorna toda la variable $salida 
		}

		function buscar()
		{//Funcion que nos permite realizar una busqueda del manual técnico del software.

	        include( "config.php" );//Aquí hacemos conexion con la bd.
	        
	        /*Esta conexión es para la prueba con el angularjs*/
	        header("Access-Control-Allow-Origin: *");
	        header("Content-Type: application/json; charset=UTF-8");
	        
	        $conn = new mysqli( $servidor, $usuario, $clave, $bd );
	        
	        //Se busca principalmente por alias.
	        
	        $consulta = explode(",", utf8_decode($_GET['busqueda']));
	        
			$sql  = " SELECT * FROM tb_manuales  WHERE ";
		    for ($i=0; $i < count($consulta); $i ++) { 
		        	
	        	$sql .= " titulo LIKE '%".$consulta[$i]."%'";
	        	$sql .= " OR definicion LIKE '%".$consulta[$i]."%'";
	        	$sql .= " OR claves LIKE '%".$consulta[$i]."%'";
	        	if ($i < (count($consulta)-1)) $sql.=" or ";
	        	
	        }

	        //La tabla que se cree debe tener la tabla aquí requerida, los campos abajo.
	        $result = $conn->query( $sql );
	        
	        $outp = "";
	        
	        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
	        {
	            //Mucho cuidado, hay una gran probabilidad de fallo con cualquier elemento que falte en esta sintaxis.
	            if ($outp != "") {$outp .= ",";}
	            
	            $outp .= '{"Titulo":"'.utf8_decode($rs["titulo"]).'",';  //Este campo debe estar en la tabla de MySQL.
	            $outp .= '"Descripcion":"'.utf8_decode($rs["definicion"]).'",';//Este campo debe estar en la tabla de MySQL.
	            $outp .= '"imagen":"'.$rs["url"].'"}';//Este campo debe estar en la tabla de MySQL.
	        }
	        
	        $outp ='{"records":['.$outp.']}';
	        $conn->close();
	        
	        echo($outp);

		    
		     
		}
		
		Function consultar($valores)
		{//Esta funcion se encarga realizar la consulta en una tabla.
			include( "config.php" );
    	
	        /*Esta conexión se realiza para la prueba con angularjs*/
	        header("Access-Control-Allow-Origin: *");
	        header("Content-Type: application/json; charset=UTF-8");
	        
	        $conn = new mysqli( $servidor, $usuario, $clave, $bd );
	    
	        //Se busca principalmente por alias.

	     	$sql = "SELECT tb_enfermedades.enfermedad , COUNT(tb_resultados.id_enfermedades) as sintomas , (SELECT COUNT(tb_resultados.id_enfermedades) total FROM tb_resultados where tb_enfermedades.id_enfermedades = tb_resultados.id_enfermedades GROUP BY id_enfermedades) as total FROM tb_resultados , tb_enfermedades WHERE tb_resultados.id_enfermedades = tb_enfermedades.id_enfermedades AND tb_resultados.id_signos in($valores) GROUP BY tb_resultados.id_enfermedades";
	        //LA tabla que se cree debe tener aquí requerida, y abajo los campos pedidos.
	       
	        $result = $this->conexion->query( $sql );	
	        
	        $outp = "";
	       
	        
	        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
	        {
	            //Mucho cuidado, hay una gran probabilidad de fallo con cualquier elemento que falte en esta sintaxis.
	            if ($outp != "") {$outp .= ",";}

	            $outp .= '{"Enfermedad":"'.$rs["enfermedad"].'",';//Este campo debe estar en la tabla de MySQL.
	            //$outp .= '"a":"'.$sql.'",';//ver el sql.
	            $outp .= '"sintomas":"'.$rs["sintomas"].'",';//Este campo debe estar en la tabla de MySQL.
	            $outp .= '"total":"'.$rs["total"].'"}';//Este campo debe estar en la tabla de MySQL.
	        }
	        
	        $outp ='{"records":['.$outp.']}';
	       	$conn->close();
	        
	        return $outp;	
		}

		
				
	}	


 ?>
