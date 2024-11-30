document.addEventListener("DOMContentLoaded", () => {
    const nav = document.getElementById("nav");
    const abrir = document.getElementById("abrir");
    const cerrar = document.getElementById("cerrar");
  
    // Función para abrir el menú
    if (abrir && nav && cerrar) {
      abrir.addEventListener("click", () => {
        console.log("Funciona abrir");
        nav.classList.add("visible");
      });
  
      // Función para cerrar el menú
      cerrar.addEventListener("click", () => {
        console.log("Funciona cerrar");
        nav.classList.remove("visible");
      });
    }
  
    // Función para cambiar el idioma y guardar la preferencia en una cookie
    function cambiarIdioma(idioma) {
      setCookie("idioma", idioma, 30); // La cookie durará 30 días
      actualizarTexto(idioma);
    }
  
    // Función para actualizar los textos en la página según el idioma
    function actualizarTexto(idioma) {
      const traduccion = traducciones[idioma];
  
      // Cambiar los textos de la página comunes
      document.querySelector('[data-traduccion="inicio"]').innerText = traduccion.inicio;
      document.querySelector('[data-traduccion="productos"]').innerText = traduccion.productos;
      document.querySelector('[data-traduccion="contacto"]').innerText = traduccion.contacto;
      document.querySelector('[data-traduccion="footer1"]').innerText = traduccion.footer1;
      document.querySelector('[data-traduccion="carritoCompras"]').innerText = traduccion.carritoCompras;
  
      // Cambiar los botones de agregar al carrito
      const botonesCarrito = document.querySelectorAll("button[type='submit']");
      botonesCarrito.forEach((button) => {
        button.innerText = traduccion.agregar_carrito;
      });
  
      // Si estamos en la página del carrito, actualizar los botones de eliminar
      const botonesEliminar = document.querySelectorAll("button.eliminar-btn");
      botonesEliminar.forEach((button) => {
        button.innerText = traduccion.eliminar_carrito;
      });
  
      // Cambiar los botones de idioma
      document.getElementById("btnEspañol").innerText = traduccion.espanol;
      document.getElementById("btnIngles").innerText = traduccion.ingles;
      document.getElementById("btnModoOscuro").innerText = traduccion.modo_oscuro;
      document.getElementById("btnModoClaro").innerText = traduccion.modo_claro;
    }
  
    // Función para actualizar textos vacíos (por ejemplo, cuando el carrito está vacío)
    function actualizarTextoVacio(idioma) {
      const textoVacio = traducciones[idioma].vacio;
      const elementoVacio = document.querySelector('[data-traduccion="vacio"]');
      if (elementoVacio) {
        elementoVacio.innerText = textoVacio;
      }
    }
  
    // Comprobar y aplicar idioma guardado
    const idiomaGuardado = getCookie("idioma") || "es"; // Idioma por defecto: español
    actualizarTexto(idiomaGuardado);
    actualizarTextoVacio(idiomaGuardado);
  
    // Asignar eventos a los botones de idioma
    document.getElementById("btnEspañol").addEventListener("click", () => cambiarIdioma("es"));
    document.getElementById("btnIngles").addEventListener("click", () => cambiarIdioma("en"));
  
    // Función para cambiar el tema entre modo claro y oscuro
    function toggleTheme() {
      const body = document.body;
      body.classList.toggle("dark-mode");
  
      const currentTheme = body.classList.contains("dark-mode") ? "dark" : "light";
      setCookie("theme", currentTheme, 30); // Guardar la preferencia en la cookie por 30 días
    }
  
    // Comprobar y aplicar tema guardado
    const temaGuardado = getCookie("theme") || "light"; // Tema por defecto: claro
    if (temaGuardado === "dark") {
      document.body.classList.add("dark-mode");
    }
  
    // Asignar eventos a los botones de Modo Oscuro y Claro
    document.getElementById("btnModoOscuro").addEventListener("click", toggleTheme);
    document.getElementById("btnModoClaro").addEventListener("click", toggleTheme);
  
    // Comprobar si estamos en la página del carrito y aplicar texto vacío si es necesario
    if (document.querySelector('[data-traduccion="vacio"]')) {
      actualizarTextoVacio(idiomaGuardado);
    }
  });
  