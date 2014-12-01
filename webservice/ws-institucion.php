<?php
require_once '../entidades/institucion.php';
require_once '../controladoras/controladora-institucion.php';
require_once '../controladoras/controladora-login.php';



//
/*
* 1. Insertar Institución
* 2. Modificar Institución
* 3. Eliminar Institución
* 4. Listar Institución
* 5. Listar Institución Pro Profesor
*/
$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);

switch ($opcion) 
{
	case 1:
		//JSON Insertar Institucion {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"nombre":"Academia Humanidades","direccion":"Recoleta algo","descripcion":"lalala","telefono":"27890076","correo":"academia@academiahumanidades.cl","contacto":"Miguel Moya"}
		$nombre = $data->{'nombre'};
		$direccion = $data->{'direccion'};
		$descripcion = $data->{'descripcion'};
		$telefono = $data->{'telefono'};
		$correo = $data->{'correo'};
		$contacto = $data->{'contacto'};

		$institucion = new Institucion();
		$controladoraInstitucion = new ControladoraInstitucion();
		$institucion->initClass(0, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto);

		$arreglo["code"] = 1;
		$arreglo["idInstitucionInsertado"] = $controladoraInstitucion->insertarInstitucion($institucion);	

		//Retorna {"idInstitucionInsertado":id};	
		echo(json_encode($arreglo));
	break;
	case 2:
		//JSON Modificar Institucion {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idInstitucion":2,"nombre":"Academia Humanidades","direccion":"Recoleta asdasd","descripcion":"asdasd","telefono":"27890076","correo":"contacto@academiahumanidades.cl","contacto":"Miguel Moya"}
		$idInstitucion = $data->{'idInstitucion'};
		$nombre = $data->{'nombre'};
		$direccion = $data->{'direccion'};
		$descripcion = $data->{'descripcion'};
		$telefono = $data->{'telefono'};
		$correo = $data->{'correo'};
		$contacto = $data->{'contacto'};

		$institucion = new Institucion();
		$controladoraInstitucion = new ControladoraInstitucion();
		$institucion->initClass($idInstitucion, $nombre, $direccion, $descripcion, $telefono, $correo, $contacto);;

		$arreglo["code"] = 2;
		$arreglo["resultado"] = $controladoraInstitucion->editarInstituciones($institucion);

		echo (json_encode($arreglo));
	break;
	case 3:
		//JSON Eliminar Institucion {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3,"idInstitucion":1}
		$idInstitucion = $data->{'idInstitucion'};

		$controladoraInstitucion = new ControladoraInstitucion();

		$arreglo["code"] = 3;
		$arreglo["resultado"] = $controladoraInstitucion->eliminarInstitucion($idInstitucion);
		
		echo (json_encode($arreglo));
	break;
	case 4:
		//json Listar Institucion {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4}
		$controladoraInstitucion = new ControladoraInstitucion();
		$arreglo["code"] = 4;
		$arreglo["listaInstituciones"] = $controladoraInstitucion->listarInstituciones();
		echo(json_encode($arreglo));
	break;
	case 5:
		//json Listar Institucion {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idProfesor":1}
		$controladoraInstitucion = new ControladoraInstitucion();
		$idProfesor = $data->{"idProfesor"};
		$arreglo["code"] = 4;
		$arreglo["listaInstituciones"] = $controladoraInstitucion->listarInstitucionesIdProfesor($idProfesor);
		echo(json_encode($arreglo));
	break;
}
?>