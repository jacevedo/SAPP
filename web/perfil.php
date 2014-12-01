<?php
session_start();
$_SESSION['id'] = $_REQUEST['id'];

?>

<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="javascript/JQuery.js"></script>
		<script type="text/javascript" src="javascript/scriptPerfil.js"></script>
	</head>
	<body>
		<header>
			<h1 id="titulo">SAPP</h1>
		</header>
		<div id="cuerpo">
			<p id="textoBienvenida"> Bienvenido.</p>
			<table>
				<input type="hidden" id="idProfesor"/>
				<tr>
					<td colspan=2><button id="btnIngresar" value="Login">Login</button></td>
				</tr>
			</table>
		</div>
	</body>
</html>