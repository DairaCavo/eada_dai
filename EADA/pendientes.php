<?php
session_start();
include('conexion.php'); // Incluir el archivo de conexión

// Consulta SQL para obtener los datos
$sql = "SELECT * FROM tickets"; // Cambia "nombre_tabla" por tu tabla específica

// Verificar si hay resultados y mostrarlos en una tabla
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    
    // Mostrar los nombres de las columnas como encabezado
    while ($field_info = $result->fetch_field()) {
        echo "<th>" . $field_info->name . "</th>";
    }
    echo "</tr>";
    
    // Mostrar cada fila de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos en la tabla.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
