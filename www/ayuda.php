<!--
	* Melitza Mondragón 
-->
<html ng-app="acumuladorApp"><!--Hay que observar que aquí se inicia el ng-app-->
	<head>
			<title>Ayuda</title>
				<?php
					include ('class/BD.php');//Incluye la clase BD.php
					$obj_o= new BD;//Se crea nuevo objeto
					echo $obj_o->estilo("bootstrap"); //Se trae el bootstrap de la clase
				?>

			<script src="js/angular.min.js"></script><!--se trae el angular.min.js-->
		    <script src="js/nuevo.js"></script><!--Se llama la funcion nuevo.js-->

	</head>
	<body>
			<div ng-controller="acumuladorAppCtrl"><!--Super importante el controlador aquí-->
				<div class='container'><br>				  	
					  	<div class='row'> 	
						  	<center>
						  		<?php  echo $obj_o->encabezados(); ?> <!--Esto contiene el cabezado de la página-->
						  	</center>
						</div><br>
					  		<div class='row'>
					  		   <?php echo $obj_o->home(); ?><!--Botón de volver al inicio-->
							  		<div class='col-xs-12 col-md-4 '>
								  		<label><button type="button" class="btn btn-info disabled"><h5>Buscar</h5></button></label>
										 <input type="text" class="form-control" ng-model="text_busqueda" ng-change="buscar();" placeholder="escriba lo que quiere buscar."><!--Caja de texto buscar--><br><br>
									</div>
							</div>
					<hr>

					<div ng-repeat="x in campos"><!--Esto es esencial para que muestre en pantalla los datos que se encuentrán en la bd-->
						<div class='row'>
							<div class='col-xs-12 col-md-4 '>
			                    <strong><li>{{ x.Titulo }}</li></strong><!--trae en pantalla el titulo de una consulta-->
			                                {{ x.Descripcion }} <!--trae en pantalla la descripción de una consulta-->
							</div>
								  
							<div class='col-xs-12 col-md-8 '>
							   	<img class="img-responsive" src="{{ x.imagen }}"><!--trae en pantalla la imagen de la busqueda-->
						    </div>

				    	</div><br><hr>
					</div>

			    
			
				</div>
			</div>
			
		</body>
</html>

