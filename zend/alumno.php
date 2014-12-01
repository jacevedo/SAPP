<?php
session_start();
if(!isset($_SESSION['key']))
{
	header("location: index.php");
}

//$_SESSION['id'] = $_REQUEST['id'];
//$_SESSION['key'] = $_REQUEST['key'];

?>
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
        <link rel="stylesheet" href="css/main.css">
		<link href='http://fonts.googleapis.com/css?family=Arimo|Titillium+Web' rel='stylesheet' type='text/css'>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <script type="text/javascript" src="js/JQuery.js"></script>
        <script type="text/javascript" src="js/scriptAlumno.js"></script>
        <script type="text/javascript" src="js/scriptMenu.js"></script>

		<script src="js/libs/jquery.Rut.js"></script>
		<script src="js/libs/jquery.validate.js"></script>
        <script src="js/main.js"></script>
		<script src="js/validacion.js"></script>
    </head>
    <body>
    	<input type="hidden" value="<?php echo($_SESSION['id']);?>" id="idProfe">
		<input type="hidden" value="<?php echo($_SESSION['key']);?>" id="keyProfe">
		<?php include 'inc/header.php'; ?>
		
        <div id="content" class="clearfix">
			<aside id="sidebar">
				<?php include 'inc/menu.php'; ?>
			</aside>
			<div id="main">
				<div id="premenu">

					<h3>
						<span data-icon="" aria-hidden="true"></span>
						Alumnos
					</h3>
					<nav id="minimenu">
						<ul>
							<li>
								<a href="#" id="agrega"><span data-icon="" aria-hidden="true"></span>Agregar Alumno</a>
							</li>
						</ul>
					</nav>
					
					
				</div>
				<div id="contenidoTable">
					<form id="editor_alumno" class="nuevoElemento" action="#">
						<h4>Crea un nuevo Alumno</h4>
						<a href="#" id="cerrar">Cerrar X</a>
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<th><label>Apellido Paterno</label></th>
									<th><label>Apellido Materno</label></th>
									<th><label>Nombre</label></th>
									<th><label>Rut</label></th>
									<th><label>Teléfono</label></th>
									<th><label>Correo</label></th>
									<th><label></label></th>
								</tr>
								<tr>
									<input type="hidden" name="id_alumno" id="id_alumno" /></div>
									<td><div class="inputcover">
										<input type="text" required  name="apellido_paterno" id="apellido_paterno" /></div></td>
									<td><div class="inputcover">
										<input type="text" required  name="apellido_materno" id="apellido_materno" /></div></td>
									<td><div class="inputcover">
										<input type="text" required  name="nombre" id="nombre" /></div></td>
									<td><div class="inputcover">
										<input type="number" required  name="rut" id="rut" class="rut" /></div></td>
									<td><div class="inputcover">
										<input type="number" required rangelenght="[2,8]" name="telefono" id="telefono" /></div></td>
									<td><div class="inputcover">
										<input type="email" required  name="correo" id="correo" /></div></td>
									<td>
										<div class="inputcover">
											<input type="submit" value="Agregar" class="submit" id="agregarNuevoAlumno"></div></td>
								</tr>
							</table>
					</form>
					
					<table id="alumno" border="0" cellspacing="5" cellpadding="5" class="normaltable">
						<thead>
						<tr>
							<th>nº</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Nombre</th>
							<th>Rut</th>
							<th>Teléfono</th>
							<th>Correo</th>
							<th></th>
							<th></th>
						</tr>
						<thead>
						<tbody id="alumnoCuerpo">
						<!--<tr>
								<td>01</td>
								<td>Berwart</td>
								<td>Varela</td>
								<td>Juan Pablo</td>
								<td>14468921-6</td>
								<td>(+56 9)99494000</td>
								<td>jpberwart@gmail.com</td>
								<td><a href="#" class="editar"><span data-icon="" aria-hidden="true"></span></a></td>
								<td><a href="#" class="borrar"><span data-icon="" aria-hidden="true"></span></a></td>
							</tr>-->
						</tbody>
					</table>
				</div>
			</div>
        </div>
		<!--[if lte IE 7]><script src="css/icomoon/lte-ie7.js"></script><![endif]-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->
    </body>
</html>
