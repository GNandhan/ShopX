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
  <title>Admin-category</title>
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
if(isset($_GET['cid']))
{
    $catid = $_GET['cid'];
    $c_query = mysqli_query($conn,"SELECT * FROM category WHERE category_id = '$catid'");
    $c_row1=mysqli_fetch_array($c_query);
  
    $cat_id1 = $c_row1['category_id'];
    $cat_name = $c_row1['category_name'];
    $cat_img1 = $c_row1['category_photo'];
}
// fetching the data from the URL for deleting
if(isset($_GET['d_id']))
{
    $dl_id = $_GET['d_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM category WHERE category_id = '$dl_id'");
    $dl_row1=mysqli_fetch_array($dl_query);
    $img = '../images/category/'.$dl_row1['category_image'];

    // Check if the file exists before attempting to delete it
    if (file_exists($img)) {
        unlink($img); // Delete the image from the folder
    }

    $del = mysqli_query($conn,"DELETE FROM category WHERE category_id='$dl_id'"); 
    if($del)
    {
        header("location:admin-category.php");
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
          <h1 class="fw-semibold mb-4">Category</h1>
          <div class="card">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
              <!-- Add a hidden input field for catid -->
                  <input type="hidden" name="catid" value="<?php echo $cat_id1; ?>">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="catname" value="<?php echo $cat_name; ?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Category Image</label>
                  <input type="file" class="form-control" id="exampleInputPassword1" name="catimg"> <br>
                  <img src="../images/category/<?php echo $cat_img1; ?>" alt="" width="100">
                </div> 
                  <button type="submit" class="btn btn-primary" name="submitc">Submit</button>
                  <a href="admin-category.php" class="btn btn-danger">Reset</a>
              </form>
            </div>
          </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
if(isset($_POST["submitc"])) { 
    $cate = $_POST["catname"];
    $catid = $_POST["catid"];

    // Check if a file was uploaded
    if(isset($_FILES['catimg']) && $_FILES['catimg']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['catimg']['name'];
        $tempname = $_FILES['catimg']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $rand = uniqid(); // Generate a unique ID for the filename

        // Construct the new image filename based on the new category name
        $catimg = $cate . '.' . $ext;
        $folder = "../images/category/" . $catimg;

        // Move the uploaded file to the folder
        if(move_uploaded_file($tempname, $folder)) {
            // File upload successful, now update or insert into the database
            if(empty($catid)) {
                // Insert into the database
                $sql = mysqli_query($conn, "INSERT INTO category (category_name, category_photo) VALUES ('$cate', '$catimg')");
            } else {
                // Update the existing record with the new image
                $sql = mysqli_query($conn, "UPDATE category SET category_name='$cate', category_photo='$catimg' WHERE category_id='$catid'");
            }
        } else {
            echo "<script type='text/javascript'>alert('File upload failed');</script>";
        }
    } else {
        // Handle the case where no file was uploaded
        if(empty($catid)) {
            // Insert into the database without updating the image
            $sql = mysqli_query($conn, "INSERT INTO category (category_name) VALUES ('$cate')");
        } else {
           // Check if the category name was changed
           $currentCatNameQuery = mysqli_query($conn, "SELECT category_name FROM category WHERE category_id='$catid'");
           $currentCatNameRow = mysqli_fetch_assoc($currentCatNameQuery);
           $currentCatName = $currentCatNameRow['category_name'];

           if ($currentCatName != $cate) {
               // Rename the existing image file to match the new category name
               $oldImage = "../images/category/" . $currentCatName . "." . $ext;
               $newImage = "../images/category/" . $cate . "." . $ext;
               rename($oldImage, $newImage);
           }

           // Update the existing record without changing the image
           $sql = mysqli_query($conn, "UPDATE category SET category_name='$cate' WHERE category_id='$catid'");
       }
    }
    if($sql) {
        echo "<script type='text/javascript'>('Operation completed successfully.');</script>";
    } else {
        echo "<script type='text/javascript'>('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!-- PHP Code for displaying the data from the database -->
<?php  
$sql = mysqli_query($conn, "SELECT * FROM category");
$i = 0; // Initialize a counter

while ($row = mysqli_fetch_assoc($sql)) {
    $c_id = $row['category_id'];
    $catname = $row['category_name'];
    $catimg = $row['category_photo'];

    // Start a new row for every 4 categories
    if ($i % 4 == 0) {
        echo '<div class="row">';
    }
?>
    <!-- Category card -->
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="card">
                <img src="../images/category/<?php echo $catimg; ?>" class="card-img-top category-image" alt="No image selected">
              <div class="card-body">
                <h5 class="card-title"><?php echo $catname; ?></h5>
                <a href="admin-category.php?cid=<?php echo $c_id; ?>" class="btn btn-primary"><i class="ti ti-edit"></i></a>
                <a href="admin-category.php?d_id=<?php echo $c_id; ?>" class="btn btn-danger"><i class="ti ti-trash"></i></a>
            </div>
        </div>
    </div>

<?php
    $i++;
    // Close the row after every 4 categories
    if ($i % 4 == 0) {
        echo '</div>';
    }
}
// Close any remaining open row
if ($i % 4 != 0) {
    echo '</div>';
}
?>
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