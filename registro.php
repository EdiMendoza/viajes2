<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);


    $query = "INSERT INTO usuarios(nombre, correo, contrasena, rol) VALUES ('$nombre', '$correo', '$contrasena', 'usuario')";

    if (mysqli_query($conexion, $query)) {
        echo "<script>
            alert('Registro exitoso');
            window.location.href = 'index.php'; // Redirige al inicio
          </script>";
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>
