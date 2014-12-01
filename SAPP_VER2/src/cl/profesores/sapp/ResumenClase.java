package cl.profesores.sapp;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.widget.TextView;

public class ResumenClase extends Activity
{

	private TextView txtObjetivo;
	private TextView txtInicio;
	private TextView txtDesarrollo;
	private TextView txtTermino;
	private TextView txtRecursoInicio;
	private TextView txtRecursoDesarrollo;
	private TextView txtRecursoTermino;
	@Override
	protected void onCreate(Bundle savedInstanceState)
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_resumen_clase);
		inicializarElementos();
	}

	private void inicializarElementos()
	{
		Bundle bunle = getIntent().getExtras();
		String objetivo = bunle.getString("objetivo");
		String inicio = bunle.getString("inicio");
		String desarrollo = bunle.getString("desarrollo");
		String termino = bunle.getString("termino");
		String recursoInicio = bunle.getString("recursoInicio");
		String recursoDesarrollo = bunle.getString("recursoDesarrollo");
		String recursoTermino = bunle.getString("recursoTermino");
		int duracion = bunle.getInt("duracion");
		txtObjetivo = (TextView)findViewById(R.id.txtObjetivo);
		txtInicio = (TextView)findViewById(R.id.txtInicio);
		txtDesarrollo = (TextView)findViewById(R.id.txtDesarrollo);
		txtTermino = (TextView)findViewById(R.id.txtFin);
		txtRecursoInicio = (TextView)findViewById(R.id.txtMaterialInicio);
		txtRecursoDesarrollo = (TextView)findViewById(R.id.txtMaterialDesarrollo);
		txtRecursoTermino = (TextView)findViewById(R.id.txtMaterialTermino);
		
		txtObjetivo.setText(objetivo+" "+ duracion+" min");
		txtInicio.setText(inicio);
		txtDesarrollo.setText(desarrollo);
		txtTermino.setText(termino);
		txtRecursoInicio.setText(recursoInicio);
		txtRecursoDesarrollo.setText(recursoDesarrollo);
		txtRecursoTermino.setText(recursoTermino);
		
		
		
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu)
	{
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.resumen_clase, menu);
		return true;
	}

}
