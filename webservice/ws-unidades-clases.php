<?php
require_once '../entidades/unidad.php';
require_once '../entidades/clases.php';
require_once '../controladoras/controladora-clase.php';
require_once '../controladoras/controladora-unidad.php';
require_once '../controladoras/controladora-login.php';

/*
* 1. Insertar Unidad
* 2. Modificar Unidad
* 3. Eliminar Unidad
* 4. Listar Unidades Cursos Profesor
* 5. Insertar Clase
* 6. Modificar Clase
* 7. Eliminar Clase
* 8. Listar Clase id Unidad
*/

$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);

switch ($opcion) 
{
	case 1:
		//JSON Insertar Unidad {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"idProfesor":1,"idCurso":1,"nombre":"Lenguaje","cantClases":3,"fechaInicio":"2013-04-04","fechaTermino":"2013-04-10"}
		$idProfesor =  $data->{'idProfesor'};
		$idCurso =  $data->{'idCurso'};
		$nombre =  $data->{'nombre'};
		$cantClases =  $data->{'cantClases'};
		$fechaInicio =  $data->{'fechaInicio'};
		$fechaTermino =  $data->{'fechaTermino'};

		

		$unidad = new Unidad();
		$controladoraUnidad = new ControladoraUnidad();
		$unidad->initClass(0, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermino);

		$arreglo["code"] = 1;
		$arreglo["idUnidadInsertada"] = $controladoraUnidad->insertarUnidad($unidad);	

		//Retorna {"idProfesorInsertado":id};	
		echo(json_encode($arreglo));
	break;
	case 2:
		//JSON Modificar Unidad {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idUnidad":2,"idProfesor":1,"idCurso":1,"nombre":"Lenguaje","cantClases":3,"fechaInicio":"2013-04-04","fechaTermino":"2013-04-10"}
		$idProfesor =  $data->{'idProfesor'};
		$idCurso =  $data->{'idCurso'};
		$nombre =  $data->{'nombre'};
		$cantClases =  $data->{'cantClases'};
		$fechaInicio =  $data->{'fechaInicio'};
		$fechaTermino =  $data->{'fechaTermino'};
		$idUnidad = $data->{'idUnidad'};

		$unidad = new Unidad();
		$controladoraUnidad = new ControladoraUnidad();
		$unidad->initClass($idUnidad, $idProfesor, $idCurso, $nombre, $cantClases, $fechaInicio, $fechaTermino);

		$arreglo["code"] = 2;
		$arreglo["resultado"] = $controladoraUnidad->editarUnidad($unidad);

		echo (json_encode($arreglo));
	break;
	case 3:
		//JSON Eliminar Unidad {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3,"idUnidad":2}
		$idUnidad = $data->{'idUnidad'};

		$controladoraUnidad = new ControladoraUnidad();

		$arreglo["code"] = 3;
		$arreglo["resultado"] = $controladoraUnidad->eliminarUnidad($idUnidad);
		
		echo (json_encode($arreglo));
	break;
	case 4:
		//JSON Listar Unidades Curso Profesor {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idCurso":1,"idProfesor":1}
		$idCurso = $data->{"idCurso"};
		$idProfesor = $data->{"idProfesor"};
		$controladoraUnidad = new ControladoraUnidad();

		$arreglo["code"] = 4;
		$arreglo["listadoUnidades"] = $controladoraUnidad->listarUnidadCursoProfesor($idProfesor,$idCurso);
		echo(json_encode($arreglo));
	break;
	case 5:
		//JSON Insertar clases {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5,"idUnidad":"1","objetivo":"enseñar raizes","duracion":90,"contenidoConceptual":"a operar raisez","contenidoProcedimental":"Ejercicios Repetitivos","contenidoActitudinal":"Para el futuro","inicio":"ejercicios","desarrollo":"ejercicios","cierre":"ejercicios","tipoEvaluacion":"pueba escrita","instrumento":"papel","recursoInicio":"lapiz Papel","recursoDesarrollo":"lapiz papel","recursoCierre":"lapiz Papel"}
		$idUnidad = $data->{'idUnidad'};
		$objetivo = $data->{'objetivo'};
		$duracion = $data->{'duracion'};
		$contenidoConceptual = $data->{'contenidoConceptual'};
		$contenidoProcedimental = $data->{'contenidoProcedimental'};
		$contenidoActitudinal = $data->{'contenidoActitudinal'};
		$inicio = $data->{'inicio'};
		$desarrollo = $data->{'desarrollo'};
		$cierre = $data->{'cierre'};
		$tipoEvaluacion = $data->{'tipoEvaluacion'};
		$instrumento = $data->{'instrumento'};
		$recursoInicio = $data->{'recursoInicio'};
		$recursoDesarrollo = $data->{'recursoDesarrollo'};
		$recursoCierre = $data->{'recursoCierre'};

		$clases = new Clase();
		$clases->initClass(0,$idUnidad,$objetivo,$duracion, $contenidoConceptual,$contenidoProcedimental,$contenidoActitudinal,$inicio,$desarrollo,
						$cierre,$tipoEvaluacion, $instrumento,$recursoInicio, $recursoDesarrollo,$recursoCierre);
		$controladoraClases = new ControladoraClase();
		$arreglo["code"] = 5;
		$arreglo["idClaseInsertada"] = $controladoraClases->insertarClase($clases);
		echo(json_encode($arreglo));
	break;
	case 6:
		//JSON Modificar Clase {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":6,"idClase":2,"idUnidad":"1","objetivo":"enseñar raizes","duracion":90,"contenidoConceptual":"a operar raisez","contenidoProcedimental":"Ejercicios Repetitivos","contenidoActitudinal":"Para el futuro","inicio":"ejercicios","desarrollo":"ejercicios","cierre":"ejercicios","tipoEvaluacion":"pueba escrita","instrumento":"papel","recursoInicio":"lapiz Papel","recursoDesarrollo":"lapiz papel","recursoCierre":"lapiz Papel"}
		$idClase = $data->{'idClase'};
		$idUnidad = $data->{'idUnidad'};
		$objetivo = $data->{'objetivo'};
		$duracion = $data->{'duracion'};
		$contenidoConceptual = $data->{'contenidoConceptual'};
		$contenidoProcedimental = $data->{'contenidoProcedimental'};
		$contenidoActitudinal = $data->{'contenidoActitudinal'};
		$inicio = $data->{'inicio'};
		$desarrollo = $data->{'desarrollo'};
		$cierre = $data->{'cierre'};
		$tipoEvaluacion = $data->{'tipoEvaluacion'};
		$instrumento = $data->{'instrumento'};
		$recursoInicio = $data->{'recursoInicio'};
		$recursoDesarrollo = $data->{'recursoDesarrollo'};
		$recursoCierre = $data->{'recursoCierre'};

		$clases = new Clase();
		$clases->initClass($idClase,$idUnidad,$objetivo,$duracion, $contenidoConceptual,$contenidoProcedimental,$contenidoActitudinal,$inicio,$desarrollo,
						$cierre,$tipoEvaluacion, $instrumento,$recursoInicio, $recursoDesarrollo,$recursoCierre);
		$controladoraClases = new ControladoraClase();
		$arreglo["code"] = 6;
		$arreglo["resultado"] = $controladoraClases->editarClase($clases);
		echo(json_encode($arreglo));
	break;
	case 7:
		//JSON Eliminar Clase {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":7,"idClase":2}
		$idClase = $data->{'idClase'};
		$controladoraClases = new ControladoraClase();
		$arreglo["code"] = 7;
		$arreglo["resultado"] = $controladoraClases->eliminarClase($idClase);
		echo(json_encode($arreglo));
	break;
	case 8:
		//JSON Listar Clases Id Unidad {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":8,"idUnidad":1}
		$idUnidad = $data->{"idUnidad"};
		$controladoraClases = new ControladoraClase();
		$arregloUnidades["code"] = 8;
		$arregloUnidades["listadoClases"] = $controladoraClases->listarClasesIdUnidad($idUnidad);
		echo(json_encode($arregloUnidades));
	break;
	case 9:
		//JSON Listar Unidades y clases {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":9,"idCurso":1,"idProfesor":1}
		$idCurso = $data->{"idCurso"};
		$idProfesor = $data->{"idProfesor"};
		$controladoraUnidad = new ControladoraUnidad();
		$arreglo["code"] = 4;
		$arreglo["listadoUnidades"] = $controladoraUnidad->listarUnidadCursoProfesorYClases($idProfesor,$idCurso);
		echo(json_encode($arreglo));
	break;
}
?>