package cl.profesores.entidades;

public class Institucion
{
	private int idInstitucion;
	private String nombre;
	private String direccion;
	private String descripcion;
	private String telefono;
	private String correo;
	private String contacto;
	
	public Institucion(int idInstitucion, String nombre, String direccion,
			String descripcion, String telefono, String correo, String contacto)
	{
		this.idInstitucion = idInstitucion;
		this.nombre = nombre;
		this.direccion = direccion;
		this.descripcion = descripcion;
		this.telefono = telefono;
		this.correo = correo;
		this.contacto = contacto;
	}

	public int getIdInstitucion()
	{
		return idInstitucion;
	}

	public void setIdInstitucion(int idInstitucion)
	{
		this.idInstitucion = idInstitucion;
	}

	public String getNombre()
	{
		return nombre;
	}

	public void setNombre(String nombre)
	{
		this.nombre = nombre;
	}

	public String getDireccion()
	{
		return direccion;
	}

	public void setDireccion(String direccion)
	{
		this.direccion = direccion;
	}

	public String getDescripcion()
	{
		return descripcion;
	}

	public void setDescripcion(String descripcion)
	{
		this.descripcion = descripcion;
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

	public String getContacto()
	{
		return contacto;
	}

	public void setContacto(String contacto)
	{
		this.contacto = contacto;
	}

	@Override
	public String toString()
	{
		
		return idInstitucion+"-"+nombre;
	}
	
	
}
