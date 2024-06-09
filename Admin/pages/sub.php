<?php
include './connect.php';
?>

<?php

if (isset($_POST['id'])) {
    $category_id = $_POST['id'];

    $query = "SELECT * FROM brand WHERE category_id = $category_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_name = $row['brand_name'];
            echo '<option value="' . $brand_id . '">' . $brand_name . '</option>';
        }
    } else {
        echo '<option value="">No brands found</option>';
    }
}
?>
