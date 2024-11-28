<?php
session_start();

// Verificar si se ha enviado un ID de producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Comprobar si el producto está en el carrito y eliminarlo
    if (($key = array_search($id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]); // Eliminar el producto del carrito
    }
}

// Redirigir al carrito de compras para actualizar la vista
header('Location: cart.php');
exit;
?>
