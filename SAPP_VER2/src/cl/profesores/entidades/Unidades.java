package cl.profesores.entidades;

public class Unidades
{
	private int idUnidad;
	private int idProfesor;
	private int idCurso;
	private String nombre;
	private int cantClases;
	private String fechaInicio;
	private String fechaTermino;
	
	public Unidades(int idUnidad, int idProfesor, int idCurso, String nombre,
			int cantClases, String fechaInicio, String fechaTermino)
	{
		this.idUnidad = idUnidad;
		this.idProfesor = idProfesor;
		this.idCurso = idCurso;
		this.nombre = nombre;
		this.cantClases = cantClases;
		this.fechaInicio = fechaInicio;
		this.fechaTermino = fechaTermino;
	}

	public int getIdUnidad()
	{
		return idUnidad;
	}

	public void setIdUnidad(int idUnidad)
	{
		this.idUnidad = idUnidad;
	}

	public int getIdProfesor()
	{
		return idProfesor;
	}

	public void setIdProfesor(int idProfesor)
	{
		this.idProfesor = idProfesor;
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

	public int getCantClases()
	{
		return cantClases;
	}

	public void setCantClases(int cantClases)
	{
		this.cantClases = cantClases;
	}

	public String getFechaInicio()
	{
		return fechaInicio;
	}

	public void setFechaInicio(String fechaInicio)
	{
		this.fechaInicio = fechaInicio;
	}

	public String getFechaTermino()
	{
		return fechaTermino;
	}

	public void setFechaTermino(String fechaTermino)
	{
		this.fechaTermino = fechaTermino;
	}

	@Override
	public String toString()
	{
		// TODO Auto-generated method stub
		return idUnidad+"- "+nombre;
	}
	
}
