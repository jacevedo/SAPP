<?php
require_once '../entidades/curso.php';
require_once '../controladoras/controladora-curso.php';
require_once '../controladoras/controladora-login.php';

/*
* 1. Insertar Curso
* 2. Modificar Curso
* 3. Eliminar Curso
* 4. Listar Curso
* 5. Listar Curso Por Institucion
* 6. Listar Curso Por Profesor
*/
$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);

switch ($opcion) 
{
	case 1:
		//JSON Insertar Curso {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1, "idInstitucion":1, "idProfesor":1, "nivel":"Media", "numero":3, "letra":"B","materia":"Matematicas"}
		$idInstitucion = $data->{'idInstitucion'};
		$idProfesor = $data->{'idProfesor'};
		$nivel = $data->{'nivel'};
		$numero = $data->{'numero'};
		$letra = $data->{'letra'};
		$materia = $data->{'materia'};

		$curso = new Curso();
		$controladoraCurso = new ControladoraCurso();
		$curso->initClass(0, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra, null, null, null);
		//$idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra,	$nomInstitucion, $nomProfesor, $appProfesor
		$arreglo["code"] = 1;
		$arreglo["idCursoInsertado"] = $controladoraCurso->insertarCurso($curso);	

		//Retorna {"idProfesorInsertado":id};	
		echo(json_encode($arreglo));
	break;
	case 2:
		//JSON Modificar Curso {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idCurso":3, "idInstitucion":1, "idProfesor":1, "nivel":"Basica", "numero":3, "letra":"B","materia":"Matematicas"}
		$idCurso = $data->{"idCurso"};
		$idInstitucion = $data->{'idInstitucion'};
		$idProfesor = $data->{'idProfesor'};
		$nivel = $data->{'nivel'};
		$numero = $data->{'numero'};
		$letra = $data->{'letra'};
		$materia = $data->{'materia'};

		$curso = new Curso();
		$controladoraCurso = new ControladoraCurso();
		$curso->initClass($idCurso, $idInstitucion, $idProfesor, $materia, $nivel, $numero, $letra, null, null, null);

		$arreglo["code"] = 2;
		$arreglo["resultado"] = $controladoraCurso->editarCurso($curso);
		$arreglo["xd"] = $materia;
		echo (json_encode($arreglo));
	break;
	case 3:
		//JSON Eliminar Curso {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3, "idCurso":3}
		$idCurso = $data->{'idCurso'};

		$controladoraProfesor = new ControladoraCurso();

		$arreglo["code"] = 3;
		$arreglo["resultado"] = $controladoraProfesor->eliminarCurso($idCurso);
		
		echo (json_encode($arreglo));
	break;
	case 4:
		//Json Listar Cursos{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4}
		$controladoraProfesor = new ControladoraCurso();
		$arreglo["code"] = 4;
		$arreglo["ListadoCursos"] = $controladoraProfesor->listarCursos();
		echo (json_encode($arreglo));
	break;
	case 5:
		//Json Listar Cursos Por Profesor e institucion{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5, "idProfesor":1, "idInstitucion":1}
		$idProfesor = $data->{"idProfesor"};
		$idInstitucion = $data->{"idInstitucion"};
		$controladoraProfesor = new ControladoraCurso();
		$arreglo["code"] = 5;
		$arreglo["ListadoCursos"] = $controladoraProfesor->listarCursosPorInstitucionProfesor($idProfesor,$idInstitucion);
		echo (json_encode($arreglo));
	break;
	case 6:
		//Json Listar Cursos id Profesor{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":6,"idProfesor":1}
		$idProfesor = $data->{"idProfesor"};
		$controladoraProfesor = new ControladoraCurso();
		$arreglo["code"] = 6;
		$arreglo["ListadoCursos"] = $controladoraProfesor->listarCursosPorProfesor($idProfesor);
		echo (json_encode($arreglo));
	break;
}
?>