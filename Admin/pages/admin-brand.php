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
  <title>Admin-Brand</title>
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
<!-- fetching the data from the URL for editing -->
<?php
if(isset($_GET['id']))
{
    $brndid = $_GET['id'];
    $b_query = mysqli_query($conn,"SELECT * FROM brand WHERE brand_id = '$brndid'");
    $b_row1=mysqli_fetch_array($b_query);

        $br_id1 = $b_row1['brand_id'];
        $cat_id1 = $b_row1['cat_id'];
        $brand_id1 = $b_row1['brand_name']; 
}
// fetching the data from the URL for deleting
if(isset($_GET['d_id']))
{
    $dl_id = $_GET['d_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM brand WHERE brand_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM brand WHERE brand_id='$dl_id'");    
}
?>
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h1 class="fw-semibold mb-4">Brand</h1>
          <div class="card">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
              <!-- Add a hidden input field for catid -->
                  <input type="hidden" name="catid" value="<?php echo $cat_id1; ?>">
                <div class="mb-3">
                    <label for="catSelect" class="form-label">Select Category</label>
                    <select class="form-select" id="catSelect" name="cat">
                    <option selected>Select the categories</option>
                  <?php
                    $query = mysqli_query($conn,"SELECT * FROM category");
                    while ($row = mysqli_fetch_assoc($query))
                      {
                      $c_id=$row["category_id"];
                      $c_name=$row["category_name"];
                  ?>
                    <option value="<?php echo $c_id; ?>" <?php if($row['cat_id'] == $cat_id1){echo 'selected';} ?> ><?php echo $c_name; ?></option>
                    <?php
                      }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bran" value="<?php echo $brand_id1; ?>">
                </div>
                  <button type="submit" class="btn btn-primary" name="submitb">Submit</button>
                  <a href="admin-category.php" class="btn btn-danger">Reset</a>
              </form>
            </div>
          </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
if(isset($_POST["submitb"])) 
{ 
    $cat= $_POST["cat"];
    $brande= $_POST["bran"];

    if($brndid=='')
    {
      $sql = mysqli_query($conn,"INSERT INTO brand  (category_id, brand_name ) 
                         VALUES ('$cat','$brande')");
    }
    else
    {
      $sql = mysqli_query($conn,"UPDATE brand SET category_id='$cat', brand_name='$brande' where brand_id='$brndid' " );
    }

    if ($sql == TRUE) {
        echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
    } else {
        echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!-- PHP Code for displaying the data from the database -->
<table class="table table-hover table-bordered table-hover">
  <thead class="thead-dark">
  <tr>
    <th scope="col">Category Id</th>
     <th scope="col">Category Name</th>
     <th scope="col">Brand Id</th>
     <th scope="col">Brand Name</th>
     <th scope="col">Edit</th>
     <th scope="col">Delete</th>
    </tr>
<?php  
$sql=mysqli_query($conn,"SELECT * FROM brand ORDER BY category_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $brname=$row['brand_name'];
    $id=$row['brand_id'];
    $cid=$row['category_id'];
    $sql1=mysqli_query($conn,"SELECT * FROM category WHERE category_id='$cid'");
    $row1=mysqli_fetch_assoc($sql1);
    $ctname=$row1['category_name'];
?>

<tr>
    <td><?php echo $cid; ?></td>
    <td><?php echo $ctname; ?></td>
    <td><?php echo $id; ?></td>
    <td><?php echo $brname; ?></td>
    <td class="c1"><a href="admin-brand.php?id=<?php echo $id; ?>"><img src="../images/logos/edit.png" alt="edit"></a></td>
    <td class="c1"><a href="admin-brand.php?d_id=<?php echo $id; ?>"><img src="../images/logos/delete.png" alt="delete button"></a></td>


</tr>

<?php
}
?>
</table>


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
<?php
// including the connection file
include './connect.php';

// initializing variables
$cat_id1 = $cat_name = $c_img1 = $catid = $cat_img1='';

// setting error reporting to 0
error_reporting(0);

// starting the session
session_start();

// checking if the session variable is empty
if($_SESSION["email"]=="")
{
   // redirecting to the admin login page
   header('location:admin-login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Admin-Brand</title>
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
 <!-- Body Wrapper -->
 <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
<!-- including the sidebar,navbar -->
<?php
 include './topbar.php';
?>
<!-- fetching the data from the URL for editing -->
<?php
if(isset($_GET['id']))
{
    $brndid = $_GET['id'];
    $b_query = mysqli_query($conn,"SELECT * FROM brand WHERE brand_id = '$brndid'");
    $b_row1=mysqli_fetch_array($b_query);

        $br_id1 = $b_row1['brand_id'];
        $cat_id1 = $b_row1['cat_id'];
        $brand_id1 = $b_row1['brand_name']; 
}
// fetching the data from the URL for deleting
if(isset($_GET['d_id']))
{
    $dl_id = $_GET['d_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM brand WHERE brand_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $del = mysqli_query($conn,"DELETE FROM brand WHERE brand_id='$dl_id'");   
}
?>
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h1 class="fw-semibold mb-4">Brand</h1>
          <div class="card">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
              <!-- Add a hidden input field for catid -->
                 <input type="hidden" name="catid" value="<?php echo $cat_id1; ?>">
                <div class="mb-3">
                    <label for="catSelect" class="form-label">Selectlabel> Category</
                    <select class="form-select" id="catSelect" name="cat">
                    <option selected>Select the categories</option>
                 <?php
                    $query = mysqli_query($conn,"SELECT * FROM category");
                    while ($row = mysqli_fetch_assoc($query))
                      {
                      $c_id=$row["category_id"];
                      $c_name=$row["category_name"];
                 ?>
                    <option value="<?php echo $c_id; ?>" <?php if($row['cat_id'] == $cat_id1){echo 'selected';} ?> ><?php echo $c_name; ?></option>
                    <?php
                      }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                 <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bran" value="<?php echo $brand_id1; ?>">
                </div>
                 <button type="submit" class="btn btn-primary" name="submitb">Submit</button>
                 <a href="admin-category.php" class="btn btn-danger">Reset</a>
              </form>
            </div>
          </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
if(isset($_POST["submitb"])) 
{ 
    $cat= $_POST["cat"];
    $brande= $_POST["bran"];

    if($brndid=='')
    {
      $sql = mysqli_query($conn,"INSERT INTO brand (category_id, brand_name ) 
                         VALUES ('$cat','$brande')");
    }
    else
    {
      $sql = mysqli_query($conn,"UPDATE brand SET category_id='$cat', brand_name='$brande' where brand_id='$brndid' " );
    }

    if ($sql == TRUE) {
        echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
    } else {
        echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!-- PHP Code for displaying the data from the database -->
<table class="table table-hover table-bordered table-hover">
 <thead class="thead-dark">
 <tr>
    <th scope="col">Category Id</th>
     <th scope="col">Category Name</th>
     <th scope="col">Brand Id</th>
     <th scope="col">Brand Name</th>
     <th scope="col">Edit</th>
     <th scope="col">Delete</th>
    </tr>
<?php 
$sql=mysqli_query($conn,"SELECT * FROM brand ORDER BY category_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $brname=$row['brand_name'];
    $id=$row['brand_id'];
    $cid=$row['category_id'];
    $sql1=mysqli_query($conn,"SELECT * FROM category WHERE category_id='$cid'");
    $row1=mysqli_fetch_assoc($sql1);
    $ctname=$row1['category_name'];
?>

<tr>
    <td><?php echo $cid; ?></td>
    <td><?php echo $ctname; ?></td>
    <td><?php echo $id; ?></td>
    <td><?php echo $brname; ?></td>
    <td class="c1"><a href="admin-brand.php?id=<?php echo $id; ?>"><img src="../images/logos/edit.png" alt="edit"></a></td>
    <td class="c1"><a href="admin-brand.php?d_id=<?php echo $id; ?>"><img src="../images/logos/delete.png" alt="delete button"></a></td>


</tr>

<?php
}
?>
</table>


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