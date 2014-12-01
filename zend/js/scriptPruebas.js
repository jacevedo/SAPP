var direccionWeb = "http://localhost/SAPP/webservice/";
var idC = "";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarCursoSelect();
	$("#clase").change(cambiarPruebas);
	//$("#agregarNuevoAlumno").click(elegirBoton);
}
function cargarCursoSelect()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-curso.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":6,\"idProfesor\":\""+id+"\"}"};

	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":6,"idProfesor":1}
	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		var option = document.getElementById("clase");
		option.options.add(new Option("Seleccione un curso", 0));
		$.each(obj.ListadoCursos,function()
		{
			//sel = sel + "<option value="+this.idCurso+">"+this.nivel+"-"+this.numero+"-"+this.letra+"</option>"
			option.options.add(new Option(this.materia+" "+this.numero+" "+this.nivel+" "+this.letra, this.idCurso));
		});
	});
}

function cambiarPruebas()
{
	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;

	var precios = "http://localhost/SAPP/webservice/ws-pruebas.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":4,\"idCurso\":\""+curso+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idCurso":1}

	var tabla = '';

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		$.each(obj.ListadoPrueba,function()
		{
			tabla = tabla+"<tr><td>"+this.nombrePrueba+"</td><td>"+this.fecha+"</td><td>"+this.porcentajePrueba+"%</td><th>No</th><td><a href='#' class='editar'><span data-icon='' aria-hidden='true'></span></a></td><td><a href='#' class='borrar'><span data-icon='' aria-hidden='true'></span></a></td></tr>";
		});
		$("#cursoCuerpo").html(tabla);
	});
	//$("#cursoCuerpo").on("click",".editar",modificarAlumno);
	//$("#cursoCuerpo").on("click",".borrar",eliminarAlumno);
}