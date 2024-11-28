// Función para cambiar el idioma y guardar la preferencia en una cookie
function cambiarIdioma(idioma) {
    // Establecer el idioma en la cookie
    setCookie('idioma', idioma, 30); // La cookie durará 30 días

    // Actualizar los textos según el idioma seleccionado
    actualizarTexto(idioma);
}

// Función para actualizar los textos en la página según el idioma
function actualizarTexto(idioma) {
    const traduccion = traducciones[idioma];
    
    // Cambiar los textos de la página
    document.querySelector('[data-traduccion="carritoCompras"]').innerText = traduccion.carritoCompras;
    document.querySelector('[data-traduccion="inicio"]').innerText = traduccion.inicio;
    document.querySelector('[data-traduccion="footer1"]').innerText = traduccion.footer1;
    document.querySelector('[data-traduccion="productos"]').innerText = traduccion.productos;
    document.querySelector('[data-traduccion="contacto"]').innerText = traduccion.contacto;
    
    
    // Cambiar los botones de agregar al carrito
    const botonesEliminar = document.querySelectorAll("button.eliminar-btn");
    botonesEliminar.forEach((button) => {
    button.innerText = traduccion.eliminar_carrito; // Traducción correcta
});

    // Iterar sobre los botones y los nombres de los productos
    botonesCarrito.forEach((button) => {
        button.innerText = traduccion.agregar_carrito;
    });

    
    // Footer
    
    
    // Cambiar los textos de los botones de idioma
    document.getElementById("btnEspañol").innerText = traduccion.espanol;
    document.getElementById("btnIngles").innerText = traduccion.ingles;
    document.getElementById("btnModoOscuro").innerText = traduccion.modo_oscuro;
    document.getElementById("btnModoClaro").innerText = traduccion.modo_claro;
    
}

// Al cargar la página, comprobar si hay un idioma guardado en la cookie
document.addEventListener("DOMContentLoaded", () => {
    const idiomaGuardado = getCookie('idioma') || 'es'; // Idioma por defecto: español
    actualizarTexto(idiomaGuardado);

    // Asignar eventos a los botones de idioma
    document.getElementById("btnEspañol").addEventListener("click", () => cambiarIdioma('es'));
    document.getElementById("btnIngles").addEventListener("click", () => cambiarIdioma('en'));
});

// Función para cambiar el tema entre modo claro y oscuro
function toggleTheme() {
    const body = document.body;

    // Alternar la clase 'dark-mode' en el body
    body.classList.toggle('dark-mode');

    // Almacenar la preferencia del tema en las cookies
    const currentTheme = body.classList.contains('dark-mode') ? 'dark' : 'light';
    setCookie('theme', currentTheme, 30); // Guardar la preferencia en la cookie por 30 días
}

// Al cargar la página, comprobar si hay un tema guardado en la cookie
document.addEventListener("DOMContentLoaded", () => {
    const temaGuardado = getCookie('theme') || 'light'; // Tema por defecto: claro
    if (temaGuardado === 'dark') {
        document.body.classList.add('dark-mode');
    }

    // Asignar eventos a los botones de Modo Oscuro y Claro
    document.getElementById('btnModoOscuro').addEventListener('click', toggleTheme);
    document.getElementById('btnModoClaro').addEventListener('click', toggleTheme);
});

function actualizarTextoVacio(idioma) {
    const textoVacio = traducciones[idioma].vacio;
    const elementoVacio = document.querySelector('[data-traduccion="vacio"]');
    if (elementoVacio) {
        elementoVacio.innerText = textoVacio;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const idiomaGuardado = getCookie('idioma') || 'es'; // Idioma por defecto: español
    actualizarTextoVacio(idiomaGuardado);
});
