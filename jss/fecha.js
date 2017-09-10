<!--

// Array of day names
var dayNames = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");

var monthNames = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                           "Agosto","Septiembre","Octubre","Noviembre","Diciembre");

var dt = new Date();
var y  = dt.getYear();

// Y2K compliant
if (y < 1000) y +=1900;

document.write(dayNames[dt.getDay()] + " " + dt.getDate() + " de " + monthNames[dt.getMonth()] + " del " + y);
// -->
