$($(function(){
	$('a.mainLink').on('click', function(e){
		e.preventDefault();
		if($(this).parent('li').attr('class') =="height"){
			$(this).parent('li').removeClass('height');
		}else{
			$('a.mainLink').parent('li').removeClass('height');
			$(this).parent('li').addClass('height');
		}
	});
	$('#agrega').on('click', function(e){
		e.preventDefault();
		$('.nuevoElemento').addClass('hightTop');
	});
	
	$('#cerrar').on('click', function(e){
		e.preventDefault();
		$('.nuevoElemento').removeClass('hightTop');
	});
	
	$('#closeMenu').on('click', function(){
		if($('#sidebar').attr('class')=='hidemenu'){
			$('#sidebar').removeClass('hidemenu');
			$('#main').removeClass('extended');
		}else{
			$('#sidebar').addClass('hidemenu');
			$('#main').addClass('extended');	
		}
	});
}));
