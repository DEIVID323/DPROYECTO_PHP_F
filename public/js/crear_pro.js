
// Form validation and preview functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Form preview update
    const nombreInput = document.getElementById('Nombre');
    const referenciaInput = document.getElementById('Referencia');
    const precioInput = document.getElementById('Precio');
    const categoriaInput = document.getElementById('Categoria');
    const previewContent = document.getElementById('previewContent');

    function updatePreview() {
        const nombre = nombreInput.value || 'Nombre del producto';
        const referencia = referenciaInput.value || 'REF-000';
        const precio = precioInput.value || '0.00';
        const categoria = categoriaInput.options[categoriaInput.selectedIndex].text || 'Sin categoría';

        previewContent.innerHTML = `
            <h6 class="mb-1 text-dark fw-semibold">${nombre}</h6>
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <small class="text-muted">
                    <i class="bi bi-upc me-1"></i>
                    ${referencia}
                </small>
                <small class="text-muted">
                    <i class="bi bi-currency-dollar me-1"></i>
                    $${precio}
                </small>
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2 py-1">
                    <i class="bi bi-tag me-1"></i>
                    ${categoria}
                </span>
            </div>
        `;
    }

    // Add event listeners for real-time preview
    [nombreInput, referenciaInput, precioInput, categoriaInput].forEach(input => {
        input.addEventListener('input', updatePreview);
        input.addEventListener('change', updatePreview);
    });

    // Form validation
    const form = document.getElementById('productoForm');
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});

function resetForm() {
    if (confirm('¿Está seguro de que desea limpiar todos los campos?')) {
        document.getElementById('productoForm').reset();
        document.getElementById('previewContent').innerHTML = `
            <h6 class="mb-1 text-muted">Nombre del producto aparecerá aquí</h6>
            <small class="text-muted">Complete el formulario para ver la vista previa</small>
        `;
    }
}

// Auto-generate reference code based on name (optional)
document.getElementById('Nombre').addEventListener('blur', function() {
    const referenciaInput = document.getElementById('Referencia');
    if (!referenciaInput.value && this.value) {
        const cleanName = this.value.replace(/[^a-zA-Z0-9]/g, '').substring(0, 6).toUpperCase();
        const randomNum = Math.floor(Math.random() * 999) + 1;
        referenciaInput.value = `${cleanName}-${randomNum.toString().padStart(3, '0')}`;
    }
});