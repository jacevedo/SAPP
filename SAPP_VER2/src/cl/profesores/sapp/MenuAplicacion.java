package cl.profesores.sapp;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class MenuAplicacion extends Activity implements OnClickListener
{
	private Button btnNotas;
	private Button btnLista;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState)
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.menu_aplicacion);
		inicializarElementos();
	}

	private void inicializarElementos()
	{
		btnNotas = (Button) findViewById(R.id.btnNotas);
		btnLista = (Button)findViewById(R.id.btnLista);
		
		btnNotas.setOnClickListener(this);
		btnLista.setOnClickListener(this);
		
	}



	@Override
	public void onClick(View v)
	{
		Intent i;
		switch (v.getId())
		{
			case R.id.btnNotas:
				i = new Intent("cl.profesores.sapp.MenuPlanificacion");
				startActivity(i);
				break;
			case R.id.btnLista:
				i = new Intent("cl.profesores.sapp.Lista");
				startActivity(i);
				break;
		}
		
	}

}
