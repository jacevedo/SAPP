package cl.profesores.controladoras;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import cl.profesores.entidades.Login;
import cl.profesores.librerias.JSONParser;

public class ControladoraLogin
{
	String mensajeEnviar;
	public Login loginKey(String usuario, String pass)
	{
		mensajeEnviar = "{\"indice\":1,\"usuario\":\""+usuario+"\",\"pass\":\""+pass+"\"}";
		JSONParser parser = new JSONParser();
		List<NameValuePair> parametros = new ArrayList<NameValuePair>();
		parametros.add(new BasicNameValuePair("send", mensajeEnviar));
		JSONObject objetoJson = parser.makeHttpRequest("ws-login.php","POST", parametros);
		try
		{
			String key = objetoJson.getString("key");
			int idProfesor = objetoJson.getInt("idProfesor");
			Login login = new Login(idProfesor, key);
			return login;
			
			
		} 
		catch (JSONException e)
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
			return new Login(-1, "");
		}
		
	}
}
