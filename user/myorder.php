<?php
 include 'connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email2"]=="")
 {
    header('location:customer_login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ShopX-order</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="img/icono.png" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .order-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 999;
        text-align: center;
    }
    .order-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .order-content i {
        font-size: 50px;
        color: #28a745; /* Green color, you can change it to your preferred color */
    }
</style>
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="myorder.php"><button class="dropdown-item" type="button">My order</button></a>
                            <a href="return.php"><button class="dropdown-item" type="button">Return</button></a>
                            <a href="../index.php"><button class="dropdown-item" type="button">Logout</button></a>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Shop</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">X</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+91 9747009669</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

<div class="container">
    <div class="row my-5 py-5">
        <div class="col-lg col-md col-sm col">
    <table class="table table-hover">
  <thead>
        <tr>
            <th scope="col">Sl no</th>
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Brand</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">image</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Order Date</th>
            <th scope="col">Delivery Status</th>
        </tr>
  </thead>
  <?php 
        $email=$_SESSION["email2"];
        $query = mysqli_query($conn,"SELECT * FROM p_order WHERE customer_email='$email'");
        $counter = 1;
        while ($row = mysqli_fetch_assoc($query))
        {
            $ord_id=$row["order_id"];
            $ord_brid=$row["brand_id"];
            $ord_brname=$row["brand_name"];
            $ord_catid=$row["category_id"];
            $ord_catname=$row["category_name"];
            $ord_proid=$row["product_id"];
            $ord_proname=$row["product_name"];
            $ord_proimg=$row["product_photo"];
            $ord_proqua=$row["product_quantity"];
            $ord_propri=$row["product_price"];
            $ord_propay=$row["payment_method"];
            $order_date=$row["order_date"];

            $orderDateTime = new DateTime($order_date);
            $currentDateTime = new DateTime();
            $interval = date_diff($currentDateTime, $orderDateTime);
            $daysDiff = $interval->days;
    ?>
  <tbody>
  <tr>
            <th scope="row"><?php echo $counter++; ?></th>
            <td><?php echo $ord_proname; ?></td>
            <td><?php echo $ord_catname; ?></td>
            <td><?php echo $ord_brname; ?></td>
            <td><?php echo $ord_proqua; ?></td>
            <td><?php echo $ord_propri; ?></td>
            <td><img src="../Admin/images/products/<?php echo $ord_proimg; ?>" alt="product image" width="50"></td>
            <td><?php echo $ord_propay; ?></td>
            <td><?php echo $order_date; ?></td>
            <td>
                <?php
                    // Display the corresponding status
                    if ($daysDiff == 0) {
                        echo 'Order Confirmed';
                    } elseif ($daysDiff == 1) {
                        echo 'Order dispatched';
                    } elseif ($daysDiff == 2) {
                        echo 'Shipped';
                    } elseif ($daysDiff == 3) {
                        echo 'Out of Delivery';
                    } else {
                        echo 'Delivered';
                    }
                ?>
            </td>
        </tr>
  </tbody>
  <?php
}
?>
</table>
        </div>
    </div>
</div>
       <!-- Footer Start -->
   <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">ShopX is your ultimate online shopping destination for all your needs. With a vast collection of products, from stylish clothing to cutting-edge electronics, ShopX makes shopping a breeze.  </p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>MG Road Kochi</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>shopx@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 9747009669</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="../index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="../index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Feel free to connect us.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; copyright <a href="../Admin/pages/admin-login.php">ShopX.</a> All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="user/lib/easing/easing.min.js"></script>
    <script src="user/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="user/mail/jqBootstrapValidation.min.js"></script>
    <script src="user/mail/contact.js"></script>
    <!-- Template Javascript -->
    <script src="user/js/main.js"></script>
</body>
</html>