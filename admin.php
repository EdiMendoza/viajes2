<?php
session_start();

// Verificar si el usuario ha iniciado sesión y si tiene el rol de 'admin'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    // Redirige a la página de inicio si no es administrador
    header("Location: index.php");
    exit();
}

// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Obtener los usuarios de la base de datos
$query = "SELECT id, nombre, correo, rol FROM usuarios";
$result = mysqli_query($conexion, $query);

// Array para almacenar los usuarios
$usuarios = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $usuarios[] = $row;
    }
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Sitio de Viajes</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
 <header>
        <h1>Panel de Administración</h1>
        <button id="logoutBtn">Cerrar Sesión</button>
        <button id="addBtn">Agregar</button>
        <!-- Nuevo botón de "Usuarios" -->
        <button id="usersBtn">Usuarios</button>
    </header>

    <!-- Contenido Principal -->
    <main>
        <div class="flight-info">
            <div class="city-info">
                <img src="R (1).jpeg" alt="Ciudad 1">
                <p>Ciudad: Ciudad 1</p>
                <p>Hora de salida: 10:00 AM</p>
                <p>Hora de llegada: 2:00 PM</p>
                <button class="editBtn">Modificar</button>
                <button class="deleteBtn">Eliminar</button>
                <!-- Formulario para modificar viaje (oculto por defecto) -->
                <div class="edit-form hidden">
                    <div class="modal">
                        <span class="close">&times;</span>
                        <h3>Modificar Información de Viaje</h3>
                        <form>
                            <input type="text" placeholder="Ciudad" class="edit-city" required>
                            <input type="time" placeholder="Hora de salida" class="edit-departure" required>
                            <input type="time" placeholder="Hora de llegada" class="edit-arrival" required>
                            <button type="button" class="saveEditBtn">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
             <!-- Repite para más ciudades -->
            <div class="city-info">
                <img src="R.jpeg" alt="Ciudad 2">
                <p>Ciudad: Ciudad 2</p>
                <p>Hora de salida: 1:00 PM</p>
                <p>Hora de llegada: 5:00 PM</p>
                <button class="editBtn">Modificar</button>
                <button class="deleteBtn">Eliminar</button>
                <div class="edit-form hidden">
                    <div class="modal">

                        <span class="close">&times;</span>
                        <h3>Modificar Información de Viaje</h3>
                        <form>
                            <input type="text" placeholder="Ciudad" class="edit-city" required>
                            <input type="time" placeholder="Hora de salida" class="edit-departure" required>
                            <input type="time" placeholder="Hora de llegada" class="edit-arrival" required>
                            <button type="button" class="saveEditBtn">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="city-info">
                <img src="OIP.jpeg" alt="Ciudad 3">
                <p>Ciudad: Ciudad 3</p>
                <p>Hora de salida: 3:00 PM</p>
                <p>Hora de llegada: 7:00 PM</p>
                <button class="editBtn">Modificar</button>
                <button class="deleteBtn">Eliminar</button>
                <div class="edit-form hidden">
                    <div class="modal">
                        <span class="close">&times;</span>
                        <h3>Modificar Información de Viaje</h3>
                        <form>
                            <input type="text" placeholder="Ciudad" class="edit-city" required>
                            <input type="time" placeholder="Hora de salida" class="edit-departure" required>
                            <input type="time" placeholder="Hora de llegada" class="edit-arrival" required>
                            <button type="button" class="saveEditBtn">Guardar Cambios</button>
                        </form>
                           </div>
                </div>
            </div>

        </div>

        <!-- Modal para agregar nuevo viaje -->
        <div id="addTripModal" class="modal hidden">
            <span class="close">&times;</span>
            <h2>Agregar Nuevo Viaje</h2>
            <form id="addTripForm">
                <input type="text" placeholder="Ciudad" id="tripCity" required>
                <input type="time" placeholder="Hora de salida" id="tripDeparture" required>
                <input type="time" placeholder="Hora de llegada" id="tripArrival" required>
                <input type="file" id="tripImage" accept="image/" required>
                <button type="submit">Agregar Viaje</button>
            </form>
        </div>

        <!-- Modal para mostrar usuarios -->
<div id="usersModal" class="modal hidden">
    <span class="close">&times;</span> <!-- Botón de cierre -->
    <h2>Usuarios Registrados</h2>
    <div id="usersList">
        <!-- Aquí se cargarían los usuarios dinámicamente -->
        <?php foreach ($usuarios as $usuario): ?>
            <div class="user-item" data-id="<?php echo $usuario['id']; ?>">
                <p><?php echo $usuario['nombre']; ?> - <?php echo $usuario['correo']; ?> (<?php echo $usuario['rol']; ?>)</p>
                <button class="editBtn" data-id="<?php echo $usuario['id']; ?>">Editar</button>
                <button class="deleteBtn" data-id="<?php echo $usuario['id']; ?>">Eliminar</button>
            </div>
        <?php endforeach; ?>
    </div>
  <!-- Formulario de edición de usuario (inicialmente oculto) -->
    <div class="edit-user-form hidden">
        <label for="editUserName">Nuevo nombre:</label>
        <input type="text" id="editUserName" name="userName" placeholder="Nombre del usuario">

        <label for="editUserEmail">Nuevo correo:</label>
        <input type="email" id="editUserEmail" name="userEmail" placeholder="Correo del usuario">

        <label for="editUserPassword">Nueva contraseña:</label>
        <input type="password" id="editUserPassword" name="userPassword" placeholder="Contraseña del usuario">

        <label for="editUserRole">Rol:</label>
        <select id="editUserRole" name="userRole">
            <option value="admin">Administrador</option>
            <option value="usuario">Usuario</option>
        </select>

        <button class="saveEditBtn">Guardar cambios</button>
    </div>
</div>

    </main>

    <script src="admin.js"></script>
</body>
</html>




