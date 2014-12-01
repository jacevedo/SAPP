package cl.profesores.entidades;

public class Alumnos
{
	private int idAlumno;
	private int idCurso;
	private String nombre;
	private String appPaterno;
	private String appMaterno;
	private String rut;
	private String telefono;
	private String correo;
	
	public Alumnos(int idAlumno, int idCurso, String nombre, String appPaterno,String appMaterno, String rut, String telefono, String correo)
	{
		this.idAlumno = idAlumno;
		this.idCurso = idCurso;
		this.nombre = nombre;
		this.appPaterno = appPaterno;
		this.appMaterno = appMaterno;
		this.rut = rut;
		this.telefono = telefono;
		this.correo = correo;
	}

	public int getIdAlumno()
	{
		return idAlumno;
	}

	public void setIdAlumno(int idAlumno)
	{
		this.idAlumno = idAlumno;
	}

	public int getIdCurso()
	{
		return idCurso;
	}

	public void setIdCurso(int idCurso)
	{
		this.idCurso = idCurso;
	}

	public String getNombre()
	{
		return nombre;
	}

	public void setNombre(String nombre)
	{
		this.nombre = nombre;
	}

	public String getAppPaterno()
	{
		return appPaterno;
	}

	public void setAppPaterno(String appPaterno)
	{
		this.appPaterno = appPaterno;
	}

	public String getAppMaterno()
	{
		return appMaterno;
	}

	public void setAppMaterno(String appMaterno)
	{
		this.appMaterno = appMaterno;
	}

	public String getRut()
	{
		return rut;
	}

	public void setRut(String rut)
	{
		this.rut = rut;
	}

	public String getTelefono()
	{
		return telefono;
	}

	public void setTelefono(String telefono)
	{
		this.telefono = telefono;
	}

	public String getCorreo()
	{
		return correo;
	}

	public void setCorreo(String correo)
	{
		this.correo = correo;
	}
	
	
}
