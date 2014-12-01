<?php
require_once '../entidades/profesor.php';
require_once '../controladoras/controladora-profesor.php';
require_once '../controladoras/controladora-login.php';

/*
* 1. Insertar Profesor
* 2. Modificar Profesor
* 3. Modificar Pass
* 4. Eliminar Profesor
* 5. Listar Profesor por Id
*/

$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);

switch ($opcion) 
{
	case 1:
		//JSON Insertar Profesor {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"nombre":"Jaime","appPaterno":"Acevedo","appMaterno":"Cerna","correo":"jaime@forjadores.cl","pass":"asdasd","biografia":"lalalala","telefono":27895530}
		$nombre = $data->{'nombre'};
		$appPaterno = $data->{'appPaterno'};
		$appMaterno = $data->{'appMaterno'};
		$correo = $data->{'correo'};
		$pass = $data->{'pass'};
		$biografia = $data->{'biografia'};
		$telefono = $data->{'telefono'};

		$profesor = new Profesor();
		$controladoraProfesor = new ControladoraProfesor();
		$profesor->initClass(0, $nombre, $appPaterno, $appMaterno, $correo, $pass, $biografia, $telefono);

		$arreglo["code"] = 1;
		$arreglo["idProfesorInsertado"] = $controladoraProfesor->insertarProfesor($profesor);	

		//Retorna {"idProfesorInsertado":id};	
		echo(json_encode($arreglo));
	break;
	case 2:
		//JSON Modificar Profesor {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idProfesor":1,"nombre":"Viviana","appPaterno":"Garrido","appMaterno":"Sanchez","correo":"viviana@forjadores.cl","biografia":"xdxd","telefono":27895530}
		$idProfesor = $data->{'idProfesor'};
		$nombre = $data->{'nombre'};
		$appPaterno = $data->{'appPaterno'};
		$appMaterno = $data->{'appMaterno'};
		$correo = $data->{'correo'};
		$biografia = $data->{'biografia'};
		$telefono = $data->{'telefono'};

		$profesor = new Profesor();
		$controladoraProfesor = new ControladoraProfesor();
		$profesor->initClass($idProfesor, $nombre, $appPaterno, $appMaterno, $correo, null, $biografia, $telefono);

		$arreglo["code"] = 2;
		$arreglo["resultado"] = $controladoraProfesor->modificarProfesor($profesor);

		echo (json_encode($arreglo));
	break;
	case 3:
		//JSON Modificar Pass {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3,"idProfesor":1,"pass":"asd"}
		$idProfesor = $data->{'idProfesor'};
		
		$pass = $data->{'pass'};
		

		$profesor = new Profesor();
		$controladoraProfesor = new ControladoraProfesor();
		$profesor->initClass($idProfesor, null, null,null,null, $pass, null, null);

		$arreglo["code"] = 3;
		$arreglo["resultado"] = $controladoraProfesor->modificarProfesorPass($profesor);

		echo (json_encode($arreglo));
	break;
	case 4:
		//JSON Eliminar Profesor {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idProfesor":2}
		$idProfesor = $data->{'idProfesor'};

		$controladoraProfesor = new ControladoraProfesor();

		$arreglo["code"] = 3;
		$arreglo["resultado"] = $controladoraProfesor->eliminarProfesor($idProfesor);
		
		echo (json_encode($arreglo));
	break;
	case 5:
		//json Listar Profesor por ID {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":5,"idProfesor":2}
		$idProfesor = $data->{'idProfesor'};

		$controladoraProfesor = new ControladoraProfesor();
		$arreglo["code"] = 4;
		$arreglo["resultado"] = $controladoraProfesor->buscarProfesorPorID($idProfesor);
		echo(json_encode($arreglo));
	break;
}
?>