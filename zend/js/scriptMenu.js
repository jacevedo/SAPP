var direccionWeb = "http://localhost/SAPP/webservice/";
var idC = "";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarDatos();
	//$("#clase").change(cambiarPruebas);
	//$("#agregarNuevoAlumno").click(elegirBoton);
}

function cargarDatos()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-profesor.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":5,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5,"idProfesor":2}

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		$.each(obj.resultado,function()
		{
			$("#PerfilInicio").append("<h4>Bienvenido "+this.nombre+" "+this.appPaterno+"</h4>");
		});
		cargarNumeroCursos();
	});
}

function cargarNumeroCursos()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-curso.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":6,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":6,"idProfesor":1}

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		$("#PerfilInicio").append("<p>&bull; Usted tiene "+obj.ListadoCursos.length+" cursos agregados</p>");
		cargarPruebasSinCorregir();
	});
}

function cargarPruebasSinCorregir()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-pruebas.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":5,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5,"idProfesor":1}

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		$("#PerfilInicio").append("<p>&bull; Tienes "+obj.ListadoPruebaProfe.length+" pruebas sin corregir</p><a href='#' class='closeSesion'>Cerrar sesión X</a>");
	});
	$("#PerfilInicio").on("click",".closeSesion",cerrarSesion);
}

function cerrarSesion()
{
	window.location.href = "logout.php";
}
