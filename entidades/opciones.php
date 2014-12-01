<?php
class Opciones
{
	public $idOpciones;
	public $opcion;
	public $esCorrecta;
	public $glosa;
	public $idPreguntas;
	public $numeroPregunta;
	public $nombrePregunta;

	function initClass($idOpciones, $opcion, $esCorrecta, $glosa, $idPreguntas, $numeroPregunta, $nombrePregunta)
	{
		$this->idOpciones = $idOpciones;
		$this->opcion = $opcion;
		$this->esCorrecta = $esCorrecta;
		$this->glosa = $glosa;
		$this->idPreguntas = $idPreguntas;
		$this->numeroPregunta = $numeroPregunta;
		$this->nombrePregunta = $nombrePregunta;
	}
}
?>