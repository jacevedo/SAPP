var direccionWeb = "http://localhost/SAPP/webservice/";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarPerfil();
	cargarCursoSelect();
	cargarPlanificacion();
	$("#btnEditarPerfil").click(editarPerfil);
}
function cargarPerfil()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-profesor.php";

	var data = {"send":"{\"key\":\""+key+"\",\"indice\":5,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5,"idProfesor":2}

	var perfilProfe = "";

	$.post(precios,data,function(datos){
		var obj = $.parseJSON(datos);
		$.each(obj.resultado,function()
			{
				perfilProfe = perfilProfe+"<tr><td><h3><span>Profesor:</span></h3></td><td id='tdNombre'>"+this.nombre+" "+this.appPaterno+" "+this.appMaterno+"</h3></td></tr><tr><td><p><span>Correo:</span></p></td><td id='tdCorreo'>"+this.correo+"</td></tr><tr><td><p><span>Teléfono:</span></p></td><td id='tdTelefono'>"+this.telefono+"</td></tr><tr><td colspan='2'><h4><span>Biografía</span></h4></td></tr><tr><td colspan='2' ><p class='bios' id='tdBiografia'>"+this.biografia+"</p></td></tr>";
			});
		$("#tablaPerfil").html(perfilProfe);
		//alert(obj.resultado[0].nombre);
	});
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
		//$("#clase").html(sel);
		//var obj2 = jQuery.parseJSON(obj.ListadoCursos[1]);
		//alert(obj.ListadoCursos[0].nivel);
	});
}
function editarPerfil()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var urlConeccion = direccionWeb+"ws-profesor.php";
	if($(this).text()=="Editar Perfil")
	{
		var nombre = $("#tdNombre").html();
		var correo = $("#tdCorreo").html();
		var telefono = $("#tdTelefono").html();
		var biografia = $("#tdBiografia").html();

		$("#tdNombre").html("<input type='text' id='txtNombre'/>");
		$("#tdCorreo").html("<input type='text' id='txtCorreo'/>");
		$("#tdTelefono").html("<input type='text' id='txtTelefono'/>");
		$("#tdBiografia").html("<textArea id='txtBiografia' rows='4' cols='200'></textArea");

		$("#txtNombre").val(nombre);
		$("#txtCorreo").val(correo);
		$("#txtTelefono").val(telefono);
		$("#txtBiografia").val(biografia);

		$(this).text("Guardar");
	}
	else if($(this).text()=="Guardar")
	{
		var nombre = $("#txtNombre").val();
		var nombres = nombre.split(" ");
		var correo = $("#txtCorreo").val();
		var telefono = $("#txtTelefono").val();
		var biografia = $("#txtBiografia").val();
		$("#tdNombre").html(nombre);
		$("#tdCorreo").html(correo);
		$("#tdTelefono").html(telefono);
		$("#tdBiografia").html(biografia);


		//{"nombre":"Viviana","appPaterno":"Garrido","appMaterno":"Sanchez","correo":"viviana@forjadores.cl","biografia":"xdxd","telefono":27895530}
		var data = {"send":"{\"key\":\""+key+"\",\"indice\":2,\"idProfesor\":\""+id+"\",\"nombre\":\""+nombres[0]+"\",\"appPaterno\":\""+nombres[1]+"\",\"appMaterno\":\""+nombres[2]+"\",\"correo\":\""+correo+"\",\"biografia\":\""+biografia+"\",\"telefono\":\""+telefono+"\"}"};
		$.post(urlConeccion,data,function(datos)
		{
			var obj = $.parseJSON(datos);
			if(obj.resultado=="Profesor Modificado")
			{
				alert("Tus Datos Fueron Guardados Correctamente");
			}
			else
			{
				alert("hubo un error al guardar tus datos");
			}
		});

		$(this).text("Editar Perfil");
	}
}

function cargarPlanificacion()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-curso.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":6,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":6,"idProfesor":1}

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		var tabla = '';
		$.each(obj.ListadoCursos,function()
			{
				tabla = tabla+"<tr><td>"+this.materia+"</td><td>"+this.numero+"</td><td>"+this.nivel+"</td><td>"+this.letra+"</td><td>"+this.idCurso+"</td><td><a href='#' class='editar'><span data-icon='' aria-hidden='true'></span></a></td><td><a href='planificacion.php?idCurso="+this.idCurso+"' id='verPlanificacion'>Ver planificación</a></td></tr>";
			});
		$("#alumnoCuerpo").html(tabla);
	});
	$("#alumnoCuerpo").on("click",".editar",editarPlan);
}

function editarPlan()
{
	location.href="cursos.php";
}