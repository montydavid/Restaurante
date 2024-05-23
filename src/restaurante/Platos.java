
package restaurante;


public class Platos {
    String nombre;
    double precioProduccion;
    double precioVenta;

    public Platos(String nombre, double precioProduccion, double precioVenta) {
        this.nombre = nombre;
        this.precioProduccion = precioProduccion;
        this.precioVenta = precioVenta;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public double getPrecioProduccion() {
        return precioProduccion;
    }

    public void setPrecioProduccion(double precioProduccion) {
        this.precioProduccion = precioProduccion;
    }

    public double getPrecioVenta() {
        return precioVenta;
    }

    public void setPrecioVenta(double precioVenta) {
        this.precioVenta = precioVenta;
    }
    
    
}
