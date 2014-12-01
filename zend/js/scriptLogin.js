var direccionWeb = "http://localhost/SAPP/webservice/";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	$("#btnIngresar").click(login);
}

function login()
{
	var usuario = $("#txtUsuario").val();
	var contrasena = $("#txtPass").val();

	var ingresar = direccionWeb+"ws-login.php";
	var data = {"send":"{\"indice\":1,\"usuario\":\""+usuario+"\",\"pass\":\""+contrasena+"\"}"};

	$.post(ingresar, data, function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		var idProfesor = obj.idProfesor;
		var key = obj.key;

		if(idProfesor != -1 && datos!="Error al hacer la consulta")
		{
			//window.name = idProfesor; 
			var url = 'login.php?id='+idProfesor+'&key='+key;
    		window.location = url;
		}
		else
		{
			alert("Usuario y/o Contrase&ntilde;a erroneo.");
		}
	});
}