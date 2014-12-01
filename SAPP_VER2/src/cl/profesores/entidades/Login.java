package cl.profesores.entidades;

public class Login
{
	private int idProfesor;
	private String key;
	
	public Login(int idProfesor, String key)
	{
		this.idProfesor = idProfesor;
		this.key = key;
	}
	public int getIdProfesor()
	{
		return idProfesor;
	}
	public void setIdProfesor(int idProfesor)
	{
		this.idProfesor = idProfesor;
	}
	public String getKey()
	{
		return key;
	}
	public void setKey(String key)
	{
		this.key = key;
	}
	
}
