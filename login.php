<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $user = mysqli_fetch_assoc($resultado);

        // Verifica la contraseña
        if (password_verify($contrasena, $user['contrasena'])) {
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            // Redirige según el rol
            if ($user['rol'] == 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            echo "<script>
            alert('contraseña incorrecta');
            window.location.href = 'index.php'; // Redirige al inicio
          </script>";
        }
    } else {
        echo "<script>
            alert('usuario no encontrado');
            window.location.href = 'index.php'; // Redirige al inicio
          </script>";

    }
}

mysqli_close($conexion);
?>
