package cl.profesores.entidades;

public class Clases
{
	private int idClase;
	private int idUnidad;
	private String objetivo;
	private int duracion;
	private String contenidoConceptual;
	private String contenidoProcidemental;
	private String contenidoActitudinal;
	private String inicio;
	private String desarrollo;
	private String cierre;
	private String tipoEvaluacion;
	private String instrumentoEvaluacion;
	private String recursoInicio;
	private String recursoDesarrollo;
	private String recursoCierre;
	public Clases(int idClase, int idUnidad, String objetivo, int duracion,
			String contenidoConceptual, String contenidoProcidemental,
			String contenidoActitudinal, String inicio, String desarrollo,
			String cierre, String tipoEvaluacion, String instrumentoEvaluacion,
			String recursoInicio, String recursoDesarrollo, String recursoCierre)
	{
		super();
		this.idClase = idClase;
		this.idUnidad = idUnidad;
		this.objetivo = objetivo;
		this.duracion = duracion;
		this.contenidoConceptual = contenidoConceptual;
		this.contenidoProcidemental = contenidoProcidemental;
		this.contenidoActitudinal = contenidoActitudinal;
		this.inicio = inicio;
		this.desarrollo = desarrollo;
		this.cierre = cierre;
		this.tipoEvaluacion = tipoEvaluacion;
		this.instrumentoEvaluacion = instrumentoEvaluacion;
		this.recursoInicio = recursoInicio;
		this.recursoDesarrollo = recursoDesarrollo;
		this.recursoCierre = recursoCierre;
	}
	public int getIdClase()
	{
		return idClase;
	}
	public void setIdClase(int idClase)
	{
		this.idClase = idClase;
	}
	public int getIdUnidad()
	{
		return idUnidad;
	}
	public void setIdUnidad(int idUnidad)
	{
		this.idUnidad = idUnidad;
	}
	public String getObjetivo()
	{
		return objetivo;
	}
	public void setObjetivo(String objetivo)
	{
		this.objetivo = objetivo;
	}
	public int getDuracion()
	{
		return duracion;
	}
	public void setDuracion(int duracion)
	{
		this.duracion = duracion;
	}
	public String getContenidoConceptual()
	{
		return contenidoConceptual;
	}
	public void setContenidoConceptual(String contenidoConceptual)
	{
		this.contenidoConceptual = contenidoConceptual;
	}
	public String getContenidoProcidemental()
	{
		return contenidoProcidemental;
	}
	public void setContenidoProcidemental(String contenidoProcidemental)
	{
		this.contenidoProcidemental = contenidoProcidemental;
	}
	public String getContenidoActitudinal()
	{
		return contenidoActitudinal;
	}
	public void setContenidoActitudinal(String contenidoActitudinal)
	{
		this.contenidoActitudinal = contenidoActitudinal;
	}
	public String getInicio()
	{
		return inicio;
	}
	public void setInicio(String inicio)
	{
		this.inicio = inicio;
	}
	public String getDesarrollo()
	{
		return desarrollo;
	}
	public void setDesarrollo(String desarrollo)
	{
		this.desarrollo = desarrollo;
	}
	public String getCierre()
	{
		return cierre;
	}
	public void setCierre(String cierre)
	{
		this.cierre = cierre;
	}
	public String getTipoEvaluacion()
	{
		return tipoEvaluacion;
	}
	public void setTipoEvaluacion(String tipoEvaluacion)
	{
		this.tipoEvaluacion = tipoEvaluacion;
	}
	public String getInstrumentoEvaluacion()
	{
		return instrumentoEvaluacion;
	}
	public void setInstrumentoEvaluacion(String instrumentoEvaluacion)
	{
		this.instrumentoEvaluacion = instrumentoEvaluacion;
	}
	public String getRecursoInicio()
	{
		return recursoInicio;
	}
	public void setRecursoInicio(String recursoInicio)
	{
		this.recursoInicio = recursoInicio;
	}
	public String getRecursoDesarrollo()
	{
		return recursoDesarrollo;
	}
	public void setRecursoDesarrollo(String recursoDesarrollo)
	{
		this.recursoDesarrollo = recursoDesarrollo;
	}
	public String getRecursoCierre()
	{
		return recursoCierre;
	}
	public void setRecursoCierre(String recursoCierre)
	{
		this.recursoCierre = recursoCierre;
	}
	
	@Override
	public String toString()
	{
		// TODO Auto-generated method stub
		return objetivo;
	}	
}
