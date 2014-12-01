/****Validador***/
$(document).ready(notas());
function notas(){
	$('#notasagrega').on('click',function(e){
		e.preventDefault();
		if($('#NotasBody').hasClass('corrige')){
			$('#NotasBody').removeClass('corrige');
			var cuerpotexto = $('#NotasBody tr#Alumno_1 td#califica_1 .calificaInput').val();
			$('#NotasBody tr#Alumno_1 td.califica').html('<span>'+cuerpotexto+'</span>');
			$('#textEd').text('Editar Notas');
		}else{
			var cuerpoNota = $('#NotasBody tr#Alumno_1 td#califica_1 span').text();
			$('#NotasBody tr#Alumno_1 td.califica').html('<input class="calificaInput" type="text" value="'+cuerpoNota+'">');
			$('#NotasBody').addClass('corrige');
			$('#textEd').text('Grabar');
		}
			
	});
}
