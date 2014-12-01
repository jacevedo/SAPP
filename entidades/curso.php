<?php

class Curso
{
	public $idCurso;
	public $idInstitucion;
	public $idProfesor;
	public $materia;
	public $nivel;
	public $numero;
	public $letra;
	public $nomInstitucion;
	public $nomProfesor;
	public $appProfesor;
	



	function initClass($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,
						$nomInstitucion, $nomProfesor, $appProfesor)
	{
		$this->idCurso = $idCurso;
		$this->idInstitucion = $idInstitucion;
		$this->idProfesor = $idProfesor;
		$this->materia = $materia;
		$this->nivel = $nivel;
		$this->numero = $numero;
		$this->letra = $letra;
		$this->nomInstitucion = $nomInstitucion;
		$this->nomProfesor = $nomProfesor;
		$this->appProfesor = $appProfesor;
		
	}
}

?>