package cl.profesores.sapp;

import java.util.ArrayList;

import cl.profesores.controladoras.ControladoraListaCurso;
import cl.profesores.entidades.Cursos;
import cl.profesores.entidades.Institucion;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;

public class Lista extends Activity implements OnItemSelectedListener, OnClickListener
{
	private Spinner spListaInstituciones;
	private Spinner spListaCursos;
	private Button btnListaAlumnos;
	private String key;
	private int idProfe;
	private ArrayList<Institucion> listainstituciones;
	private ArrayList<Cursos> listaCursos;
	
	@Override
	protected void onCreate(Bundle savedInstanceState)
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.lista);
		SharedPreferences prefe=getSharedPreferences("SAPP",Context.MODE_PRIVATE);
		key = prefe.getString("key", "");
		idProfe = prefe.getInt("idProfe", -1);
		Log.e("lista",idProfe+"");
		inicializarElementos();
	}

	private void inicializarElementos()
	{
		spListaInstituciones = (Spinner)findViewById(R.id.spnListaInstitucion);
		spListaCursos = (Spinner)findViewById(R.id.spnListaCursos);
		spListaInstituciones.setOnItemSelectedListener(this);
		btnListaAlumnos = (Button)findViewById(R.id.btnListaAlumnos);
		btnListaAlumnos.setOnClickListener(this);
		poblarSpinner();
		
	}

	private void poblarSpinner()
	{
		
		Log.e("Lista",key);
		new busquedaListaInstituciones().execute(idProfe+"",key);
		
	}
	@Override
	public void onClick(View v)
	{
		switch (v.getId())
		{
			case R.id.btnListaAlumnos:
				if(listainstituciones.size()!=0&&(listaCursos!=null&&listaCursos.size()!=0))
				{
					String nombreCursos =  spListaCursos.getSelectedItem().toString();
					String [] idCursoArreglo = nombreCursos.split("-");
					Intent i = new Intent("cl.profesores.sapp.ListaAlumnos");
					i.putExtra("idCurso", idCursoArreglo[0].subSequence(0, 1));
					startActivity(i);
				}
			break;
		}
		
	}
	

	@Override
	public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2,
			long arg3)
	{
		if(arg2!=0)
		{
			new busquedaListaCurso().execute(listainstituciones.get(arg2).getIdInstitucion()+"",idProfe+"",key);
		}
		
	}

	@Override
	public void onNothingSelected(AdapterView<?> arg0)
	{
		// TODO Auto-generated method stub
		
	}
	public class busquedaListaInstituciones extends AsyncTask<String, Void, ArrayList<Institucion>>
	{
		@Override
		protected void onPreExecute()
		{
			// TODO Auto-generated method stub
			super.onPreExecute();
		}

		@Override
		protected ArrayList<Institucion> doInBackground(String... params)
		{
			ControladoraListaCurso controladoraLista = new ControladoraListaCurso();
			ArrayList<Institucion> listaInstituciones = controladoraLista.listarInstitucionesIdProfe(Integer.parseInt(params[0]), params[1]);
			return listaInstituciones;
		}

		@Override
		protected void onPostExecute(ArrayList<Institucion> result)
		{
			listainstituciones = result;
			ArrayAdapter<Institucion> listaEpinnerInstituciones = new ArrayAdapter<Institucion>(Lista.this, android.R.layout.simple_spinner_item, listainstituciones);
			listaEpinnerInstituciones.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spListaInstituciones.setAdapter(listaEpinnerInstituciones);
			super.onPostExecute(result);
		}
	}
	public class busquedaListaCurso extends AsyncTask<String, Void, ArrayList<Cursos>>
	{
		@Override
		protected void onPreExecute()
		{
			// TODO Auto-generated method stub
			super.onPreExecute();
		}

		@Override
		protected ArrayList<Cursos> doInBackground(String... arg0)
		{
			ControladoraListaCurso controladoraLista = new ControladoraListaCurso();
			ArrayList<Cursos> listaCursos = controladoraLista.listarCursosIdProfeIdInstitucion(Integer.parseInt(arg0[0]),Integer.parseInt(arg0[1]), arg0[2]);
			return listaCursos;
		}

		@Override
		protected void onPostExecute(ArrayList<Cursos> result)
		{
			listaCursos = result;
			ArrayAdapter<Cursos> listaEpinnerCursos = new ArrayAdapter<Cursos>(Lista.this, android.R.layout.simple_spinner_item, listaCursos);
			listaEpinnerCursos.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spListaCursos.setAdapter(listaEpinnerCursos);
			super.onPostExecute(result);
		}

		
		
	}
}
