var i;
var x;
$(document).ready(editarPrueba());
function editarPrueba(){
	$( ".datepicker" ).datepicker();
	
	
	$('#AgregaPregunta').on('click',function(){
		var valorPreg= 1;
		for ( var i = 0; i < valorPreg; i++ ) {
		
			var InjectPreg ='<ul id="hacerPrueba_'+i+'" class="clearfix"><li><div class="inputcover pregunta" id="Pregunta_'+i+'"><h4 class="desglose">N1 </h4><label>Pregunta 1</label><input type="text" required  name="pregunta_'+i+'" id="pregunta_'+i+'" /><a href="#"  class="agregar_respuesta Ingresa_alternativa" id="Alternativas_'+i+'"><span data-icon="" aria-hidden="true"></span>Alternativas</a><a href="#"  class="agregar_respuesta pregunta_desglose" id="Desglose_'+i+'"><span data-icon="" aria-hidden="true"></span>Desgloses</a><a href="#" class="borrar borrarPreg"><span data-icon="" aria-hidden="true"></span></a></div><div id="respuesta_1" class="respuesta"><div class="inputcover newAlternativas"><header class="boxHead"><h4 class="desglose">Agregar Alternativas </h4><a href="#"  class="agregar_respuesta" id="Agrega_alternativas"><span data-icon="" aria-hidden="true"></span></a></header><div class="resp_Include"></div></div></div></li></ul>';
			$('#ingresaPreg').append(InjectPreg);
			
			
			
				
			$('.borrarPreg').on('click',function(e){
				e.preventDefault();
				$(this).parents('ul').remove();
			});
			
			$('#Agrega_alternativas').on('click', function(){
				
				var valor= 1;
				
				for ( var i = 0; i < valor; i++ ) {
					var InjectResp = '<div class="AlternativaPreg clearfix"><label class="desglose">Alternativa '+i+'</label><input type="text" required  name="respuesta_'+i+'" id="respuesta_'+i+'"/><label><input type="checkbox" name="resp_correcta_'+i+'" value="resp_correcta_'+i+'" class="checkbox" /> Marcar Correcta</label><a href="#" class="borrar"><span data-icon="" aria-hidden="true"></span></a></div>';
					$('.resp_Include').append(InjectResp);
					$('.borrar').on('click',function(e){
						e.preventDefault();
						$(this).parents('.AlternativaPreg').remove();
					});
				}
			});
			
			
			
			
			var idPadre = $('.pregunta_desglose').parents('ul').attr('id');
	
			$('#'+idPadre+' .pregunta_desglose').on('click', function(){
				var padreUl= $(this).parents('ul').attr('id');
				$(this).css('background-color', '#0e71b8 !important');
				$('#'+padreUl+' .Ingresa_alternativa').attr('style', '');
				$('#'+padreUl+' .respuesta').removeClass('heightAlt');
			});
			$('#'+idPadre+' .Ingresa_alternativa').on('click', function(e){
				var padreUl= $(this).parents('ul').attr('id');
				$('.pregunta_desglose').attr('style', '');
				$(this).css('background-color', '#0e71b8 !important');
				e.preventDefault();
				$('#'+padreUl+' .respuesta').addClass('heightAlt');
				
				
			});
			
		}
		
		
	});
	
	 
	
}

