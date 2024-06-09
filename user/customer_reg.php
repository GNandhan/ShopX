<?php
 include 'connect.php';
 error_reporting(0);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ShopX-Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/icono.png" rel="icon">
    <link rel="icon" href="img/favicon.ico">

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
                            <a href="customer_reg.php"><button class="dropdown-item" type="button">Sign up</button></a>
                            <a href="customer_login.php"><button class="dropdown-item" type="button">Login</button></a>
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
<!-- Registration form (bootstrap) -->
<div class="container mt-5 reg-form pt-5 pb-5"> 
    <div class="row justify-content-center mb-5"> 
        <h1>REGISTRATION</h1> 
    </div> 
    <form method="post"> 
        <div class="form-group"> 
            <label for="name">Name:</label> 
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"> 
        </div>  
            <div class="form-row mb-4"> 
                <div class="col-lg-6 pt-2"> 
                    <label for="name">Gender :</label> 
                        <div class="form-check form-check-inline"> 
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"> 
                            <label class="form-check-label" for="inlineRadio1">Male</label> 
                        </div> 
                        <div class="form-check form-check-inline"> 
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female"> 
                            <label class="form-check-label" for="inlineRadio2">Female</label> 
                        </div> 
                        <div class="form-check form-check-inline"> 
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Other"> 
                            <label class="form-check-label" for="inlineRadio2">Other</label> 
                        </div> 
                </div> 
                <div class="col-2 al pt-2"> 
                    <label for="dob">Date of Birth:</label> 
                </div> 
                <div class="col-lg-4"> 
                    <input type="date" class=" form-control" id="dob" name="dob"> 
                </div> 
            </div> 
        <div class="form-group"> 
            <label for="phone">Phone no:</label> 
            <input type="text" class="form-control" id="name" placeholder="Enter number" name="number"> 
        </div> 
        <div class="form-group"> 
            <label for="address">Address:</label> 
            <input type="textarea" class="form-control" id="name" placeholder="Enter Address" name="address"> 
        </div> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" name="state">
                        <option selected>Choose...</option>
                        <option value="kerala">Kerala</option>
                        <option value="tamilnadu">Tamilnadu</option>
                        <option value="karnataka">Karnataka</option>
                        <option value="andrapradesh">Andrapradesh</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="zip">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-6"> 
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block"> 
                </div>
                <div class="form-group col-md-6"> 
                    <input type="reset" value="Reset" class="btn btn-primary btn-lg btn-block"> 
                </div>
            </div>                
    </form> 
</div>

<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
    if(isset($_POST["submit"]))
    {
    $cname= $_POST["name"];
    $cno= $_POST["number"];
    $cadress= $_POST["address"];
    $cdob= $_POST["dob"];
    $cgender= $_POST["gender"];
    $ccity=  $_POST["city"];
    $cemail=$_POST["email"];
    $czip= $_POST["zip"];
    $cstate= $_POST["state"];
    $cpass=$_POST["password"];

$sql = mysqli_query($conn,"INSERT INTO customer(customer_name, customer_phno, customer_address, customer_dob, customer_gender, customer_city, customer_email, customer_pincode, customer_state, customer_password)
 VALUES ('$cname','$cno','$cadress',' $cdob','$cgender','$ccity','$cemail','$czip','$cstate','$cpass')");

if ($sql == TRUE)
{
// echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
echo '<script type="text/javascript">
window.location = "customer_login.php"
</script>';
} 
else
{
// echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";  
echo 'wrong username or password'; 
}
}
?>

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