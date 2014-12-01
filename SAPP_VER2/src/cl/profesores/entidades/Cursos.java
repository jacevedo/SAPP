package cl.profesores.entidades;

public class Cursos
{
	private int idCurso;
	private int idInstitucion;
	private int idProfesor;
	private String nivel;
	private int numero;
	private String letra;
	
	public Cursos(int idCurso, int idInstitucion, int idProfesor, String nivel,
			int numero, String letra)
	{
		this.idCurso = idCurso;
		this.idInstitucion = idInstitucion;
		this.idProfesor = idProfesor;
		this.nivel = nivel;
		this.numero = numero;
		this.letra = letra;
	}

	public int getIdCurso()
	{
		return idCurso;
	}

	public void setIdCurso(int idCurso)
	{
		this.idCurso = idCurso;
	}

	public int getIdInstitucion()
	{
		return idInstitucion;
	}

	public void setIdInstitucion(int idInstitucion)
	{
		this.idInstitucion = idInstitucion;
	}

	public int getIdProfesor()
	{
		return idProfesor;
	}

	public void setIdProfesor(int idProfesor)
	{
		this.idProfesor = idProfesor;
	}

	public String getNivel()
	{
		return nivel;
	}

	public void setNivel(String nivel)
	{
		this.nivel = nivel;
	}

	public int getNumero()
	{
		return numero;
	}

	public void setNumero(int numero)
	{
		this.numero = numero;
	}

	public String getLetra()
	{
		return letra;
	}

	public void setLetra(String letra)
	{
		this.letra = letra;
	}

	@Override
	public String toString()
	{
		// TODO Auto-generated method stub
		return idCurso + ".- " + numero+"-"+letra;
	}	
	
}
