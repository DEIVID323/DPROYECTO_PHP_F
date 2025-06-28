// Confirmar eliminación de usuario
function confirmUserDelete(userId, userName) {
    console.log('confirmUserDelete llamado con:', userId, userName);
    
    const deleteUserNameEl = document.getElementById('deleteUserName');
    if (!deleteUserNameEl) {
        console.error('Elemento deleteUserName no encontrado');
        return;
    }
    deleteUserNameEl.textContent = userName;

    const confirmBtn = document.getElementById('confirmDeleteBtn');
    if (!confirmBtn) {
        console.error('Elemento confirmDeleteBtn no encontrado');
        return;
    }
    confirmBtn.href = '<?= base_url('usuarios/eliminar/') ?>' + userId;

    const modalElement = document.getElementById('deleteModal');
    if (!modalElement) {
        console.error('Modal deleteModal no encontrado');
        return;
    }

    try {
        const deleteModal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',  // que no se cierre al hacer clic fuera
            keyboard: false
        });
        deleteModal.show();
        console.log('Modal de usuario mostrado correctamente');
    } catch (error) {
        console.error('Error al mostrar modal usuario:', error);
        alert('Error al mostrar el modal: ' + error.message);
    }
}
