<?php
session_start();
// Verificar si se ha enviado un ID de producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['id'];

    // Crear el carrito si no existe
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Agregar el producto al carrito (evitar duplicados)
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }

    // Redirigir de vuelta a index.php
    header('Location: index.php');
    exit();
}
?>
