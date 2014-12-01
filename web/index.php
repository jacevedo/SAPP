<?php
?>

<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="javascript/JQuery.js"></script>
		<script type="text/javascript" src="javascript/scriptLogin.js"></script>
	</head>
	<body>
		<header>
			<h1 id="titulo">SAPP</h1>
		</header>
		<div id="cuerpo">
			<p id="textoBienvenida"> Bienvenido.</p>
			<table>
				<tr>
					<td>Usuario</td>
					<td><input type="text" id="txtUsuario"/></td>
				</tr>
				<tr>
					<td>Contrase&ntilde;a</td>
					<td><input type="password" id="txtPass"/></td>
				</tr>
				<tr>
					<td colspan=2><button id="btnIngresar" value="Login">Login</button></td>
				</tr>
			</table>
		</div>
	</body>
</html>