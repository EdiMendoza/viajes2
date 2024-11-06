<?php
include 'conexion.php'; // Incluye la conexión a la base de datos

// Consulta para obtener los usuarios
$query = "SELECT id, nombre, correo, rol FROM usuarios";
$result = mysqli_query($conexion, $query);

// Array para almacenar los usuarios
$usuarios = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $usuarios[] = $row;
    }
}

// Devolver los usuarios como JSON
echo json_encode($usuarios);

// Cerrar la conexión
mysqli_close($conexion);
?>

