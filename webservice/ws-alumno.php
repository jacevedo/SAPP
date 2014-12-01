<?php
require_once '../entidades/alumno.php';
require_once '../controladoras/controladora-alumno.php';
require_once '../controladoras/controladora-login.php';

/*
* 1. Insertar Alumno
* 2. Modificar Alumno
* 3. Eliminar Alumno
* 4. Listar Alumnos
* 5. Listar Alumnos por Curso
*/
$jsonRecibido = $_REQUEST["send"];
$data = json_decode($jsonRecibido);
$controladoraLogin = new ControladoraLogin();
$opcion = $controladoraLogin->validarSession($jsonRecibido);



switch ($opcion)
{
	case 0:
			//Json Insertar Alumno{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":0, "idCurso":2, "nombre": "Juan", "appPaterno": "Peres", "appMaterno": "espinosa","rut":"17892323-2","telefono":7780186,"correo":"asd@asd.com"}
			$idCurso = $data->{"idCurso"};
			$nombre = $data->{"nombre"};
			$appPaterno = $data->{"appPaterno"};
			$appMaterno = $data->{"appMaterno"};
			$rut = $data->{"rut"};
			$telefono = $data->{"telefono"};
			$correo = $data->{"correo"};
			$controlAlumno = new ControladoraAlumno();
			$alumno = new Alumno();
			$alumno->initClass(0, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono,$correo);
			$arreglo["code"]=0;
			$arreglo["idAlumnoInsertado"] = $controlAlumno->insertarAlumno($alumno);
			echo(json_encode($arreglo));
	break;
	case 1:
			//Json Modificar Alumno{"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":1,"idAlumno":3,"idCurso":2,"nombre": "Juan","appPaterno":"Aparicio","appMaterno":"espinosa","rut":"17892323-2","telefono":7780186,"correo":"asd@asd.com"}
			$idAlumno = $data->{"idAlumno"};
			$idCurso = $data->{"idCurso"};
			$nombre = $data->{"nombre"};
			$appPaterno = $data->{"appPaterno"};
			$appMaterno = $data->{"appMaterno"};
			$rut = $data->{"rut"};
			$telefono = $data->{"telefono"};
			$correo = $data->{"correo"};
			$controlAlumno = new ControladoraAlumno();
			$alumno = new Alumno();
			$alumno->initClass($idAlumno, $idCurso, $nombre, $appPaterno, $appMaterno, $rut, $telefono,$correo);
			$arreglo["code"]=1;
			$arreglo["Resultado"] = $controlAlumno->editarAlumnos($alumno);
			echo(json_encode($arreglo));
	break;
	case 2:
			//json Eliminar Alumno {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":2,"idAlumno":3}
			$idAlumno = $data->{"idAlumno"};
			$controlAlumno = new ControladoraAlumno();
			$arreglo["code"]=2;
			$arreglo["Resultado"] = $controlAlumno->eliminarAlumno($idAlumno);
			echo(json_encode($arreglo));
	break;
	case 3:
			//json Listar Alumnos {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":3}
			$controlAlumno = new ControladoraAlumno();
			$arreglo["code"]=3;
			$arreglo["ListadoAlumnos"] = $controlAlumno->listarAlumnos();
			echo(json_encode($arreglo));
	break;
	case 4:
			//json Listar Alumnos {"key":"$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S","indice":4,"idCurso":2}
			$idCurso = $data->{"idCurso"};
			$controlAlumno = new ControladoraAlumno();
			$arreglo["code"]=3;
			$arreglo["ListadoAlumnos"] = $controlAlumno->listarAlumnosPorCurso($idCurso);
			echo(json_encode($arreglo));
	break;
}


?>