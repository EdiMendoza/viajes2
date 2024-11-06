document.getElementById('logoutBtn').addEventListener('click', () => {
    window.location.href = 'index.php'; // Redirige a la página principal
});

document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('addBtn');
    const addTripModal = document.getElementById('addTripModal');
    const usersBtn = document.getElementById('usersBtn'); // Botón de usuarios
    const usersModal = document.getElementById('usersModal'); // Modal de usuarios
    const editBtns = document.querySelectorAll('.editBtn');
    const closeButtons = document.querySelectorAll('.close');

    // Muestra el modal de agregar viaje al hacer clic en el botón Agregar
    addBtn.addEventListener('click', () => {
        addTripModal.classList.remove('hidden');
    });

    // Muestra el formulario de modificación al hacer clic en el botón Modificar
    editBtns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const editForm = e.target.closest('.city-info').querySelector('.edit-form');
            // Ocultar todos los demás formularios
            document.querySelectorAll('.edit-form').forEach(form => form.classList.add('hidden'));
            // Mostrar el formulario del viaje seleccionado
            editForm.classList.toggle('hidden');
        });
    });

    // Cerrar el modal o formulario al hacer clic en la "X"
    closeButtons.forEach((closeBtn) => {
        closeBtn.addEventListener('click', () => {
            const modal = closeBtn.closest('.modal');
            if (modal) {
                modal.classList.add('hidden'); // Cerrar el modal
            }
        });
    });
 window.addEventListener('click', (event) => {
        if (event.target === addTripModal) {
            addTripModal.classList.add('hidden');
        }
    });

    // Funcionalidad para los botones de Eliminar
    document.querySelectorAll('.deleteBtn').forEach((btn) => {
        btn.addEventListener('click', () => {
            if (confirm('¿Estás seguro de que deseas eliminar este viaje?')) {
                btn.closest('.city-info').remove(); // Elimina el elemento de la interfaz
            }
        });
    });

    // Funcionalidad para el botón "Usuarios" y mostrar el modal de usuarios
    usersBtn.addEventListener('click', () => {
        usersModal.classList.remove('hidden'); // Mostrar el modal de usuarios
    });

    // Cerrar el modal de usuarios al hacer clic en la "X"
    const closeUsersModal = usersModal.querySelector('.close');
    closeUsersModal.addEventListener('click', () => {
        usersModal.classList.add('hidden'); // Cerrar el modal de usuarios
    });

    // Funcionalidad para los botones de Eliminar en el modal de usuarios
    document.querySelectorAll('.deleteUserBtn').forEach((btn) => {
        btn.addEventListener('click', () => {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                btn.closest('.user-item').remove(); // Eliminar el usuario de la lista
            }
        });
    });
    // Funcionalidad para los botones de Editar en el modal de usuarios
    document.querySelectorAll('.editUserBtn').forEach((btn) => {

        btn.addEventListener('click', (e) => {
            const userItem = e.target.closest('.user-item');
            // Aquí se puede agregar la lógica para editar los usuarios
            const userName = userItem.querySelector('p').innerText;
            alert(`Editando usuario: ${userName}`); // Ejemplo de alerta
        });
    });
});


