<?php
 include './connect.php';
 $p_quantity1 ='';
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
  <title>Admin-product</title>
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
   <!-- To connect -->
<script>
  function getcat() {
    var categoryId = document.getElementById('catid').value;
    if (categoryId != 0) {
        $('#sub').html('<option value="">loading</option>');
        $.post('sub.php', { id: categoryId }, function (data) {
            $('#sub').html(data);
        });
    }
}
</script>    
<!-- fetching the data from the URL for editing -->
<?php
if(isset($_GET['id']))
{
    $proid = $_GET['id'];
    $p_query = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$proid'");
    $b_row1=mysqli_fetch_array($p_query);
  
        $cat_id1 = $b_row1['category_id'];
        $cat_name1 = $b_row1['category_name'];
        $br_id1 = $b_row1['brand_id'];
        $br_name1 = $b_row1['brand_name'];
        $p_name1 = $b_row1['product_name']; 
        $p_price1 = $b_row1['product_price'];
        $p_quantity1 = $b_row1['product_quantity']; 
        $p_desc1 = $b_row1['product_desc'];
        $p_img1 = $b_row1['product_photo'];
}
// fetching the data from the URL for deleting
if(isset($_GET['d_id']))
{
    $dl_id = $_GET['d_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$dl_id'");
    $dl_row=mysqli_fetch_array($dl_query);
    $img = '../images/products/'.$dl_row['product_photo'];
    $del = mysqli_query($conn,"DELETE FROM product WHERE product_id='$dl_id'");
    if($del)
    {
        unlink($img); //for deleting the existing image from the folder
        header("location:admin-product.php");
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
            <h1 class="fw-semibold mb-4">Product</h1>
            <div class="card">
              <div class="card-body">
              <form method="POST" enctype="multipart/form-data"  id="myForm">  
                  <div class="row mb-3">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Category</label>
                      <select aria-label="Default select example" class="form-select" name="cat" onchange="getcat();" id="catid">
                      <option selected>Select the categories</option>
                  <?php
                      $query = mysqli_query($conn,"SELECT * FROM category");
                      while ($row = mysqli_fetch_assoc($query))
                      {
                        $c_id=$row["category_id"];
                        $c_name=$row["category_name"];
                ?>
                      <option value="<?php echo $c_id; ?>" <?php if($row['category_id']==$cat_id1){ echo 'selected';} ?> ><?php echo $c_name; ?></option>
                    <?php
                      }
                    ?>                
              </select>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Brand</label>
                      <select class="form-select"  aria-label="Default select example" name="brand" id="sub">
                        <option selected>Select the brand</option>
                <?php
                      $data2 = "SELECT * FROM brand";
                      $data2_query = mysqli_query($conn,$data2);
                      while ($row2 = mysqli_fetch_assoc($data2_query))
                      {
                        $b_id=$row2['brand_id'];
                        $b_name=$row2['brand_name'];
                ?>
                      <option value="<?php echo $b_id; ?>" <?php if($row2['brand_id']==$br_id1){ echo 'selected';} ?> ><?php echo $b_name; ?></option>
                <?php
                      }
                ?>
                      </select>
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pro" value="<?php echo $p_name1; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-6 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Product Price</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pri" value="<?php echo $p_price1; ?>">
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="qua" value="<?php echo $p_quantity1; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                      <label for="exampleInputEmail1" class="form-label">Product Image</label>
                      <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="img">
                      <img src="../images/products/<?php echo $p_img1; ?>" alt="" width="100">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                      <label for="exampleInputEmail1" class="form-label">Product Description</label>
                      <textarea class="form-control" id="productDescription" name="dis" rows="2" cols="50"><?php echo $p_desc1; ?></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="submitp">Submit</button>
                  <a href="admin-product.php" class="btn btn-danger">Reset</a>
                </form>
              </div> 
            </div>
<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
    if(isset($_POST["submitp"]))
    {
      $cat= $_POST["cat"];
      $brand_id = $_POST["brand"];
      $query = mysqli_query($conn, "SELECT * FROM brand WHERE brand_id = '$brand_id'");
      $row = mysqli_fetch_assoc($query);
      $brand_name = $row['brand_name'];
      $query = mysqli_query($conn,"SELECT * FROM category WHERE category_id='$cat'");
      $row = mysqli_fetch_assoc($query);
      $catname =$row['category_name'];
      $proname= $_POST["pro"];
      $propri= $_POST["pri"];
      $proqua= $_POST["qua"];
      $prodesc= $_POST["dis"];
// image uploading formatts
      $filename =$_FILES['img']['name'];
      $tempname =$_FILES['img']['tmp_name'];

      if($proid)
      {
      $imgs = '../images/products/'.$p_img1; 
      if( $filename)
      {
          unlink($imgs); //
      }
      else
      { 
          echo "<script type= 'text/javascript'>alert('Updated Successfully.');</script>";
      }
      }

      $exp = explode('.',$filename);
      $ext = end($exp);  //for providing extension
      $rand = (rand());  //for giving random number for filename

        $image = $proname.'.'.$ext;
        $folder = "../images/products/".$image;
        move_uploaded_file($tempname, $folder);

      if($proid=='')
      {
        $sql = mysqli_query($conn,"INSERT INTO product (product_name, product_photo, product_quantity, product_price, product_desc, category_id, category_name, brand_id, brand_name)
                                                VALUES ('$proname', '$image', '$proqua', '$propri', '$prodesc', '$cat', '$catname', '$brand_id', '$brand_name')");
      }
      elseif($filename)
      {
        $sql = mysqli_query($conn,"UPDATE product SET product_name = '$proname', product_photo = '$image', product_quantity = '$proqua', product_price ='$propri', product_desc = '$prodesc', category_id = '$cat', category_name = '$catname', brand_id ='$brand_id', brand_name ='$brand_name'  WHERE product_id = '$proid' ");
      }
      else
      {
      $exp = explode('.',$p_img1);
      $ext = end($exp);
      $old="../images/products/".$p_img1;
  
          $image = $proname.'.'.$ext;
          $folder = "../images/products/".$image;
          rename($old,$folder);
          $sql = mysqli_query($conn,"UPDATE product SET product_name = '$proname', product_photo = '$image', product_quantity = '$proqua', product_price ='$propri', product_desc = '$prodesc', category_id = '$cat', category_name = '$catname', brand_id ='$bran', brand_name ='$bname'  WHERE product_id = '$proid' ");
        }

move_uploaded_file($tempname, $folder);
if ($sql == TRUE) {
echo "<script type= 'text/javascript'>('New record created successfully');</script>";
} 
else {
  echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
}
?>
<!-- table begin -->
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Product List</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Category</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Brand</h6>
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
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Image</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Edit</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Delete</h6>
                        </th>
                      </tr>
                    </thead>
<!--Php code for displaying the data from the database  -->
<?php  
$sql=mysqli_query($conn,"SELECT * FROM product ORDER BY category_id ");
while($row=mysqli_fetch_assoc($sql))
{
    $p_id=$row['product_id'];
    $c_id=$row['category_id'];
    $cname=$row['category_name'];
    $b_id=$row['brand_id'];
    $brname=$row['brand_name'];
    $proname=$row['product_name'];
    $proqua=$row['product_quantity'];
    $propri=$row['product_price'];
    $prodesc=$row['product_desc'];
    $proimg=$row['product_photo'];
?>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo $p_id; ?></h6></td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $cname; ?></p>                         
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $brname; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $proname; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $proqua; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">$<?php echo $propri; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $prodesc; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4"><img src="../images/products/<?php echo $proimg; ?>" alt="product image" width="50"></h6>
                        </td>
                        <td class="border-bottom-0">
                        <a href="admin-product.php?id=<?php echo $p_id; ?>"><span><i class="ti ti-edit btn btn-outline-success"></i></span></a>
                        </td>
                        <td class="border-bottom-0">
                        <a href="admin-product.php?d_id=<?php echo $p_id; ?>"><span><i class="ti ti-trash btn btn-outline-danger"></i></span></a>
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