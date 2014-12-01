/****Validador***/
$(document).ready(validacion);
function validacion(){
	$.validator.addMethod("rut", function(value, element) {
	  return this.optional(element) || $.Rut.validar(value);
	}, "Este campo debe ser un rut valido.");

	$("#editor_alumno").validate({
		rules: {

					apellido_paterno: {
						required: true,
						minlength: 2
					},
					apellido_materno: {
						required: true,
						minlength: 2
					},
					nombre: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					rut:{
						required: true,
					}
				}/*,submitHandler:function(){
					 	$('#alumnoCuerpo').prepend('<tr><td>01</td><td>Acevedo</td><td>Cerna</td><td>Jaime</td><td>14468921-6</td><td>(+56 9)9494000</td><td>jaim.acevedoc@gmail.com</td><td><a href="#" class="editar"><span data-icon="" aria-hidden="true"></span></a></td><td><a href="#" class="borrar"><span data-icon="" aria-hidden="true"></span></a></td></tr>');

				}*/
	});
	
	$("#editor_cursos").validate({
		rules: {

					materia: {
						required: true
					},
					numeroCurso: {
						required: true,
						minlength: 1
					},
					letra: {
						required: true,
						minlength: 1
					},
					nivel: {
						required: true,
						minlength: 1
					}
				}/*,submitHandler:function(){
					 	$('#cursoCuerpo').prepend('<tr><td>Ciencias Sociales</td><td>1</td><td>Media</td><td>A</td><td>Colegio Forjadores</td><td><a href="#" class="editar"><span data-icon="" aria-hidden="true"></span></a></td><td><a href="#" class="borrar"><span data-icon="" aria-hidden="true"></span></a></td><td><a href="planificacion.php">Ver planificación</a></td></tr>');

				}*/
	});
}