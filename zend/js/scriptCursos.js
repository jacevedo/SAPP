var direccionWeb = "http://localhost/SAPP/webservice/";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarCursos();
	cargarCursoSelect();
	cargarInstitucion();
	$(".verPlanificacion").click(verPlanificacionCurso);
	$("#agregarCurso").click(elegirBoton);
}
function verPlanificacionCurso()
{

	$(this).parent().parent().children().each(function(i)
	{
		if(i==0)
		{
			location.href="planificacion.php?idCurso="+$(this).html();
		}
		
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

function cargarInstitucion()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-institucion.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":4,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idProfesor":1}

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		//var option = document.getElementById("institucion");
		//option.options.add(new Option("Seleccione una Institucion", 0));
		$("#institucion").prepend("<option value='0'>Seleccione una Institucion</option>");
		$.each(obj.listaInstituciones,function()
		{
			$("#institucion").prepend("<option value="+this.idInstitucion+">"+this.nombre+"</option>");
			//option.options.add(new Option(this.nombre, this.idInstitucion));
		});
	});
}

function cargarCursos()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-curso.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":6,\"idProfesor\":\""+id+"\"}"};

	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":6,"idProfesor":1}
	$.post(precios,data,function(datos){
		var obj = $.parseJSON(datos);
		var tabla = '';
		$.each(obj.ListadoCursos,function()
		{
			tabla = tabla + "<tr><td style='display:none;'>"+this.idCurso+"</td><td>"+this.materia+"</td><td>"+this.numero+"</td><td>"+this.letra+"</td><td>"+this.nivel+"</td><td>"+this.nomInstitucion+"</td><td><a href='#' class='editar'><span data-icon='' aria-hidden='true'></span></a></td><td><a href='#'class='borrar'><span data-icon='' aria-hidden='true'></span></a></td><td id='tdVerPlanificacion'><a href='#' class='verPlanificacion'>Ver Planificacion</a></td></tr>";
			//$("#cursoCuerpo").prepend("<tr><td>"+this.materia+"</td><td>"+this.numero+"</td><td>"+this.letra+"</td><td>"+this.nivel+"</td><td>"+this.nomInstitucion+"</td><td><a href='#' class='editar'><span data-icon='' aria-hidden='true'></span></a></td><td><a href='#'class='borrar'><span data-icon='' aria-hidden='true'></span></a></td><td id='tdVerPlanificacion'><a href='#' class='verPlanificacion'>Ver Planificacion</a></td></tr>");
		});
		$("#cursoCuerpo").html(tabla);
	});
	$("#cursoCuerpo").on("click",".verPlanificacion",verPlanificacionCurso);
	$("#cursoCuerpo").on("click",".editar",editarCurso);
	$("#cursoCuerpo").on("click",".borrar",borrarCurso);
}

function elegirBoton()
{
	if($(this).val() == "Agregar")
	{
		agregarCurso();
	}
	else
	{
		actualizarCurso();
	}
}

function agregarCurso()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var numero = $("#numeroCurso").val();
	var materia = $("#materia").val();
	var nivel = $("#nivel").val();
	var letra = $("#letra").val();
	var institucion = $("#institucion").val();

	//alert("Numero: "+numero+". Materia: "+materia+". Nivel: "+nivel+". Letra: "+letra+". Insti: "+institucion);

	var cursos = "http://localhost/SAPP/webservice/ws-curso.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":1,\"idInstitucion\":\""+institucion+"\",\"idProfesor\":\""+id+"\",\"nivel\":\""+nivel+"\",\"numero\":\""+numero+"\",\"letra\":\""+letra+"\",\"materia\":\""+materia+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1, "idInstitucion":1, "idProfesor":1, "nivel":"Media", "numero":3, "letra":"B","materia":"Matematicas"}

	$.post(cursos,data,function(datos){
		var obj = $.parseJSON(datos);
		if(obj.idCursoInsertado != -1)
		{
			alert("Curso Insertado");
			limpiarCampos(obj.idCursoInsertado);
			cargarCursos();
		}
		else
		{
			alert("Error");
		}
	});
}

function limpiarCampos()
{
	$("#numeroCurso").val("");
	$("#materia").val("");
	$("#nivel").val("");
	$("#letra").val("");
	$("#institucion").val("");
	$('.nuevoElemento').removeClass('hightTop');
}

function editarCurso()
{
	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;

	$('.nuevoElemento').addClass('hightTop');

	$(this).parent().parent().children().each(function(i)
	{
		if(i == 0)
		{
			$("#id_curso").val($(this).html());
		}
		if(i == 1)
		{
			$("#materia").val($(this).html());
		}
		if(i == 2)
		{
			$("#numeroCurso").val($(this).html());
		}
		if(i == 3)
		{
			$("#letra").val($(this).html());
		}
		if(i == 4)
		{
			$("#nivel").val($(this).html());
		}
		if(i == 5)
		{
			//$("#institucion").val($(this).html());
			cargarInstitucionPorNombre($(this).html());
		}

		$("#agregarCurso").val("Guardar");
	});
}

function cargarInstitucionPorNombre(nombreInst)
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var precios = "http://localhost/SAPP/webservice/ws-institucion.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":4,\"idProfesor\":\""+id+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idProfesor":1}

	$.post(precios,data,function(datos){
		//alert(datos);
		var obj = $.parseJSON(datos);
		//var option = document.getElementById("institucion");
		//option.options.add(new Option("Seleccione una Institucion", 0));
		var select = '';
		select = select + "<option value='0'>Seleccione una Institucion</option>";
		//$("#institucion").prepend("<option value='0'>Seleccione una Institucion</option>");
		$.each(obj.listaInstituciones,function()
		{
			if(this.nombre == nombreInst)
			{
				select = select + "<option value="+this.idInstitucion+" selected='selected'>"+this.nombre+"</option>";
				//alert(nombreInst);
				//$("#institucion").prepend("<option value="+this.idInstitucion+" selected='selected'>"+this.nombre+"</option>").prop({;
			}
			else
			{
				//$("#institucion").prepend("<option value="+this.idInstitucion+">"+this.nombre+"</option>");
				select = select + "<option value="+this.idInstitucion+">"+this.nombre+"</option>";
			}
		});

		$("#institucion").html(select);
	});
}
function actualizarCurso()
{
	var id = $("#idProfe").val();
	var key = $("#keyProfe").val();

	var numero = $("#numeroCurso").val();
	var materia = $("#materia").val();
	var nivel = $("#nivel").val();
	var letra = $("#letra").val();
	var institucion = document.getElementById("institucion").value;
	var idC = $("#id_curso").val();
	//alert("ID: "+idC+". Materia: "+materia+". Curso: "+numero+". Letra: "+letra+". Nivel: "+nivel+". Institucion: "+institucion);

	if(numero == "" || materia == "" || nivel == "" || letra == "" || institucion == "" )
	{
		alert("Debe ingresar todos los campos");
	}
	else
	{
		var precios = "http://localhost/SAPP/webservice/ws-curso.php";
		var data = {"send":"{\"key\":\""+key+"\",\"indice\":2,\"idCurso\":"+idC+",\"idInstitucion\":"+institucion+",\"idProfesor\":"+id+",\"nivel\":\""+nivel+"\",\"numero\":"+numero+",\"letra\":\""+letra+"\",\"materia\":\""+materia+"\"}"};
		//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idCurso":3, "idInstitucion":1, "idProfesor":1, "nivel":"Basica", "numero":3, "letra":"B","materia":"Matematicas"}

		$.post(precios,data,function(datos){
			//alert(datos);
			var obj = $.parseJSON(datos);
			if(obj.resultado == "Curso Modificado")
			{
				alert("Alumno Modificado");
				limpiarCampos(idC);
				cargarCursos();
			}
			else
			{
				alert("Error");
			}
		});
	}
	return false;
}

function borrarCurso()
{
	var key = $("#keyProfe").val();
	var idEliminar = "";

	$(this).parent().parent().children().each(function(i)
	{
		//alert($(this).html());
		if(i == 0)
		{
			idEliminar = $(this).html();
		}
	});

	var precios = "http://localhost/SAPP/webservice/ws-curso.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":3,\"idCurso\":\""+idEliminar+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3, "idCurso":3}

	$.post(precios,data,function(datos){
		var obj = $.parseJSON(datos);
		if(obj.resultado == "curso Eliminado")
		{
			alert("Curso Eliminado");
			cargarCursos();
		}
		else
		{
			alert("Error");
		}
	});
}
