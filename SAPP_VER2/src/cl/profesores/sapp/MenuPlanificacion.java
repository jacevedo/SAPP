package cl.profesores.sapp;

import java.util.ArrayList;

import cl.profesores.controladoras.ControladoraListaCurso;
import cl.profesores.controladoras.ControladoraListaUnidadesCursos;
import cl.profesores.entidades.Clases;
import cl.profesores.entidades.Cursos;
import cl.profesores.entidades.Institucion;
import cl.profesores.entidades.Unidades;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.Toast;
import android.widget.AdapterView.OnItemSelectedListener;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

public class MenuPlanificacion extends Activity implements OnItemSelectedListener, OnClickListener
{
	private Spinner spListaInstituciones;
	private Spinner spListaCursos;
	private Spinner spListaUnidades;
	private Spinner spListaClases;
	private Button btnListaAlumnos;
	private String key;
	private int idProfe;
	private int indiceClase;
	private ArrayList<Institucion> listainstituciones;
	private ArrayList<Cursos> listaCursos;
	private ArrayList<Unidades> listaUnidades;
	private ArrayList<Clases> listaClases;
	
	@Override
	protected void onCreate(Bundle savedInstanceState)
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.menu_planificacion);
		SharedPreferences prefe=getSharedPreferences("SAPP",Context.MODE_PRIVATE);
		key = prefe.getString("key", "");
		idProfe = prefe.getInt("idProfe", -1);
		inicializarElementos();
	}

	private void inicializarElementos()
	{
		btnListaAlumnos = (Button)findViewById(R.id.btnVerPlanidicacion);
		spListaInstituciones = (Spinner)findViewById(R.id.spInstitucion);
		spListaCursos = (Spinner)findViewById(R.id.spCursos);
		spListaUnidades = (Spinner) findViewById(R.id.spUnidades);
		spListaClases = (Spinner) findViewById(R.id.spClases);
		spListaInstituciones.setOnItemSelectedListener(this);
		spListaCursos.setOnItemSelectedListener(this);
		spListaUnidades.setOnItemSelectedListener(this);
		spListaClases.setOnItemSelectedListener(this);
		btnListaAlumnos.setOnClickListener(this);
		
		new busquedaListaInstituciones().execute(idProfe+"",key);
		
	}
	@Override
	public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2,
			long arg3)
	{
		Spinner spiner = (Spinner)arg0;
		if(spiner.getTag().toString().compareToIgnoreCase("spinerInstitucion")==0&&arg2!=0)
		{
			new busquedaListaCurso().execute(listainstituciones.get(arg2).getIdInstitucion()+"",idProfe+"",key);
		}
		else if(spiner.getTag().toString().compareToIgnoreCase("spinerCursos")==0&&arg2!=0)
		{
			new busquedaListaUnidades().execute(listaCursos.get(arg2).getIdCurso()+"",idProfe+"",key);
		}
		else if(spiner.getTag().toString().compareToIgnoreCase("spinerUnidades")==0&&arg2!=0)
		{
			new busquedaListaClases().execute(listaUnidades.get(arg2).getIdUnidad()+"",key);
		}
		else if(spiner.getTag().toString().compareToIgnoreCase("spinerClases")==0)
		{
			indiceClase = arg2;
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
			ArrayAdapter<Institucion> listaEpinnerInstituciones = new ArrayAdapter<Institucion>(MenuPlanificacion.this, android.R.layout.simple_spinner_item, listainstituciones);
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
			ArrayAdapter<Cursos> listaEpinnerCursos = new ArrayAdapter<Cursos>(MenuPlanificacion.this, android.R.layout.simple_spinner_item, listaCursos);
			listaEpinnerCursos.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spListaCursos.setAdapter(listaEpinnerCursos);
			super.onPostExecute(result);
		}
	}
	public class busquedaListaUnidades extends AsyncTask<String, Void, ArrayList<Unidades>>
	{
		@Override
		protected void onPreExecute()
		{
			// TODO Auto-generated method stub
			super.onPreExecute();
		}

		@Override
		protected ArrayList<Unidades> doInBackground(String... arg0)
		{
			ControladoraListaUnidadesCursos controladoraListaUnidades = new ControladoraListaUnidadesCursos();
			ArrayList<Unidades> listaUnidades = controladoraListaUnidades.listarUnidadesCurso(Integer.parseInt(arg0[0]), Integer.parseInt(arg0[1]), arg0[2]);
			return listaUnidades;
		}

		@Override
		protected void onPostExecute(ArrayList<Unidades> result)
		{
			listaUnidades = result;
			ArrayAdapter<Unidades> listaEpinnerUnidades = new ArrayAdapter<Unidades>(MenuPlanificacion.this, android.R.layout.simple_spinner_item, listaUnidades);
			listaEpinnerUnidades.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spListaUnidades.setAdapter(listaEpinnerUnidades);
			super.onPostExecute(result);
		}
	}
	public class busquedaListaClases extends AsyncTask<String, Void, ArrayList<Clases>>
	{
		@Override
		protected void onPreExecute()
		{
			// TODO Auto-generated method stub
			super.onPreExecute();
		}

		@Override
		protected ArrayList<Clases> doInBackground(String... arg0)
		{
			ControladoraListaUnidadesCursos controladoraListaUnidades = new ControladoraListaUnidadesCursos();
			ArrayList<Clases> listaUnidades = controladoraListaUnidades.listarClasesUnidad(Integer.parseInt(arg0[0]), arg0[1]);
			return listaUnidades;
		}

		@Override
		protected void onPostExecute(ArrayList<Clases> result)
		{
			listaClases = result;
			ArrayAdapter<Clases> listaEpinnerUnidades = new ArrayAdapter<Clases>(MenuPlanificacion.this, android.R.layout.simple_spinner_item, listaClases);
			listaEpinnerUnidades.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spListaClases.setAdapter(listaEpinnerUnidades);
			super.onPostExecute(result);
		}
	}
	@Override
	public void onClick(View v)
	{
		if(indiceClase!=0)
		{		
			Intent i = new Intent("cl.profesores.sapp.ResumenClase");
			i.putExtra("objetivo", listaClases.get(indiceClase).getObjetivo());
			i.putExtra("inicio", listaClases.get(indiceClase).getInicio());
			i.putExtra("desarrollo", listaClases.get(indiceClase).getDesarrollo());
			i.putExtra("termino", listaClases.get(indiceClase).getCierre());
			i.putExtra("recursoInicio", listaClases.get(indiceClase).getRecursoInicio());
			i.putExtra("recursoDesarrollo", listaClases.get(indiceClase).getRecursoDesarrollo());
			i.putExtra("recursoTermino", listaClases.get(indiceClase).getRecursoCierre());
			i.putExtra("duracion", listaClases.get(indiceClase).getDuracion());
			startActivity(i);
		}
		else
		{
			Toast.makeText(this, "Debe tener una clase seleccionada", Toast.LENGTH_SHORT).show();
		}
	}

	

}
