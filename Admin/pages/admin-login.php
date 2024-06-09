<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 $_SESSION["email"]='';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-Login</title>
  <link rel="shortcut icon" type="image/png" href="../images/logos/icono.png"/>
  <link rel="stylesheet" href="../css/styles.min.css"/>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../images/logos/icono.png" width="80" alt="keralaspices logo">
                </a>
                <h1 class="text-center">Login</h1>
                <form method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Id</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="">Forgot Password?</a>
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="submitl">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Didn't have an account?</p>
                    <a class="text-primary fw-bold ms-2" href="./admin-register.php">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- PHP CODE FOR CHECKING THE INSERTED FORM IS CORRECT OR NOT THEN LOGGED IN -->
<?php
if(isset($_POST["submitl"]))
{
  $email=$_POST["email"];
  $password=$_POST["pass"];

  $sq=mysqli_query($conn,"SELECT * FROM admin WHERE admin_email='$email' AND admin_pass='$password'");
  $check=mysqli_num_rows($sq);
  
if($check>0)
{
  $_SESSION["email"] = $email;  
  $_SESSION["pass"] = $password;    
 // header("location: pages/Table.php");

 echo '<script type="text/javascript">
 window.location = "admin-dashboard.php"
</script>';
} 
else
{
echo "<script type= 'text/javascript'>('Error: "  . "wrong username or password" . $conn->error."');</script>";
}
}
?>

  <script src="../libs/jquery/dist/jquery.min.js"></script>
  <script src="../libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>