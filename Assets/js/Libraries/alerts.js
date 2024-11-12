// Función para crear y mostrar alertas
function showAlert(type, title, message) {
    const alertContainer = document.getElementById('alert-container');
    const alertBox = document.createElement('div');

    alertBox.classList.add('alert', type);
    alertBox.innerHTML = `
        <span><strong>${title}</strong> - ${message}</span>
        <button onclick="closeAlert(this)">&times;</button>
    `;
    alertContainer.appendChild(alertBox);
    // Remover automáticamente la alerta después de 3 segundos
    setTimeout(() => alertBox.remove(), 3000);
}

// Función para crear y mostrar alertas de confirmación
function showConfirmAlert(title, message) {
    const alertContainer = document.getElementById('alert-container');
    const alertBox = document.createElement('div');

    alertBox.classList.add('alert', 'info');
    alertBox.innerHTML = `
        <span><strong>${title}</strong> - ${message}</span>
        <div class="confirm-buttons">
            <button onclick="confirmAction(true, this)">Aceptar</button>
            <button onclick="confirmAction(false, this)">Cancelar</button>
        </div>
    `;

    alertContainer.appendChild(alertBox);
}

// Función para cerrar la alerta
function closeAlert(button) {
    const alertBox = button.parentElement;
    alertBox.remove();
}

// Función de confirmación
function confirmAction(isConfirmed, button) {
    const alertBox = button.parentElement.parentElement;
    if (isConfirmed) {
        alert('Has aceptado la acción.');
    } else {
        alert('Has cancelado la acción.');
    }
    alertBox.remove();
}
