
<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "1234";
$base_datos = "sitio_viajes";

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Si quieres mostrar un mensaje de conexión exitosa (opcional)
// echo "Conexión exitosa";
?>

