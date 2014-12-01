<?php
require_once '../entidades/pruebas.php';
require_once '../controladoras/controladora-prueba.php';
require_once '../controladoras/controladora-login.php';

/*
* 1. Insertar Prueba
* 2. Modificar Prueba
* 3. Eliminar Prueba
* 4. Listar Pruebas por Curso
* 5. Listar Pruebas por idProfe
*/
$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);

switch ($opcion)
{
	case 1:
		//Json Insertar Prueba {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"idCurso":1,"nombrePrueba":"Prueba1","fecha":"2013-10-23","porcentajePrueba":60}
		$idCurso = $data->{"idCurso"};
		$nombrePrueba = $data->{"nombrePrueba"};
		$fecha = $data->{"fecha"};
		$porcentajePrueba = $data->{"porcentajePrueba"};

		$controladoraPruebas = new ControladoraPruebas();
		$pruebas = new Pruebas();
		$pruebas->initClass(0, $nombrePrueba, $fecha, $porcentajePrueba, $idCurso, 0, NULL);

		$arreglo["code"] = 0;
		$arreglo["idPruebaInsertada"] = $controladoraPruebas->insertarPrueba($pruebas);
		echo(json_encode($arreglo));
	break;
	case 2:
		//Json Modificar Prueba {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"idPrueba":1,"idCurso":1,"nombrePrueba":"Prueba1","fecha":"2013-10-23","porcentajePrueba":60}
		$idPrueba = $data->{"idPrueba"};
		$idCurso = $data->{"idCurso"};
		$nombrePrueba = $data->{"nombrePrueba"};
		$fecha = $data->{"fecha"};
		$porcentajePrueba = $data->{"porcentajePrueba"};

		$controladoraPruebas = new ControladoraPruebas();
		$pruebas = new Pruebas();
		$pruebas->initClass($idPrueba, $nombrePrueba, $fecha, $porcentajePrueba, $idCurso, 0, NULL);

		$arreglo["code"] = 2;
		$arreglo["Resultado"] = $controladoraPruebas->editarPrueba($pruebas);
		echo(json_encode($arreglo));
	break;
	case 3:
		//json Eliminar Prueba {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3,"idPrueba":1}
		$idPrueba = $data->{"idPrueba"};
		$controladoraPruebas = new ControladoraPruebas();

		$arreglo["code"] = 3;
		$arreglo["Resultado"] = $controladoraPruebas->eliminarPrueba($idPrueba);
		echo(json_encode($arreglo));
	break;
	case 4:
		//json Listar Prueba {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idCurso":1}
		$idCurso = $data->{"idCurso"};
		$controladoraPruebas = new ControladoraPruebas();

		$arreglo["code"] = 4;
		$arreglo["ListadoPrueba"] = $controladoraPruebas->listarPruebasPorCurso($idCurso);
		echo(json_encode($arreglo));
	break;
	case 5:
		//json Listar Prueba {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5,"idProfesor":1}
		$idProfesor = $data->{"idProfesor"};
		$controladoraPruebas = new ControladoraPruebas();

		$arreglo["code"] = 5;
		$arreglo["ListadoPruebaProfe"] = $controladoraPruebas->listarPruebasPorIdProfe($idProfesor);
		echo(json_encode($arreglo));
	break;
}
?>