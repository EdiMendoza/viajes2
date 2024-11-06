<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta para obtener el usuario con el correo proporcionado
    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $user = mysqli_fetch_assoc($resultado);

        // Verifica la contraseña
        if (password_verify($contrasena, $user['contrasena'])) {
            // Guarda el nombre y rol en la sesión
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
            // Contraseña incorrecta
            echo "<script>
                alert('Contraseña incorrecta');
                window.location.href = 'index.php'; // Redirige al inicio
              </script>";
              }
    } else {
        // Usuario no encontrado
        echo "<script>
            alert('Usuario no encontrado');
            window.location.href = 'index.php'; // Redirige al inicio
          </script>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conexion);
?>


