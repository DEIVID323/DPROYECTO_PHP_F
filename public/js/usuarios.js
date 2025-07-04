
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('#usersTable tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// View toggle
document.getElementById('viewTable').addEventListener('click', function() {
    document.getElementById('tableView').classList.remove('d-none');
    document.getElementById('gridView').classList.add('d-none');
    this.classList.add('active');
    document.getElementById('viewGrid').classList.remove('active');
});

document.getElementById('viewGrid').addEventListener('click', function() {
    document.getElementById('gridView').classList.remove('d-none');
    document.getElementById('tableView').classList.add('d-none');
    this.classList.add('active');
    document.getElementById('viewTable').classList.remove('active');
});

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.user-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

// Individual checkbox functionality
document.querySelectorAll('.user-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActions);
});

function updateBulkActions() {
    const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    
    if (selectedCheckboxes.length > 0) {
        bulkActions.classList.remove('d-none');
        selectedCount.textContent = selectedCheckboxes.length;
    } else {
        bulkActions.classList.add('d-none');
    }
}

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('roleFilter').value = '';
    document.getElementById('statusFilter').value = '';
    
    // Show all rows
    const rows = document.querySelectorAll('#usersTable tbody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
}

// Delete confirmation
function confirmDelete(userId, userName) {
    // Mostrar el nombre del usuario a eliminar
    document.getElementById('deleteUserName').textContent = userName;
    
    // Mostrar el modal de confirmación
    const modalElement = document.getElementById('deleteModal');
    const deleteModal = new bootstrap.Modal(modalElement, {
        backdrop: false,
        keyboard: true
    });
    deleteModal.show();

    // Asignar el evento de eliminación al botón de confirmación
    document.getElementById('confirmDeleteBtn').onclick = function() {
        // Realizar la solicitud AJAX para eliminar el usuario
        deleteUser(userId);
    };
}
function deleteUser(userId) {
    // Cerrar el modal ANTES de hacer el fetch
    const modalElement = document.getElementById('deleteModal');
    const modal = bootstrap.Modal.getInstance(modalElement);
    if (modal) {
        modal.hide();
    }
    
    fetch(BASE_URL + 'usuarios/eliminar/' + userId, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => { 
        if (data.success) {
            Swal.fire({
                toast: true,
                icon: 'success',
                position: 'top-end',
                iconColor: '#0dcaf0',
                title: 'Usuario eliminado',
                showConfirmButton: false,
                timer: 9000,
                timerProgressBar: true,
                background: '#000',
                color: '#fff'
            });

            cargarContenido(window.location.href + '/usuarios');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error De Eliminacion',
                text: 'Hubo un error al intentar eliminar el usuario.',
                confirmButtonColor: '#0dcaf0',
                background: '#000',
                color: '#fff'
            });
        }
    });
}
// Bulk delete
function bulkDelete() {
    const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
    if (selectedCheckboxes.length === 0) return;
    
    if (confirm(`¿Estás seguro de eliminar ${selectedCheckboxes.length} usuarios seleccionados?`)) {
        // Here you would implement the bulk delete functionality
        console.log('Bulk delete:', Array.from(selectedCheckboxes).map(cb => cb.value));
    }
}
