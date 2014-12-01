package cl.profesores.controladoras;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.util.Log;
import cl.profesores.entidades.Clases;
import cl.profesores.entidades.Institucion;
import cl.profesores.entidades.Unidades;
import cl.profesores.librerias.JSONParser;

public class ControladoraListaUnidadesCursos
{
	String mensajeEnviar;
	public ArrayList<Unidades> listarUnidadesCurso(int idCurso,int idProfesor, String key)
	{
		ArrayList<Unidades> listaUnidades = new ArrayList<Unidades>();
		mensajeEnviar = "{\"key\":\""+key+"\",\"indice\":4,\"idCurso\":"+idCurso+",\"idProfesor\":"+idProfesor+"}";
		JSONParser parser = new JSONParser();
		List<NameValuePair> parametros = new ArrayList<NameValuePair>();
		parametros.add(new BasicNameValuePair("send", mensajeEnviar));
		JSONObject objetoJson = parser.makeHttpRequest("ws-unidades-clases.php","POST", parametros);
		try
		{
			JSONArray arregloJson = objetoJson.getJSONArray("listadoUnidades");
			if(arregloJson.length()==0)
			{
				Unidades unidad = new Unidades(0, 0, 0, "No existen unidades", 0, "", "");
				listaUnidades.add(unidad);
			}
			else
			{
				Unidades unidad = new Unidades(0, 0, 0, "Elija una unidad", 0, "", "");
				listaUnidades.add(unidad);
			}
			for(int i=0;i<arregloJson.length();i++)
			{
				//{"idUnidad":1,"idProfesor":1,"idCurso":1,"nombre":"NUMEROS","cantClases":10,"fechaInicio":"2013-10-12","fechaTermino":"2013-10-19"}
				JSONObject objetoJsonFor = (JSONObject) arregloJson.get(i);
				Unidades unidad = new Unidades(objetoJsonFor.getInt("idUnidad"),
						objetoJsonFor.getInt("idProfesor"), objetoJsonFor.getInt("idCurso"),
						objetoJsonFor.getString("nombre"),objetoJsonFor.getInt("cantClases"),
						objetoJsonFor.getString("fechaInicio"),objetoJsonFor.getString("fechaTermino"));
				listaUnidades.add(unidad);
				
			}
			
			
		} 
		catch (JSONException e)
		{
			Log.e("ERROR","hola");
			e.printStackTrace();
			return new ArrayList<Unidades>();
		}
		return listaUnidades;
	}
	public ArrayList<Clases> listarClasesUnidad(int idUnidad,String key)
	{
		ArrayList<Clases> listaClases = new ArrayList<Clases>();
		mensajeEnviar = "{\"key\":\""+key+"\",\"indice\":8,\"idUnidad\":"+idUnidad+"}";
		JSONParser parser = new JSONParser();
		List<NameValuePair> parametros = new ArrayList<NameValuePair>();
		parametros.add(new BasicNameValuePair("send", mensajeEnviar));
		JSONObject objetoJson = parser.makeHttpRequest("ws-unidades-clases.php","POST", parametros);
		try
		{
			JSONArray arregloJson = objetoJson.getJSONArray("listadoClases");
			if(arregloJson.length()==0)
			{
				Clases clase = new Clases(0,0,"No Existen Clases",0,"","","","","","","","","","","");
				listaClases.add(clase);
			}
			else
			{
				Clases clase = new Clases(0,0,"Elija una clase",0,"","","","","","","","","","","");
				listaClases.add(clase);
			}
			for(int i=0;i<arregloJson.length();i++)
			{
				//{"idUnidad":1,"idProfesor":1,"idCurso":1,"nombre":"NUMEROS","cantClases":10,"fechaInicio":"2013-10-12","fechaTermino":"2013-10-19"}
				JSONObject objetoJsonFor = (JSONObject) arregloJson.get(i);
				
				Clases clase = new Clases(objetoJsonFor.getInt("idClase"), objetoJsonFor.getInt("idUnidad"),
					objetoJsonFor.getString("objetivo"),objetoJsonFor.getInt("duracion"),
					objetoJsonFor.getString("contenidoConceptual"),objetoJsonFor.getString("contenidoProcedimental"),
					objetoJsonFor.getString("contenidoActitudinal"), objetoJsonFor.getString("inicio"),objetoJsonFor.getString("desarrollo"),
					objetoJsonFor.getString("cierre"), objetoJsonFor.getString("tipoEvaluacion"),objetoJsonFor.getString("instrumento"),
					objetoJsonFor.getString("recursoInicio"),objetoJsonFor.getString("recursoDesarrollo"),objetoJsonFor.getString("recursoCierre"));
				listaClases.add(clase);
				
			}
			
			
		} 
		catch (JSONException e)
		{
			Log.e("ERROR","hola");
			e.printStackTrace();
			return new ArrayList<Clases>();
		}
		return listaClases;
	}
}
