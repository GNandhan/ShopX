<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
    header('location:admin-login.php');
 }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-customer</title>
  <link rel="shortcut icon" type="image/png" href="../images/logos/icono.png"/>
  <link rel="stylesheet" href="../css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
<!-- including the sidebar,navbar -->
<?php
  include './topbar.php';
?>
<!-- fetching the data from the URL for editing -->
<?php
if(isset($_GET['cu_id']))
{
    $cusdid = $_GET['cu_id'];
    $p_query = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id = '$cusdid'");
    $cu_row1=mysqli_fetch_array($p_query);
  
        $cus_id1 = $cu_row1['customer_id'];
        $cus_name1 = $cu_row1['customer_name'];
        $cus_ph1 = $cu_row1['customer_phno'];
        $cus_address1 = $cu_row1['customer_address'];
        $cus_dob1 = $cu_row1['customer_dob']; 
        $cus_gender1 = $cu_row1['customer_gender'];
        $cus_city1 = $cu_row1['customer_city']; 
        $cus_email1 = $cu_row1['customer_email'];
        $cus_pincode1 = $cu_row1['customer_pincode'];
        $cus_state1 = $cu_row1['customer_state'];
        $cus_password1 = $cu_row1['customer_password'];
}
?>
<!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h1 class="fw-semibold mb-4">Customer</h1>
            <div class="card">
              <div class="card-body">
              <form method="POST" enctype="multipart/form-data">  
                  <div class="row mb-3">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    <label for="exampleInputEmail1" class="form-label">Customer Name</label>
                      <input type="text" class="form-control" name="cusname" value="<?php echo $cus_name1; ?>">
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-4">
                    <label for="exampleInputEmail1" class="form-label">Mob no</label>
                      <input type="text" class="form-control" name="cusno" value="<?php echo $cus_ph1; ?>">
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">DOB</label>
                      <input type="date" class="form-control" name="cusdob" value="<?php echo $cus_dob1; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Gender</label>
                      <select aria-label="Default select example" class="form-select" name="cusgender" value="<?php echo $cus_gender1; ?>">
                      <option selected></option>
                      <option value="male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                      </select>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">City</label>
                      <input type="text" class="form-control" name="cuscity" value="<?php echo $cus_city1; ?>">
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">email</label>
                      <input type="email" class="form-control" name="cusmail" value="<?php echo $cus_email1; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-2 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Zipcode</label>
                      <input type="text" class="form-control" name="cuszip" value="<?php echo $cus_pincode1; ?>">
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">State</label>
                      <input type="text" class="form-control" name="cusstate" value="<?php echo $cus_state1; ?>">
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-5">
                      <label for="exampleInputEmail1" class="form-label">Password</label>
                      <input type="text" class="form-control" name="cuspass" value="<?php echo $cus_password1; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-7 col-md-7 col-sm-7">
                      <label for="exampleInputEmail1" class="form-label">Address</label>
                      <textarea class="form-control" name="cusaddress" rows="2" cols="50"><?php echo $cus_address1; ?></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submitcu">Submit</button>
                  <a href="admin-product.php" class="btn btn-danger">Reset</a>
                </form>
              </div> 
            </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
if(isset($_POST["submitcu"])) 
{ 
    $cust_name= $_POST["cusname"];
    $cust_no= $_POST["cusno"];
    $cust_address= $_POST["cusaddress"];
    $cust_dob= $_POST["cusdob"];
    $cust_gender= $_POST["cusgender"];
    $cust_city= $_POST["cuscity"];
    $cust_mail= $_POST["cusmail"];  
    $cust_zip= $_POST["cuszip"];
    $cust_state= $_POST["cusstate"];
    $cust_pass= $_POST["cuspass"];

    if($cusdid=='')
    {
      $sql = mysqli_query($conn,"INSERT INTO customer (customer_name,customer_phno,customer_address,customer_dob,customer_gender,customer_city,customer_email,customer_pincode,customer_state,customer_password ) 
                         VALUES ('$cust_name','$cust_no','$cust_address','$cust_dob','$cust_gender','$cust_city','$cust_mail','$cust_zip','$cust_state','$cust_pass')");
    }
    else {
      $sql = mysqli_query($conn, "UPDATE customer SET customer_name='$cust_name', customer_phno='$cust_no', customer_address='$cust_address', customer_dob='$cust_dob', customer_gender='$cust_gender', customer_city='$cust_city', customer_email='$cust_mail', customer_pincode='$cust_zip', customer_state='$cust_state', customer_password='$cust_pass' where customer_id='$cusdid'");
  }
  

    if ($sql == TRUE) {
        echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
    } else {
        echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>
      <!-- table begin -->
            <div class="card w-100">
              <div class="card-body p-3">
                <h5 class="card-title fw-semibold mb-4">Customers Details</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Mob no</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Address</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Dob</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Gender</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">City</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Zip</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">State</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Password</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Edit</h6>
                        </th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM customer ORDER BY customer_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $cu_id=$row['customer_id'];
    $cu_name=$row['customer_name'];
    $cu_no=$row['customer_phno'];
    $cu_address=$row['customer_address'];
    $cu_dob=$row['customer_dob'];
    $cu_gender=$row['customer_gender'];
    $cu_city=$row['customer_city'];
    $cu_email=$row['customer_email'];
    $cu_zip=$row['customer_pincode'];
    $cu_state=$row['customer_state'];
    $cu_pass=$row['customer_password']; 
?>
                    <tbody>

                    <tr data-id="<?php echo $cu_id; ?>">
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo $cu_id; ?></h6></td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_name; ?></p>                         
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_no; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_address; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_dob; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_gender; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_city; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_email; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_zip; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_state; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cu_pass; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <a class="btn btn-light btn-edit" href="admin-customer.php?cu_id=<?php echo $cu_id; ?>"><i class="ti ti-edit"></i></a>
                          <a class="btn btn-primary btn-save"  href="admin-customer.php?cu_id=<?php echo $cu_id; ?>" style="display: none;">Save</a>
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
<!-- table end -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../libs/jquery/dist/jquery.min.js"></script>
  <script src="../libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/sidebarmenu.js"></script>
  <script src="../js/app.min.js"></script>
  <script src="../libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../libs/simplebar/dist/simplebar.js"></script>
  <script src="../js/dashboard.js"></script>
</body>
</html>