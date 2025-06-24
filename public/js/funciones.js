function cargarContenido(url) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar el contenido');
            }
            return response.text();
        })
        .then(data => {
            const extension = url.split('.').pop().toLowerCase();
            const contenedor = document.getElementById('Seccontenido');

            if (['png', 'jpg', 'jpeg', 'gif', 'webp'].includes(extension)) {
                contenedor.innerHTML = `<img src="${url}" alt="Imagen cargada" style="max-width: 100%;">`;
            } else {
                contenedor.innerHTML = data;
            }
        })
        .catch(error => {
            console.error('Error al cargar contenido:', error);
            document.getElementById('Seccontenido').innerHTML = "<p>Error al cargar el contenido.</p>";
        });
}
