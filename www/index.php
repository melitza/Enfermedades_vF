<!-- 
	* Melitza Mondragón 
--> 
<html ng-app="acumuladorApp"><!--Aquí inicia el ng-app-->
	<head>
		<title>Dign&oacute;stico_clinico</title>

		<?php
			include ('class/BD.php');//Aquí se incluye la clase BD	
			$obj_o= new BD;//Se nombra la variable
			echo $obj_o->estilo("bootstrap");//Trae la función estilos de bootstrap
			echo $obj_o->Verificado();
			?>
		<link rel="stylesheet" type="text/css" href="css">
		<script src="js/angular.min.js"></script><!--En esta linea realizamos la conexion con el angular sin esto no nos funciona. -->
		
	</head>
	<body style="background-color: #B5FAE3"><!--Aquí se le esta dando color a la pagina por medio del background-color-->
		<div ng-controller="acumuladorAppCtrl"><!--Importante el controlador aquí-->
				<div class='container' >
					  	<div class='row'></div><br>
				  		<div class='row'>
				  			<!--Encabezado de la página-->
				  			<center>
				  			 <?php  
				  			 	echo $obj_o->encabezados(); 
				  			 ?>
				  			</center>
				  		</div><br>
		
						<div class='row'>
								<?php  echo $obj_o->ayudar(); ?><!--Botón de ayuda-->
							<div class='col-xs-12 col-md-3 '>  
								<?php
						            echo $obj_o->traer_lista( "sintomas[] ", "tb_signos_y_sintomas","id_signos", "signos_y_sintomas");//Aquí estamos trayendo la información de una tabla de determinados campos en un select.
						        ?>
				            </div>

							<div class='col-xs-12 col-md-6 '><br>				            
					            <type="" class="btn btn-info ">
					            	<button type="" class="btn btn-primary disabled"><label><h2>Diagn&oacute;sticos:</h2></label></button><br>	

					            <div>
						              <div class='table-responsive'>
						                <table class='table table-hover' border='1px'>
						                    <tr tr class='muted'> 
						                        <th>Enfermedad:</th>
						                        <th>Sintomas Encontrados:</th>
						                        <th>Total sintomas</th>
						                    </tr> 
						                 
						                    <tr ng-repeat="x in campos">
						                        <td>{{ x.Enfermedad }}</td><!--Aquí muestra en pantalla la enfermedad--> 
						                        <td>{{ x.sintomas }}</td><!--Muestra en pantalla  de los síntomas-->    
						                        <td>{{ x.total }}</td><!--Muestra en pantalla el conteo total de los síntomas-->  
						                    </tr>   
						                </table> 
						              </div>
					            </div> 
					        </type>
						    </div>
						        
					        <script src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->
								
						</div>
							
				</div>
		</div>

			
 			<div id="footer"><center> Melitza Mondrag&oacute;n ------ An&aacute;lisis y desarrollo de sistemas de informaci&oacute;n CDATT ------ 1132133</div><!--Pie de pagina-->


	</body>
</html>


