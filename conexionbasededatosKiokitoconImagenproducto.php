<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELIGOLOS</title>
    <link rel="stylesheet" href="estilos.css">
   </head>
<body>
<div id="container">
<?php
// Datos de conexión a la base de datos
//echo "<h1 style ='color:red'> Prueba de conexión de PHP con MySql </h1>";
$host = 'localhost'; // Cambia esto si tu base de datos está en un servidor remoto
$usuario = 'root';
$contrasena = '12345678';
$base_de_datos = 'Kioskito';


// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los elementos de la tabla productos
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en forma de lista
    echo "<header><h1>Lista de Productos</h1></header>";
    echo "<nav>
        <ul>
            <button class='button'><a href='primero.html'>Inicio</a></button>
        </ul>
       </nav>";
    echo "<section id='content'>";
    echo "<table>"; 
        echo "<tr>";
              echo "<td> Descripción del Producto</td>";
              echo "<td> Precio del Producto</td>";
              echo "<td> Imagen   </td>";
        echo "</tr>";
        echo "<tr>";
            while ($fila = $resultado->fetch_assoc()) {
                echo "<td>" . $fila['Descripcion'] . "</td> <td> $" . $fila['PrecioUnitac']."<td> <img width='50' src=".$fila['Foto']."></td>";
        echo "</tr>";
            }
    echo "</table>";
    echo "</section>";
    echo "<aside>
            <h4>Buscá nuestros Productos aquí</h4>
            <form>
                <input type='text'>
                <input type='submit' value='Buscar'/>
            </form>
        </aside>";
} else {
    echo "No se encontraron productos en la base de datos.";
}

// Cerrar la conexión
$conexion->close();
?>
  <footer>
       <h5>Sitio Realizado por Cecilia Ramos</h5>
    </footer>
</div>
  
</body>
</html>