<?php
session_start();
if(!isset($_SESSION['key']))
{
	header("location: index.php");
}
$id = $_SESSION['id'];
$key = $_SESSION['key'];
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

		<script type="text/javascript" src="js/JQuery.js"></script>
        <script type="text/javascript" src="js/scriptPruebas.js"></script>
        <script type="text/javascript" src="js/scriptMenu.js"></script>

		<script src="js/libs/jquery.Rut.js"></script>
		<script src="js/libs/jquery.validate.js"></script>
        <script src="js/main.js"></script>
		<script src="js/validacion.js"></script>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
    	<input type="hidden" value= "<?php echo($id);?>"  id="idProfe">
		<input type="hidden" value="<?php echo($key);?>" id="keyProfe">
		<?php include 'inc/header.php'; ?>
		
        <div id="content" class="clearfix">
			<aside id="sidebar">
				<?php include 'inc/menu.php'; ?>
			</aside>
			<div id="main">
				<div id="premenu">

					<h3>
						<span data-icon="" aria-hidden="true"></span>
						Pruebas
					</h3>
					<nav id="minimenu">
						<ul>
							<li>
								<a href="#" id="agrega"><span data-icon="" aria-hidden="true"></span>Nueva Prueba</a>
							</li>
						</ul>
					</nav>
				</div>
				<div id="contenidoTable">
					
						<form id="editor_pruebas" class="nuevoElemento" action="#">
						<h4>Agrega un nueva prueba</h4>
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<th><label>Prueba</label></th>
									<th><label>Fecha</label></th>
									<th><label>Porcentaje</label></th>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td><div class="inputcover">
										<input type="text" required  name="prueba" id="prueba" /></div></td>
									<td><div class="inputcover">
										<input type="text" required  name="fecha" id="fecha" /></div></td>
									<td><div class="inputcover">
										<input type="text" required  name="porcentaje" id="porcentaje" /></div></td>
									<td></td>
									<td><div class="inputcover">
											<input type="submit" value="Editar Cabecera" class="submit"></div></td>
								</tr>
							</table>
						</form>
						<table id="cursos" border="0" cellspacing="5" cellpadding="5" class="normaltable">
							<thead>
							<tr>
								<th>Prueba</th>
								<th>Fecha</th>
								<th>Porcentaje requerido</th>
								<th>Corregida</th>
								<th></th>
								<th></th>
							</tr>
							<thead>
							<tbody id="cursoCuerpo">
							<!--<tr>
								<td>Ciencias Sociales</td>
								<td>23/11/2013</td>
								<td>20%</td>
								<th>No</th>
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
