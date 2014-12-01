var direccionWeb = "http://localhost/SAPP/webservice/";
$(document).ready(inicializarEventos);

function inicializarEventos()
{
	cargarPlanificion();
}
function cargarPlanificion()
{
	var key = $("#keyProfe").val();
	var idProfesor = $("#idProfe").val();
	var idCurso = $("#idCurso").val();
	var jsonEnviar = "{\"key\":\""+key+"\",\"indice\":9,\"idCurso\":"+idCurso+",\"idProfesor\":"+idProfesor+"}";
	var data = {"send":jsonEnviar};
	var url = direccionWeb+"ws-unidades-clases.php";

	$.post(url,data,function(datos)
	{
		var obj = $.parseJSON(datos);
		$.each(obj.listadoUnidades,function(indice)
		{

			$("#result").append("<div id='Unidad_"+this.idUnidad+"'><table border='0' cellspacing='5' cellpadding='5' class='unidad animated fadeInDown'><thead><tr><th>Nombre Unidad</th><th>Clases</th><th>Inicio </th><th>Termino</th><th></th><th></th></tr></thead><thead></thead><tbody><tr><td><div class='inputcover'><input type='text'  required=''  name='unidad' id='unidad_"+this.idUnidad+"'></div></td><td><div class='inputcover'><input type='text' required='' class='clases_number' name='numeroClases' id='numeroClases_"+this.idUnidad+"'></div></td><td><div class='inputcover'><input type='text' required='' name='date_inicio' id='dateInicio_"+this.idUnidad+"' class='datepicker hasDatepicker'></div></td><td><div class='inputcover'><input type='text' required='' name='date_final' id='dateFinal_"+this.idUnidad+"' class='datepicker hasDatepicker'></div></td><td><input class='submit submitUnit' type='submit' value='agregar y editar'></td><td><a href='#' class='borrar'><span data-icon='' aria-hidden='true'></span></a></td></tr></tbody></table></div>");
			$("#unidad_"+this.idUnidad).val(this.nombre);
			$("#numeroClases_"+this.idUnidad).val(this.cantClases);
			$("#dateInicio_"+this.idUnidad).val(this.fechaInicio);
			$("#dateFinal_"+this.idUnidad).val(this.fechaTermino);



			if(this.cursos!=null||this.cursos!="undefined")
			{
				$.each(this.cursos,function(indices)
				{
					
					$("#Unidad_"+this.idUnidad).append("<ul id='Clase_Unidad_"+this.idUnidad+"_"+this.idClase+"' border='0' cellspacing='5' cellpadding='5' class='clases animated fadeInDown'><a href='#' class='btn_hidden'>Abrir</a><a href='#' class='borrar'><span data-icon='' aria-hidden='true'></span></a><h3>Clase "+indices+"</h3><li class='fecha_Clase'><div class='inputcover'><label>Fecha clase</label><br><p>duracion<input type='text' required='' name='dateInicioClases_"+this.idClase+"' id='duracion_"+this.idClase+"' class='datepicker'></p><label>Tipo de Evaluación</label><textarea id='tipoEvaluacion_"+this.idClase+"'></textarea><label>Instrumentos</label><textarea id='tipoInsprumentos_"+this.idClase+"'></textarea></div></li><li class='doblecol'><label>Objetivo</label><div class='inputcover'><textarea id='objetivo_"+this.idClase+"' class='plan'></textarea></div><div class='maxcol'><label>Inicio de la clase</label><div class='inputcover'><textarea id='inicio_"+this.idClase+"'></textarea></div><label>Desarrollo de la clase</label><div class='inputcover'><textarea id='desarrollo_"+this.idClase+"'></textarea></div><label>Cierre de la clase</label><div class='inputcover'><textarea id='cierre_"+this.idClase+"'></textarea></div></div><div class='mincol'><label>Recursos Inicio</label><div class='inputcover'><textarea id='recursoInicioClase_"+this.idClase+"'></textarea></div><label>Recursos Desarrollo</label><div class='inputcover'><textarea id='recursoDesarrolloClase_"+this.idClase+"'></textarea></div><label>Recursos Cierre</label><div class='inputcover'><textarea id='recursoCierreClase_"+this.idClase+"'></textarea></div></div></li><li><label>Contenido Conceptual</label><div class='inputcover'><textarea id='contenidoConceptual_"+this.idClase+"'></textarea></div></li><li><label>Contenidos Procedimentales</label><div class='inputcover'><textarea id='contenidoProcedimental_"+this.idClase+"'></textarea></div></li><li><label>Contenido Actitudinales</label><div class='inputcover'><textarea id='contenidoActitudinal_"+this.idClase+"'></textarea></div></li><li><div class='inputcover'><input type='submit' name='submit' class='submit submitClass' id='envio_"+this.idClase+"'></div></li></ul>");
					$("#duracion_"+this.idClase).val(this.duracion);
					$("#objetivo_"+this.idClase).val(this.objetivo);
					$("#tipoEvaluacion_"+this.idClase).val(this.tipoEvaluacion);
					$("#inicio_"+this.idClase).val(this.inicio);
					$("#recursoInicioClase_"+this.idClase).val(this.recursoInicio);
					$("#recursoDesarrolloClase_"+this.idClase).val(this.recursoDesarrollo);
					$("#desarrollo_"+this.idClase).val(this.desarrollo);
					$("#tipoInsprumentos_"+this.idClase).val(this.instrumento);
					$("#cierre_"+this.idClase).val(this.cierre);
					$("#recursoCierreClase_"+this.idClase).val(this.recursoCierre);
					$("#contenidoConceptual_"+this.idClase).val(this.contenidoConceptual);
					$("#contenidoProcedimental_"+this.idClase).val(this.contenidoProcedimental);
					$("#contenidoActitudinal_"+this.idClase).val(this.contenidoActitudinal);
					
				});
				
			}
		});
		$(".btn_hidden").on('click',function(e){
				e.preventDefault();
				var ulId = $(this).parent('ul').attr('id');
				console.log(ulId);
				if($('#'+ulId).hasClass('open')){
					$('#'+ulId).removeClass('open');
					$(this).text('Abrir');
				}else{
					$('.btn_hidden').parent('ul').removeClass('open');
					$('#'+ulId).addClass('open');
					$(".btn_hidden").text('Abrir');
					$(this).text('Cerrar X');
				}
				$( ".datepicker" ).datepicker();
			});	
	});
}