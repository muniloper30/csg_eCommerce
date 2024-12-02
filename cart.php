<?php
session_start();

// Array de productos
$productos = [
    ["id" => 1, "nombre" => "Camiseta básica Csg 1", "img" => "./assets/images/csg_basic.png", "precio" => 15],
    ["id" => 2, "nombre" => "Camiseta básica Csg 2", "img" => "./assets/images/csg_basic2.png", "precio" => 15],
    ["id" => 3, "nombre" => "Camiseta Viking Csg", "img" => "./assets/images/csg_vinking.png", "precio" => 17],
    ["id" => 4, "nombre" => "Camiseta Boxing Club Csg", "img" => "./assets/images/CsgBoxingClub.png", "precio" => 20],
    ["id" => 5, "nombre" => "Camiseta Coach Style Csg", "img" => "./assets/images/CsgCoachStyle.png", "precio" => 17],
    ["id" => 6, "nombre" => "Camiseta Dbz Csg", "img" => "./assets/images/CsgDbzStyle.png", "precio" => 25],
    ["id" => 7, "nombre" => "Camiseta Ya sois Libres Csg", "img" => "./assets/images/CsgFreedomStyle.png", "precio" => 22],
    ["id" => 8, "nombre" => "Camiseta Cookie Csg", "img" => "./assets/images/CsgGalletaStyle.png", "precio" => 22],
    ["id" => 9, "nombre" => "Camiseta Cat Csg", "img" => "./assets/images/CsgVintageStyle.png", "precio" => 25],
];


// Obtener los productos del carrito
$carrito = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$productos_en_carrito = array_filter($productos, function ($producto) use ($carrito) {
    return in_array($producto['id'], $carrito);
});
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/styles.css?v=<?php echo time(); ?>">


    <script src="https://kit.fontawesome.com/f0d1e02054.js" crossorigin="anonymous"></script>
    <title>Carrito</title>
</head>

<body>
    <header>
        <a href="./index.php">
            <img src="./assets/images/logoCsgWeb.png" id="logo" alt="logocsg">
        </a>
        <!-- Botón para abrir el menú de hamburguesa en dispositivos móviles -->
        <button id="abrir" class="btn-hamburger"><i class="bi bi-list"></i></button>
        <nav id="nav" class="nav"> <!-- Barra de navegación -->
            <button id="cerrar" class="btn-closeHamburger"><i class="bi bi-x-lg"></i></button>
            <div>
                <a data-traduccion="inicio" href="./index.php">Inicio</a>
                <a data-traduccion="productos" href="./productos.php">Productos</a>
                <a data-traduccion="contacto" href="./contacto.php">Contacto</a>
                <a href="./cart.php" id="cart">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span id="cuenta-carrito">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span>
                </a>
                <!-- Sección para seleccionar idioma y tema -->
                <div id="preferencias">
                    <button id="btnEspañol">Español</button>
                    <button id="btnIngles">Inglés</button>
                    <button id="btnModoOscuro">Modo Oscuro</button>
                    <button id="btnModoClaro">Modo Claro</button>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        <h1 data-traduccion="carritoCompras">Carrito de Compras</h1>
        <section id="productos-container">
            <?php
            if (!empty($productos_en_carrito)) {
                foreach ($productos_en_carrito as $producto) {
                    $id = $producto['id'];
                    echo "
            <div class='tarjeta-producto'>
                <img src='{$producto['img']}' alt='{$producto['nombre']}'>
                <h3>{$producto['nombre']}</h3>
                <p>{$producto['precio']}€</p>
                <form action='remove_from_cart.php' method='POST' style='margin-top: 10px;'>
                    <input type='hidden' name='id' value='$id'>
                    <button type='submit' class='eliminar-btn'>Eliminar</button>
                </form>
            </div>";
                }
            } else {
                echo "<p data-traduccion='vacio'>El carrito está vacío.</p>";
            }
            ?>
        </section>

    </main>

    <footer>
        <p data-traduccion="footer1">© 2024 Csg Tienda. Todos los derechos reservados.</p>
    </footer>

    <script src="./js/cookies.js"></script> <!-- Cargar cookies.js -->
    <script src="./js/traducciones.js"></script> <!-- Cargar traducciones.js -->
    <script src="./js/index.js?v=<?php echo time(); ?>"></script>
    <script src="https://kit.fontawesome.com/f0d1e02054.js" crossorigin="anonymous"></script>

</body>

</html>