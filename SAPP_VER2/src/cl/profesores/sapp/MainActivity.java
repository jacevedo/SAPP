package cl.profesores.sapp;

import cl.profesores.controladoras.ControladoraLogin;
import cl.profesores.entidades.Login;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends Activity implements OnClickListener
{
	private EditText txtUsuario;
	private EditText txtPass;
	private Button btnIngresar;
	@Override
	protected void onCreate(Bundle savedInstanceState)
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		inicializarElementos();
	}

	private void inicializarElementos()
	{
		txtUsuario = (EditText)findViewById(R.id.txtUsuario);
		txtPass = (EditText)findViewById(R.id.txtPass);
		btnIngresar = (Button)findViewById(R.id.btnLogin);
		btnIngresar.setOnClickListener(this);
		
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu)
	{
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public void onClick(View v)
	{
		String usuario = txtUsuario.getText().toString();
		String pass = txtPass.getText().toString();
		switch (v.getId())
		{
			case R.id.btnLogin:
				new LoginAsincrono().execute(usuario,pass);
			break;
		}
		
	}
	class LoginAsincrono extends AsyncTask<String, Void, Login>
	{
		@Override
		protected void onPreExecute()
		{
			// TODO Auto-generated method stub
			super.onPreExecute();
		}
		
		@Override
		protected Login doInBackground(String... params)
		{
			ControladoraLogin controlLogin = new ControladoraLogin();
			Login resultado = controlLogin.loginKey(params[0], params[1]);
			return resultado;
		}

		@Override
		protected void onPostExecute(Login result)
		{
			SharedPreferences preferencias =  getSharedPreferences("SAPP",Context.MODE_PRIVATE);
			SharedPreferences.Editor editor = preferencias.edit();
			editor.putString("key", result.getKey());
			editor.putInt("idProfe", result.getIdProfesor());
			editor.commit();
			Intent i = new Intent("cl.profesores.sapp.MenuAplicacion");
            startActivity(i);
            finish();
			super.onPostExecute(result);
		}
	}

}
