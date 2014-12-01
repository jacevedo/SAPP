<?php
session_start();
if(!isset($_SESSION['key']))
{
	header("location: index.php");
}

$id = $_SESSION['id'];
$key = $_SESSION['key'];

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
        <script type="text/javascript" src="js/scriptPerfil.js"></script>
        <script type="text/javascript" src="js/scriptMenu.js"></script>

		<script src="js/libs/jquery.Rut.js"></script>
		<script src="js/libs/jquery.validate.js"></script>
        <script src="js/main.js"></script>
        
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
						<span data-icon="" aria-hidden="true"></span>
						Mi Perfil
					</h3>
					<nav id="minimenu">
						<ul>
							<li>
								<a  id="btnEditarPerfil"><span data-icon="" aria-hidden="true"></span>Editar Perfil</a>
							</li>
						</ul>
					</nav>
					
					
				</div>
				<div id="contenidoTable">
					<div id="Perfil" class="midCol">
						<table id="tablaPerfil">

						</table>
						
					</div>
					<div class="midCol">
						<h3>Planificación</h3>
						<table id="alumno" border="0" cellspacing="5" cellpadding="5" class="normaltable">
							<thead>
							<tr>
								<th>Materia</th>
								<th>Curso</th>
								<th>Nivel </th>
								<th>Letra</th>
								<th>Institución</th>
								<th></th>
								<th></th>
							</tr>
							<thead>
							<tbody id="alumnoCuerpo">
							<!--<tr>
								<td>Ciencias Sociales</td>
								<td>1</td>
								<td>Media</td>
								<td>A</td>
								<td>Colegio Forjadores</td>
								<td><a href="#" class="editar"><span data-icon="" aria-hidden="true"></span></a></td>
								<td><a href="#" id="verPlanificacion">Ver planificación</a></td>
							</tr>-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
		<!--[if lte IE 7]><script src="css/icomoon/lte-ie7.js"></script><![endif]-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->
    </body>
</html>
