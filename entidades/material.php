<?php
class Material
{
	public $idMaterial;
	public $urlMaterial;
	public $tipo;
	public $titulo;
	public $idProfesor;
	public $nombreProfesor;
	public $apellidoProfesor;

	function initClass($idMaterial, $urlMaterial, $tipo, $titulo, $idProfesor, $nombreProfesor, $apellidoProfesor)
	{
		$this->idMaterial = $idMaterial;
		$this->urlMaterial = $urlMaterial;
		$this->tipo = $tipo;
		$this->titulo = $titulo;
		$this->idProfesor = $idProfesor;
		$this->nombreProfesor = $nombreProfesor;
		$this->apellidoProfesor = $apellidoProfesor;
	}
}
?>