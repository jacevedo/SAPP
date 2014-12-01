package cl.profesores.sapp;

import java.util.ArrayList;

import cl.profesores.controladoras.ControladoraListaCurso;
import cl.profesores.entidades.Alumnos;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

public class ListaAlumnos extends Activity
{
	private ArrayList<Alumnos> listaAlumnos;
	private int idCurso;
	private String key;
	private LinearLayout layoutAlumnos;
	@Override
	protected void onCreate(Bundle savedInstanceState)
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.lista_alumnos);
		Bundle bundle = getIntent().getExtras();
		inicializarElementos();
		obtenerDatos(bundle);
		
		
	}
	private void inicializarElementos()
	{
		layoutAlumnos = (LinearLayout)findViewById(R.id.layoutAlumnos);
	}
	private void obtenerDatos(Bundle bundle)
	{
		SharedPreferences prefe=getSharedPreferences("SAPP",Context.MODE_PRIVATE);
		key = prefe.getString("key", "");
		idCurso = Integer.parseInt(bundle.getString("idCurso"));
		new busquedaAlumnos().execute(idCurso+"",key);
	}
	class busquedaAlumnos extends AsyncTask<String, Void, ArrayList<Alumnos>>
	{
		@Override
		protected void onPreExecute()
		{
			// TODO Auto-generated method stub
			super.onPreExecute();
		}
		
		@Override
		protected ArrayList<Alumnos> doInBackground(String... params)
		{
			ControladoraListaCurso controladora = new ControladoraListaCurso();
			ArrayList<Alumnos> listaAlumnosHilo = controladora.listarAlumnosCurso(Integer.parseInt(params[0]), params[1]);
			Log.e("listaAlumnos", listaAlumnosHilo.size()+"");
			return listaAlumnosHilo;
		}
		
		@Override
		protected void onPostExecute(ArrayList<Alumnos> result)
		{
			Log.e("lista", result.size()+"");
			listaAlumnos = result;
			Log.e("lista", listaAlumnos.size()+"");
			if(listaAlumnos != null && listaAlumnos.size()!=0)
			{
				for (Alumnos alumnos : listaAlumnos)
				{
					LinearLayout layout = new LinearLayout(ListaAlumnos.this);
					TextView lblAlumno = new TextView(ListaAlumnos.this);
					lblAlumno.setText(alumnos.getNombre()+" " + alumnos.getAppPaterno());
					layout.addView(lblAlumno);
					layoutAlumnos.addView(layout);
				}
			}
			else
			{
				Toast.makeText(ListaAlumnos.this, "No Existen alumnos para este curso", Toast.LENGTH_SHORT).show();
			}
			super.onPostExecute(result);
		}

		
		
	}

}
