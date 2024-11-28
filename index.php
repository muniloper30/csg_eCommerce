<?php
session_start(); // Iniciar sesión
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/index.css?"/>
    <link rel="stylesheet" href="./css/styles.css?v=<?php echo time(); ?>">
    <script src="./js/cookies.js"></script> <!-- Cargar cookies.js -->
    <script src="./js/traducciones.js"></script> <!-- Cargar traducciones.js -->
    <script src="./js/index.js"></script>
    <script src="https://kit.fontawesome.com/f0d1e02054.js" crossorigin="anonymous"></script>
    <title>Csg Tienda</title>
</head>

<body>
    <header>
        <nav>
            <a href="./index.php">
                <img src="./assets/images/logoCsgWeb.png" id="logo" alt="logocsg">
            </a>
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

    <main>
        <section id="productos-container">
            <?php
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


            // Renderizar productos
            foreach ($productos as $producto) {
                echo "
                <div class='tarjeta-producto'>
                    <img src='{$producto['img']}' alt='{$producto['nombre']}'>
                    <h3>{$producto['nombre']}</h3>
                    <p>{$producto['precio']}€</p>
                    <form method='post' action='add_to_cart.php'>
                        <input type='hidden' name='id' value='{$producto['id']}'>
                        <button type='submit'>Agregar al carrito</button>
                    </form>
                </div>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p data-traduccion="footer1">© 2024 Csg Tienda. Todos los derechos reservados.</p>
    </footer>
</body>

</html>