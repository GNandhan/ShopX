<?php
include 'connect.php';
session_start();

if (isset($_SESSION["email2"]) && isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $customer_email = $_SESSION["email2"];

    // Check if the product is already in the cart
    $check_query = "SELECT * FROM cart WHERE customer_email = '$customer_email' AND product_id = $product_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // Product is not in the cart, add it
        $add_to_cart_query = "INSERT INTO cart (customer_email, product_id) VALUES ('$customer_email', $product_id)";
        mysqli_query($conn, $add_to_cart_query);
        echo "Product added to the cart successfully!";
    } else {
        echo "Product is already in the cart.";
    }
} else {
    echo "Invalid request.";
}
?>