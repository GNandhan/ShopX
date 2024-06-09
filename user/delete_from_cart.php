<?php
include 'connect.php';
error_reporting(0);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $customer_email = $_SESSION["email2"];

    // Perform the delete operation
    $deleteQuery = "DELETE FROM cart WHERE product_id = '$product_id' AND customer_email = '$customer_email'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product from cart";
    }
} else {
    echo "Invalid request";
}
?>