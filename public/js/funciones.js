function cargarContenido(url) {
    // Mostrar indicador de carga
    const contenedor = document.getElementById('Seccontenido');
    contenedor.innerHTML = '<div class="text-center mt-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>';
   
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar el contenido');
            }
            return response.text();
        })
        .then(data => {
            const extension = url.split('.').pop().toLowerCase();


            if (['png', 'jpg', 'jpeg', 'gif', 'webp'].includes(extension)) {
                contenedor.innerHTML = `
                    <div class="text-center mt-5">
                        <img src="${url}" alt="Imagen cargada" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    </div>`;
            } else {
                contenedor.innerHTML = data;
               
                // Ejecutar scripts que puedan estar en el contenido cargado
                const scripts = contenedor.querySelectorAll('script');
                scripts.forEach(script => {
                    const newScript = document.createElement('script');
                    if (script.src) {
                        newScript.src = script.src;
                    } else {
                        newScript.textContent = script.textContent;
                    }
                    document.head.appendChild(newScript);
                });
            }
        })
        .catch(error => {
            console.error('Error al cargar contenido:', error);
            contenedor.innerHTML = 
                <div class="alert alert-danger text-center mt-5">
                    <h4>Error al cargar el contenido</h4>
                    <p>Por favor, intenta nuevamente o contacta al administrador.</p>
                </div>;
        });
}
