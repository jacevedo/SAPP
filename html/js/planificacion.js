/****Validador***/
$(document).ready(planificacion());
function planificacion(){
	$( ".datepicker" ).datepicker();
	$('.crear').on('click', function(){
		var valor= $('#unidades').val();
		for ( var i = 0; i < valor; i++ ) {
			var Injectunidad = '<div id="Unidad_'+i+'"><table border="0" cellspacing="5" cellpadding="5" class="unidad animated fadeInDown"><thead><tr><th>Nombre Unidad</th><th>Clases</th><th>Inicio </th><th>Termino</th><th></th><th></th></tr><thead><tbody><tr><td><div class="inputcover"><input type="text" required  name="unidad" id="unidad_'+i+'" /></div></td><td><div class="inputcover"><input type="text" required  class="clases_number" name="numeroClases" id="numeroClases_'+i+'" /></div></td><td><div class="inputcover"><input type="text" required  name="date_inicio" id="date_inicio_'+i+'" class="datepicker" /></div></td><td><div class="inputcover"><input type="text" required  name="date_final" id="date_final_'+i+'" class="datepicker" /></div></td><td><input class="submit submitUnit" type="submit" value="agregar y editar"></td><td><a href="#" class="borrar"><span data-icon="" aria-hidden="true"></span></a></td></tr></tbody></table></div>';
			$('#result').append(Injectunidad);
			$( ".datepicker" ).datepicker();
			
		}
		$('.submitUnit').on('click', function(){
			var Thisul= $(this).parent().parent().parent().parent().parent().attr('id');
			var valorul= $('#'+Thisul+' .clases_number').val();
			for ( var o = 0; o < valorul; o++ ) {
				var Injectclase= ('<ul id="Clase_'+Thisul+'_'+o+'" border="0" cellspacing="5" cellpadding="5" class="clases animated fadeInDown"><a href="#" class="btn_hidden">Abrir</a><a href="#" class="borrar"><span data-icon="" aria-hidden="true"></span></a><h3>Clase 1</h3><li class="fecha_Clase"><div class="inputcover"><label>Fecha clase</label><br><p>del<input type="text" required  name="date_inicio_'+o+'" id="date_inicio_'+o+'" class="datepicker" />al<input type="text" required  name="date_final_'+o+'" id="date_final_'+o+'" class="datepicker" /></p><label>Tipo de Evaluación</label><textarea id="tipo_evaluacion_'+o+'"></textarea><label>Instrumentos</label><textarea id="tipo_insprumentos_'+o+'"></textarea></div></li><li class="doblecol"><label>Objetivo</label><div class="inputcover"><textarea id="objetivo_'+o+'" class="plan"></textarea></div><div class="maxcol"><label>Inicio de la clase</label><div class="inputcover"><textarea  id="inicio_'+o+'" ></textarea></div><label>Desarrollo de la clase</label><div class="inputcover"><textarea id="desarrollo_'+o+'"></textarea></div><label>Cierre de la clase</label><div class="inputcover"><textarea id="cierre_'+o+'"></textarea></div></div><div class="mincol"><label>Recursos Inicio</label><div class="inputcover"><textarea id="recurso_inicio_'+o+'"></textarea></div><label>Recursos Desarrollo</label><div class="inputcover"><textarea id="recurso_desarrollo_'+o+'"></textarea></div><label>Recursos Cierre</label><div class="inputcover"><textarea  id="recurso_cierre_'+o+'"></textarea></div></div></li><li><label>Contenido Conceptual</label><div class="inputcover"><textarea id="contenido_conceptual_'+o+'"></textarea></div></li><li><label>Contenidos Procedimentales</label><div class="inputcover"><textarea id="contenido_procedimental_'+o+'"></textarea></div></li><li><label>Contenido Actitudinales</label><div class="inputcover"><textarea id="contenido_actitudinal_'+o+'"></textarea></div></li><li><div class="inputcover"><input type="submit" name="submit" class="submit submitClass" id="envio_'+o+'" /></div></li></ul>');
				$('#'+Thisul).append(Injectclase);

			}
			$( ".datepicker" ).datepicker();
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
		window.onload = function (){

			var success = new PDFObject({ url: "pdf/1-6basico.pdf" }).embed("pdf");

		};
	});
		$('#openPdf').on('click',function(e){
			e.preventDefault();
			if($('#containPdf').hasClass('openpdf')){
				$('#containPdf').removeClass('openpdf');
			}else{
				$('#containPdf').addClass('openpdf');
			}
		});
	
	
	
	
	
	
	
}