include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de Viajes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a Nuestro Sitio de Viajes</h1>
        <button id="loginBtn" style="position: absolute; top: 10px; right: 10px;">Login Usuario</button>
    </header>

    <!-- Modal de Login -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span id="closeLogin" class="close">&times;</span>
            <h2>Iniciar Sesión</h2>
          <form action="login.php" method="POST">
            <input type="email" placeholder="Correo Electrónico" id="loginEmail" name="correo" required>
            <input type="password" placeholder="Contraseña" id="loginPassword" name="contrasena" required>
            <button id="loginSubmit">Iniciar Sesión</button>
          </form>
            <p>No tienes una cuenta? <a href="#" id="createAccountLink">Crear cuenta</a></p>

        </div>
    </div>

    <!-- Modal de Crear Cuenta -->
    <div id="registerModal"  class="modal">
        <div class="modal-content">
            <span id="closeRegister" class="close">&times;</span>
            <h2>Crear Cuenta</h2>
          <form action="registro.php" method="POST">
            <input type="text" placeholder="Nombre" id="registerName" name="nombre" required>
            <input type="email" placeholder="Correo Electrónico" id="registerEmail" name="correo" required>
            <input type="password" placeholder="Contraseña" id="registerPassword" name="contrasena" required>
            <button id="registerSubmit">Registrarse</button>
          </form>
        </div>
  </div>

        <!-- Información de Vuelos -->
        <div class="flight-info">
            <!-- Ejemplo de vuelo 1 -->
            <div class="city-info">
                <img src="R (1).jpeg" alt="Ciudad 1">
                <p>Ciudad: Ciudad 1</p>
                <p>Hora de salida: 10:00 AM</p>
                <p>Hora de llegada: 2:00 PM</p>
                <button class="reserveBtn hidden">Reservar</button>
                <button class="cancelBtn hidden">Cancelar Reserva</button>
            </div>

            <!-- Ejemplo de vuelo 2 -->
            <div class="city-info">
                <img src="R.jpeg" alt="Ciudad 2">
                <p>Ciudad: Ciudad 2</p>
                <p>Hora de salida: 11:00 AM</p>
                <p>Hora de llegada: 3:30 PM</p>
                <button class="reserveBtn hidden">Reservar</button>
                <button class="cancelBtn hidden">Cancelar Reserva</button>
            </div>

            <!-- Ejemplo de vuelo 3 -->
            <div class="city-info">
                <img src="OIP.jpeg" alt="Ciudad 3">
                <p>Ciudad: Ciudad 3</p>
                <p>Hora de salida: 1:00 PM</p>
                <p>Hora de llegada: 5:00 PM</p>
                <button class="reserveBtn hidden">Reservar</button>
                <button class="cancelBtn hidden">Cancelar Reserva</button>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
