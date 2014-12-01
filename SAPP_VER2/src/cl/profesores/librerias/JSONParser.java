package cl.profesores.librerias;

import android.util.Log;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.util.List;



public class JSONParser {

	static InputStream is = null;
	static JSONObject jObj = null;
	static String json = "";
	public String urlBusqueda = "http://192.168.0.21/SAPP/webservice/";

	// constructor
	public JSONParser() {

	}

	// function get json from url
	// by making HTTP POST or GET mehtod
	public JSONObject makeHttpRequest(String pagina, String method,
			List<NameValuePair> params)
    {
        Log.e("JSON","Entre httpRequest");
		// Making HTTP request
		try {
			
			// check for request method
			if(method.compareTo("POST")==0)
            {
				// request method is POST
				// defaultHttpClient
                Log.e("JSON",urlBusqueda+pagina);
				DefaultHttpClient httpClient = new DefaultHttpClient();
				HttpPost httpPost = new HttpPost(urlBusqueda+pagina);
				httpPost.setEntity(new UrlEncodedFormEntity(params));
				
				HttpResponse httpResponse = httpClient.execute(httpPost);
				Log.e("JSON", "Hola");
				HttpEntity httpEntity = httpResponse.getEntity();
				is = httpEntity.getContent();
				
			}
			else if(method.compareTo("GET")==0)
            {
				// request method is GET
				DefaultHttpClient httpClient = new DefaultHttpClient();
				String paramString = URLEncodedUtils.format(params, "utf-8");
				pagina += "?" + paramString;
				HttpGet httpGet = new HttpGet(urlBusqueda+pagina);

				HttpResponse httpResponse = httpClient.execute(httpGet);
				HttpEntity httpEntity = httpResponse.getEntity();
				is = httpEntity.getContent();
			}
            Log.e("JSON","Sali Post");
			

		}
        catch (UnsupportedEncodingException e)
        {
			e.printStackTrace();
		}
        catch (ClientProtocolException e)
        {
			e.printStackTrace();
		}
        catch (IOException e)
        {
			e.printStackTrace();
		}

		try
        {
			BufferedReader reader = new BufferedReader(new InputStreamReader(
					is, "iso-8859-1"), 8);
			StringBuilder sb = new StringBuilder();
			String line = null;
			while ((line = reader.readLine()) != null) {
				sb.append(line + "\n");
			}
			is.close();
			json = sb.toString();
			Log.e("Resultado","resultado" +  json);
		}
        catch (Exception e)
        {
			Log.e("Buffer Error", "Error converting result " + e.toString());
		}

		// try parse the string to a JSON object
		try
        {
			jObj = new JSONObject(json);
		}
        catch (JSONException e)
        {
			Log.e("JSON Parser", "Error parsing data " + e.toString());
		}

		// return JSON String
		return jObj;

	}
}
