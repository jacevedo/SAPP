package cl.profesores.controladoras;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.util.Log;
import cl.profesores.entidades.Alumnos;
import cl.profesores.entidades.Cursos;
import cl.profesores.entidades.Institucion;
import cl.profesores.librerias.JSONParser;

public class ControladoraListaCurso
{
	String mensajeEnviar;
	public ArrayList<Alumnos> listarAlumnosCurso(int idCurso, String key)
	{
		ArrayList<Alumnos> listaAlumnos = new ArrayList<Alumnos>();
		mensajeEnviar = "{\"key\":\""+key+"\",\"indice\":4,\"idCurso\":"+idCurso+"}";
		JSONParser parser = new JSONParser();
		List<NameValuePair> parametros = new ArrayList<NameValuePair>();
		parametros.add(new BasicNameValuePair("send", mensajeEnviar));
		JSONObject objetoJson = parser.makeHttpRequest("ws-alumno.php","POST", parametros);
		try
		{
			JSONArray arregloJson = objetoJson.getJSONArray("ListadoAlumnos");
			
			for(int i=0;i<arregloJson.length();i++)
			{
				
				JSONObject objetoJsonFor = (JSONObject) arregloJson.get(i);
				Alumnos alumno = new Alumnos(objetoJsonFor.getInt("idAlumno"), 
						objetoJsonFor.getInt("idCurso"), objetoJsonFor.getString("nombre"), 
						objetoJsonFor.getString("appPaterno"), objetoJsonFor.getString("appMaterno"),
						objetoJsonFor.getString("rut"), objetoJsonFor.getInt("telefono")+"", 
						objetoJsonFor.getString("correo"));
				listaAlumnos.add(alumno);
				
			}
			
			
		} 
		catch (JSONException e)
		{
			Log.e("ERROR","hola");
			e.printStackTrace();
			return new ArrayList<Alumnos>();
		}
		return listaAlumnos;
	}
	public ArrayList<Institucion> listarInstitucionesIdProfe(int idProfe, String key)
	{
		ArrayList<Institucion> listaCursos = new ArrayList<Institucion>();
		mensajeEnviar = "{\"key\":\""+key+"\",\"indice\":5,\"idProfesor\":"+idProfe+"}";
		JSONParser parser = new JSONParser();
		List<NameValuePair> parametros = new ArrayList<NameValuePair>();
		parametros.add(new BasicNameValuePair("send", mensajeEnviar));
		JSONObject objetoJson = parser.makeHttpRequest("ws-institucion.php","POST", parametros);
		try
		{
			Log.e("controladoraLista", objetoJson.toString());
			
			JSONArray arregloJson = objetoJson.getJSONArray("listaInstituciones");
			if(arregloJson.length()==0)
			{
				Institucion institucion = new Institucion(0,"No tiene instituciones Inscritas","","",
						"","", "");
				listaCursos.add(institucion);
			}
			else
			{
				Institucion institucion = new Institucion(0,"Seleccione Institucion para ver los cursos","","",
						"","", "");
				listaCursos.add(institucion);
			}
			for(int i=0;i<arregloJson.length();i++)
			{
				//{"idPrecios":4,"comentario":"Urgencia. Tratamiento Inicial 1 Sesion","valorNeto":14500,"valorIva":2755,"valorTotal":14500}
				JSONObject objetoJsonFor = (JSONObject) arregloJson.get(i);
				Institucion insti = new Institucion(objetoJsonFor.getInt("idInstitucion"), 
						objetoJsonFor.getString("nombre"), objetoJsonFor.getString("direccion"),
						objetoJsonFor.getString("descripcion"), objetoJsonFor.getString("telefono"),
						objetoJsonFor.getString("correo"), objetoJsonFor.getString("contacto"));
				listaCursos.add(insti);
			}

			
		} 
		catch (JSONException e)
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
			return new ArrayList<Institucion>();
		}
		return listaCursos;
	}
	public ArrayList<Cursos> listarCursosIdProfeIdInstitucion(int idInstitucion,int idCurso, String key)
	{
		ArrayList<Cursos> listaCursos = new ArrayList<Cursos>();
		mensajeEnviar = "{\"key\":\""+key+"\",\"indice\":4,\"idCurso\":"+idCurso+"}";
		JSONParser parser = new JSONParser();
		List<NameValuePair> parametros = new ArrayList<NameValuePair>();
		parametros.add(new BasicNameValuePair("send", mensajeEnviar));
		JSONObject objetoJson = parser.makeHttpRequest("ws-curso.php","POST", parametros);
		try
		{
			JSONArray arregloJson = objetoJson.getJSONArray("ListadoCursos");
			if(arregloJson.length()!=0)
			{
				Cursos curso = new Cursos(0, 0, 0, "", 0, "Elija Curso");
				listaCursos.add(curso);
			}
			else
			{
				Cursos curso = new Cursos(0, 0, 0, "", 0, "No Existen Cursos");
				listaCursos.add(curso);
			}
			for(int i=0;i<arregloJson.length();i++)
			{
				//{"idPrecios":4,"comentario":"Urgencia. Tratamiento Inicial 1 Sesion","valorNeto":14500,"valorIva":2755,"valorTotal":14500}
				JSONObject objetoJsonFor = (JSONObject) arregloJson.get(i);
				Cursos curso = new Cursos(objetoJsonFor.getInt("idCurso"), objetoJsonFor.getInt("idInstitucion"),
						objetoJsonFor.getInt("idProfesor"), objetoJsonFor.getString("nivel"), 
						objetoJsonFor.getInt("numero"), objetoJsonFor.getString("letra"));
				listaCursos.add(curso);
				
			}

			
		} 
		catch (JSONException e)
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
			return new ArrayList<Cursos>();
		}
		return listaCursos;
	}
}
