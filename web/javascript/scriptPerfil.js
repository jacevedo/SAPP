var direccionWeb = "http://localhost/SAPP/webservice/";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarCurso();
	$("#btnIngresar").click(login);
}

function cargarCurso()
{
	var precios = "http://localhost/SAPP/webservice/ws-precios-insumos.php";
	var data = {"send":"{\"indice\":3}"};
	var tabla = "";
	$.post(precios,data,function(datos){
		var obj = $.parseJSON(datos);
		$.each(obj.listaPrecios,function()
			{
				tabla = tabla+"<tr><td>"+this.idPrecios+"</td><td>"+this.comentario+"</td><td>"+this.valorTotal+"</td></tr>";
			});
		$("#cuerpoTabla").html(tabla);
		//var obj2 = jQuery.parseJSON(obj.listaPrecios[1]);
		//alert(obj.listaPrecios[0].valorNeto);
	});
}