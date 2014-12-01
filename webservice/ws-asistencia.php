<?php
require_once '../entidades/asistencia.php';
require_once '../controladoras/controladora-asistencia.php';
require_once '../controladoras/controladora-login.php';

/*
* 1. Insertar Asistencias
* 2. Buscar Asistencia Fecha Institucion
* 3. Listar Asistecia Alumno
* 4. Modificar Fecha Alumno
*/

$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);

switch ($opcion) 
{
	case 1:
		//JSON Insertar Asistencia {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"asistencia":[{"idAlumno":1,"fecha":"2013-12-12","hora":"18:00","asistio":0},{"idAlumno":2,"fecha":"2013-12-12","hora":"18:00","asistio":0},{"idAlumno":3,"fecha":"2013-12-12","hora":"18:00","asistio":0},{"idAlumno":4,"fecha":"2013-12-12","hora":"18:00","asistio":0}]}
		
		$asistencia = $data->{"asistencia"};
		foreach ($asistencia as $valor)
		{
			$idAlumno = $valor->{"idAlumno"};
			$fecha = $valor->{"fecha"};
			$asistio = $valor->{"asistio"};

			$asistenciaObjeto = new Asistencia();
			$controladoraAsistencia = new ControladoraAsistencia();
			$asistenciaObjeto->initClass(null, $idAlumno, null, null, $fecha, $asistio);
			$controladoraAsistencia->insertarAsistencia($asistenciaObjeto);
		}
		$arreglo["code"] = 1;
		$arreglo["resultado"] = "Terminado";
		echo(json_encode($arreglo));
	break;
	case 2:
		//JSON Modificar Profesor {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idProfesor":1,"nombre":"Viviana","appPaterno":"Garrido","appMaterno":"Sanchez","correo":"viviana@forjadores.cl","pass":"xdxd","biografia":"xdxd","telefono":27895530}
		$idProfesor = $data->{'idProfesor'};
		$nombre = $data->{'nombre'};
		$appPaterno = $data->{'appPaterno'};
		$appMaterno = $data->{'appMaterno'};
		$correo = $data->{'correo'};
		$pass = $data->{'pass'};
		$biografia = $data->{'biografia'};
		$telefono = $data->{'telefono'};

		$profesor = new Profesor();
		$controladoraProfesor = new ControladoraProfesor();
		$profesor->initClass($idProfesor, $nombre, $appPaterno, $appMaterno, $correo, $pass, $biografia, $telefono);

		$arreglo["code"] = 2;
		$arreglo["resultado"] = $controladoraProfesor->modificarProfesor($profesor);

		echo (json_encode($arreglo));
	break;
	case 3:
		//JSON Listar Asistencia Alumno Profesor {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3,"idAlumno":2}
		$idAlumno = $data->{'idAlumno'};

		$controladoraAsistencia = new ControladoraAsistencia();

		$arreglo["code"] = 3;
		$arreglo["resultado"] = $controladoraAsistencia->listarAsistenciaAlumno($idAlumno);
		
		echo (json_encode($arreglo));
	break;
}
?>