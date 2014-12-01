<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css">
        <link rel="stylesheet" href="css/main.css">
		<link href='http://fonts.googleapis.com/css?family=Arimo|Titillium+Web' rel='stylesheet' type='text/css'>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
		<?php include 'inc/header.php'; ?>
		
        <div id="content" class="clearfix">
			<aside id="sidebar">
				<?php include 'inc/menu.php'; ?>
			</aside>
			<div id="main">
				<div id="premenu">
					<h3>
						<span data-icon="" aria-hidden="true"></span>
						Editar Pruebas
					</h3>
				</div>
				<div id="contenidoTable">
				
					<form id="editar_prueba">
						<div id="ingresaPreg">
							
						</div>
						<div id="sidebarPruebas">
							<div class="inputcover">
								<label><span class="sub">Prueba</span><span class="text">Ciencias Naturales</span></label>
								<label><span class="sub">Fecha</span><span class="text">22/02/2014</span></label>
								<label><span class="sub">Porcentaje</span><span class="text">73%</span></label>
								<label>
									<label><span class="sub">Unidad Asociada</span>
									<select id="unidad" class="text">
										<option>Geometria 1</option>
									</select>
								</label>
								<label><span class="sub">Fecha Programada</span><input type="text" required  name="fecha_prog" id="fecha_prog" class="datepicker text" value="22/03/2013" /></label>
								
							</div>
							<div class="inputcover butnsGraba">
								<input type="submit" id="AgregaPregunta" value="Agregar Pregunta" class="submit">
								<input type="submit" value="Grabar Prueba" class="submit">
							</div>
							
							
							
						</div>
					</form>	
					
				</div>
			</div>
        </div>
		<!--[if lte IE 7]><script src="css/icomoon/lte-ie7.js"></script><![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="js/libs/jquery.Rut.js"></script>
		<script src="js/libs/jquery.validate.js"></script>
		<script src="js/libs/jquery-ui-1.10.3.custom.js"></script>
        <script src="js/main.js"></script>
		<script src="js/pruebas.js"></script>
    </body>
</html>
