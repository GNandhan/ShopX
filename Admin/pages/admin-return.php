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
  <title>Admin-marketing</title>
  <link rel="shortcut icon" type="image/png" href="../images/logos/icono.png" />
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
<?php
// fetching the data from the URL for deleting
if(isset($_GET['d_id']))
{
    $dl_id = $_GET['d_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM p_return WHERE order_id = '$dl_id'");
    $dl_row=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM p_return WHERE order_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-return.php");
    }
    else
    {
        echo "Deletion Failed";
    }
}
?>
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h1 class="fw-semibold mb-4">Return</h1>
<!-- table begin -->
<div class="card w-100">
  <div class="card-body p-3">
    <h5 class="card-title fw-semibold mb-4">Product Returned list</h5>
    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Sl no</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Customer name</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Address</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Number</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Product Name</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Quantity</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Price</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Reason</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Accept</h6>
            </th>
          </tr>
        </thead>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM p_return ORDER BY return_id ");
$counter = 1;
while($row=mysqli_fetch_assoc($sql))
{
    $or_id=$row['return_id'];
    $or_cu_name=$row['customer_name'];
    $or_address=$row['customer_address'];
    $or_no=$row['customer_phno'];
    $or_pro=$row['product_name'];
    $or_qua=$row['product_quantity'];
    $or_price=$row['product_price'];
    $or_cause=$row['return_cause'];
?>
        <tbody>
          <tr>
            <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo $counter++; ?></h6></td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal"><?php echo $or_cu_name; ?></p>                         
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal"><?php echo $or_address; ?></p>
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal"><?php echo $or_no; ?></p>
            </td>
            <td class="border-bottom-0">
              <p class="mb-0 fw-normal"><?php echo $or_pro; ?></p>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-semibold mb-0 fs-4"><?php echo $or_qua; ?></h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-semibold mb-0 fs-4">$<?php echo $or_price; ?></h6>
            </td>
            <td class="border-bottom-0">
              <h6 class="fw-semibold mb-0 fs-4"><?php echo $or_cause; ?></h6>
            </td>
            <td class="border-bottom-0">
              <span><i class="ti ti-circle-check btn btn-outline-success"></i></span>
            </td>
            <td class="border-bottom-0">
            <a href="admin-order.php?d_id=<?php echo $or_id; ?>"><span><i class="ti ti-trash btn btn-outline-danger"></i></span></a>
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