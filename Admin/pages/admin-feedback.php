<?php
 include './connect.php';
 $cat_id1 =  $cat_name = $c_img1 = $catid = $cat_img1='';
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
  <title>Admin-Feedback</title>
  <link rel="shortcut icon" type="image/png" href="../images/logos/icono.png"/>
  <link rel="stylesheet" href="../css/styles.css" />
  <style>
.category-image {
    height: 200px; /* Set your desired height here */
    object-fit: cover; /* This will make the image cover the entire container */
    object-position: center; /* You can adjust the positioning if needed */
    width: 100%; /* Ensure the image takes up the full width of the container */
}
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
<!-- including the sidebar,navbar -->
<?php
  include './topbar.php';
?>
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h1 class="fw-semibold mb-4">Customer Feedback</h1>
          <div class="card">
            <div class="card-body">
              
            </div>
          </div>

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
                          <h6 class="fw-semibold mb-0">Customer name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">mail id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Review rating</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">review text</h6>
                        </th>
                      </tr>
                    </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM review ORDER BY review_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $cu_id=$row['review_id'];
    $cu_name=$row['customer_name'];
    $cu_no=$row['customer_mail'];
    $cu_address=$row['review_rating'];
    $cu_dob=$row['review_text'];
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