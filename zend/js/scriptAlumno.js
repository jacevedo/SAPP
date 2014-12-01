var direccionWeb = "http://localhost/SAPP/webservice/";
var idC = "";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarCurso();
	$("#clase").change(cambiarAlumnos);
	$("#agregarNuevoAlumno").click(elegirBoton);
}

function cargarCurso()
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

function cambiarAlumnos()
{
	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;
	var precios = "http://localhost/SAPP/webservice/ws-alumno.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":4,\"idCurso\":\""+curso+"\"}"};
	//json Listar Alumnos {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idCurso":2}
	var tabla = "";
	$.post(precios,data,function(datos){
		var obj = $.parseJSON(datos);
		$.each(obj.ListadoAlumnos,function()
			{
				tabla = tabla+"<tr><td>"+this.idAlumno+"</td><td>"+this.appPaterno+"</td><td>"+this.appMaterno+"</td><td>"+this.nombre+"</td><td>"+this.rut+"</td><td>"+this.telefono+"</td><td>"+this.correo+"</td><td><a href='#'' class='editar'><span data-icon='' aria-hidden='true'></span></a></td><td><a href='#'' class='borrar'><span data-icon='' aria-hidden='true'></span></a></td></tr>";
				//<tr><td>01</td><td>Berwart</td><td>Varela</td><td>Juan Pablo</td><td>14468921-6</td><td>(+56 9)99494000</td><td>jpberwart@gmail.com</td></tr>
				//
			});
		$("#alumnoCuerpo").html(tabla);
		//var obj2 = jQuery.parseJSON(obj.ListadoCursos[1]);
		//alert(obj.ListadoCursos[0].nivel);
	});
	$("#alumno").on("click",".editar",modificarAlumno);
	$("#alumno").on("click",".borrar",eliminarAlumno);
}

function elegirBoton()
{
	if($(this).val() == "Agregar")
	{
		agregarAlumno();
	}
	else
	{
		actualizarAlumno();
	}
}

function agregarAlumno()
{
	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;

	if(curso != 0)
	{
		var nombre = $("#nombre").val();
		var appP = $("#apellido_paterno").val();
		var appM = $("#apellido_materno").val();
		var rut = $("#rut").val();
		var telefono = $("#telefono").val();
		var email = $("#correo").val();

		if(nombre == "" || appP == "" || appM == "" || rut == "" || telefono == "" || email == "")
		{
			alert("Debe ingresar todos los campos");
		}
		else
		{
			var precios = "http://localhost/SAPP/webservice/ws-alumno.php";
			var data = {"send":"{\"key\":\""+key+"\",\"indice\":0,\"idCurso\":\""+curso+"\",\"nombre\":\""+nombre+"\",\"appPaterno\":\""+appP+"\",\"appMaterno\":\""+appM+"\",\"rut\":\""+rut+"\",\"telefono\":\""+telefono+"\",\"correo\":\""+email+"\"}"};
			//Json Insertar Alumno{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":0, "idCurso":2, "nombre": "Juan", "appPaterno": "Peres", "appMaterno": "espinosa","rut":"17892323-2","telefono":7780186,"correo":"asd@asd.com"}

			$.post(precios,data,function(datos){
				var obj = $.parseJSON(datos);
				if(obj.idAlumnoInsertado != -1)
				{
					alert("Alumno Insertado");
					limpiarCampos(obj.idAlumnoInsertado);
					cambiarAlumnos();
				}
				else
				{
					alert("Error");
				}
			});
		}
	}
	else
	{
		alert("Error. Debe seleccionar un curso primero");
	}
}
function limpiarCampos()
{
	$("#nombre").val("");
	$("#apellido_paterno").val("");
	$("#apellido_materno").val("");
	$("#rut").val("");
	$("#telefono").val("");
	$("#correo").val("");
}
function modificarAlumno()
{
	//$("#alumno").off("click",".editar",modificarAlumno);

	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;

	$('.nuevoElemento').addClass('hightTop');

	$(this).parent().parent().children().each(function(i)
	{
		//alert($(this).html());
		if(i == 0)
		{
			$("#id_alumno").val($(this).html());
		}
		if(i == 1)
		{
			$("#apellido_paterno").val($(this).html());
		}
		if(i == 2)
		{
			$("#apellido_materno").val($(this).html());
		}
		if(i == 3)
		{
			$("#nombre").val($(this).html());
		}
		if(i == 4)
		{
			$("#rut").val($(this).html());
		}
		if(i == 5)
		{
			$("#telefono").val($(this).html());
		}
		if(i == 6)
		{
			$("#correo").val($(this).html());
		}

		$("#agregarNuevoAlumno").val("Guardar");
	});

	//$('.nuevoElemento').removeClass('hightTop');
}

function actualizarAlumno()
{
	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;

	if(curso != 0)
	{
		var nombre = $("#nombre").val();
		var appP = $("#apellido_paterno").val();
		var appM = $("#apellido_materno").val();
		var rut = $("#rut").val();
		var telefono = $("#telefono").val();
		var email = $("#correo").val();

		var idAl = $("#id_alumno").val();

		if(nombre == "" || appP == "" || appM == "" || rut == "" || telefono == "" || email == "")
		{
			alert("Debe ingresar todos los campos");
		}
		else
		{
			var precios = "http://localhost/SAPP/webservice/ws-alumno.php";
			var data = {"send":"{\"key\":\""+key+"\",\"indice\":1,\"idAlumno\":\""+idAl+"\",\"idCurso\":\""+curso+"\",\"nombre\":\""+nombre+"\",\"appPaterno\":\""+appP+"\",\"appMaterno\":\""+appM+"\",\"rut\":\""+rut+"\",\"telefono\":\""+telefono+"\",\"correo\":\""+email+"\"}"};
			//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"idAlumno":3,"idCurso":2,"nombre": "Juan","appPaterno":"Aparicio","appMaterno":"espinosa","rut":"17892323-2","telefono":7780186,"correo":"asd@asd.com"}

			$.post(precios,data,function(datos){
				var obj = $.parseJSON(datos);
				if(obj.Resultado == "Alumno Modificado")
				{
					alert("Alumno Modificado");
					limpiarCampos(idAl);
					cambiarAlumnos();
				}
				else
				{
					alert("Error");
				}
			});
		}
	}
	else
	{
		alert("Error. Debe seleccionar un curso primero");
	}
}

function eliminarAlumno()
{
	var key = $("#keyProfe").val();
	var curso = document.getElementById("clase").value;
	var idEliminar = "";

	$(this).parent().parent().children().each(function(i)
	{
		//alert($(this).html());
		if(i == 0)
		{
			idEliminar = $(this).html();
		}
	});

	var precios = "http://localhost/SAPP/webservice/ws-alumno.php";
	var data = {"send":"{\"key\":\""+key+"\",\"indice\":2,\"idAlumno\":\""+idEliminar+"\"}"};
	//{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idAlumno":3}

	$.post(precios,data,function(datos){
		var obj = $.parseJSON(datos);
		if(obj.Resultado == "Alumno Eliminado")
		{
			alert("Alumno Eliminado");
			cambiarAlumnos();
		}
		else
		{
			alert(obj.Resultado);
		}
	});

}