<?php
session_start();
if(!isset($_SESSION['key']))
{
	header("location: index.php");
}
$id = $_SESSION['id'];
$key = $_SESSION['key'];
$idCurso = $_GET['idCurso'];
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
		<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/animate.css">
		<link href='http://fonts.googleapis.com/css?family=Arimo|Titillium+Web' rel='stylesheet' type='text/css'>
<script src="js/JQuery.js"></script>
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
    	<input type="hidden" value= "<?php echo($id);?>"  id="idProfe">
		<input type="hidden" value="<?php echo($key);?>" id="keyProfe">
		<input type="hidden" value="<?php echo($idCurso);?>" id="idCurso">
		<?php include 'inc/header.php'; ?>
		
        <div id="content">
			<aside id="sidebar">
				<?php include 'inc/menu.php'; ?>
			</aside>
			<div id="main">
				<div id="premenu">

					<h3>
						<span data-icon="" aria-hidden="true"></span>
						Planificación
					</h3>
					
				</div>
				<div id="contenidoTable">
						<h4>Ciencias Sociales 1 Básico A - Colegio Forjadores</h4>
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<td><label class="tituloUnidad">Crear Unidades</label></td>
									<td><div class="inputcover">
										<input type="number" required  name="unidades" id="unidades" min="0"/>
										</div></td>
									<td><a href="#" class="crear"><span data-icon="" aria-hidden="true"></span></a></td>
								</tr>
							</table>
							<div id="result">
								
							</div>
				</div>
			</div>
        </div>
		<div id="pdfViewer">
			<a href="#" id="openPdf"><span data-icon="" aria-hidden="true"></span></a>
			<div id="containPdf">
				<div id="Selector">
					<label>Selecciona Curriculum</label>
						<select>
							<option val="pdf/1-6basico.pdf">Primero a sexto basico</option>
						</select>
				</div>
				<!--<a href="pdf/1-6basico.pdf" class="media">Ver PDF</a>-->
				<div id="pdf">
					<p>It appears you don't have Adobe Reader or PDF support in this web browser. <a href="pdf/1-6basico.pdf">Click here to download the PDF</a></p>
				</div>
			</div>
			
		</div>
		<!--[if lte IE 7]><script src="css/icomoon/lte-ie7.js"></script><![endif]-->
       <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->
		<script src="js/scriptPlanificacion.js"></script>
		<script type="text/javascript" src="js/scriptMenu.js"></script>
		<script src="js/libs/jquery.Rut.js"></script>
		<script src="js/libs/jquery.validate.js"></script>
		<script src="js/libs/jquery-ui-1.10.3.custom.js"></script>
		<script src="js/libs/pdfobject.js"></script>
        <script src="js/main.js"></script>
		<script src="js/planificacion.js"></script>
    </body>
</html>
