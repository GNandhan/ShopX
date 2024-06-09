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
  <title>Admin-notify</title>
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
    $supid = $_GET['id'];
    $su_query = mysqli_query($conn,"SELECT * FROM supplier WHERE supplier_id = '$supid'");
    $su_row1=mysqli_fetch_array($su_query);
  
        $su_id1 = $su_row1['supplier_id'];
        $su_name1 = $su_row1['supplier_name'];
        $su_no1 = $su_row1['supplier_phno'];
        $su_address1 = $su_row1['supplier_address'];
        $su_mail1 = $su_row1['supplier_email']; 
        $su_brid1 = $su_row1['brand_id'];
        $su_brname1 = $su_row1['brand_name']; 
        $su_catid1 = $su_row1['category_id'];
        $su_proid1 = $su_row1['product_id'];
        $su_proname1 = $su_row1['product_name'];
        $su_proimg1 = $su_row1['product_photo'];
        $su_proqua1 = $su_row1['product_quantity'];
        $su_propri1 = $su_row1['product_price'];
        $su_prodesc1 = $su_row1['product_desc'];
}
// fetching the data from the URL for deleting
if(isset($_GET['d_id']))
{
    $dl_id = $_GET['d_id'];
    $dl_query = mysqli_query($conn,"SELECT * FROM supplier WHERE supplier_id = '$dl_id'");
    $dl_row=mysqli_fetch_array($dl_query);
    $img = '../images/products/'.$dl_row['product_photo'];
    $del = mysqli_query($conn,"DELETE FROM supplier WHERE supplier_id='$dl_id'");
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
            <h1 class="fw-semibold mb-4">Supplier</h1>
            <div class="card">
              <div class="card-body">
              <form method="POST" enctype="multipart/form-data">  
              <div class="row mb-3">
                  <div class="col-lg-7 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">Supplier Name</label>
                      <input type="text" class="form-control" name="sname" value="<?php echo $su_name1; ?>">
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Supplier Phno</label>
                      <input type="number" class="form-control" name="sphno" value="<?php echo $su_no1; ?>">
                    </div>
              </div>    
              <div class="row mb-3">
                    <div class="col-lg-5 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">Supplier email</label>
                      <input type="text" class="form-control" name="smail" value="<?php echo $su_mail1; ?>">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                      <label for="exampleInputEmail1" class="form-label">Supplier Address</label>
                      <textarea class="form-control" id="productDescription" name="saddress" rows="3" cols="50"><?php echo $su_address1; ?></textarea>
                    </div>
              </div> <hr>
              <div class="row mb-3">
                  <div class="col-lg-4 col-md-4 col-sm-6">
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
                      <option value="<?php echo $c_id; ?>" <?php if($row['category_id']==$su_catid1){ echo 'selected';} ?> ><?php echo $c_name; ?></option>
                    <?php
                      }
                    ?>                
              </select>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
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
                      <option value="<?php echo $b_id; ?>" <?php if($row2['brand_id']==$su_brid1){ echo 'selected';} ?> ><?php echo $b_name; ?></option>
                <?php
                      }
                ?>
                      </select>
                    </div>
                  </div>
                <div class="row mb-3">
                  <div class="col-lg-5 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pname" value="<?php echo $su_proname1; ?>">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4">
                      <label for="exampleInputEmail1" class="form-label">Product Price</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pprice" value="<?php echo $su_propri1; ?>">
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-8">
                      <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pqua" value="<?php echo $su_proqua1; ?>">
                    </div>
                </div>
                  <div class="row mb-3">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                      <label for="exampleInputEmail1" class="form-label">Product Image</label>
                      <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pimg">
                      <img src="../images/products/<?php echo $su_proimg1; ?>" alt="" width="100">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                      <label for="exampleInputEmail1" class="form-label">Product Description</label>
                      <textarea class="form-control" id="productDescription" name="pdesc" rows="2" cols="50"><?php echo $su_prodesc1  ; ?></textarea>
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
      $cat_name = $row['category_name'];
      $su_name =$_POST['sname'];
      $su_phno= $_POST["sphno"];
      $su_address= $_POST["saddress"];
      $su_mail= $_POST["smail"];
      $p_name= $_POST["pname"];
      $p_price= $_POST["pprice"];
      $p_qua= $_POST["pqua"];
      $p_desc= $_POST["pdesc"];
// image uploading formats
      $filename =$_FILES['pimg']['name'];
      $tempname =$_FILES['pimg']['tmp_name'];

      if($supid)
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

      if($supid=='')
      {
        $sql = mysqli_query($conn,"INSERT INTO supplier (supplier_name, supplier_phno, supplier_address, supplier_email, brand_id, brand_name, category_id, category_name, product_name, product_photo, product_quantity, product_price, product_desc)
                                                 VALUES ('$su_name', '$su_phno', '$su_address', '$su_mail', '$brand_id', '$brand_name', '$cat', '$cat_name', '$p_name', '$image', '$p_qua', '$p_price', '$p_desc')");
      }
      elseif($filename)
      {
        $sql = mysqli_query($conn,"UPDATE supplier SET supplier_name = '$su_name', supplier_phno = '$su_phno', supplier_address = '$su_address', supplier_email ='$su_mail', brand_id = '$brand_id', brand_name = '$brand_name', category_id ='$cat', category_name ='$cat_name', product_name ='$p_name', product_photo ='$image', product_quantity ='$p_qua', product_price ='$p_price', product_desc ='$p_desc'  WHERE supplier_id = '$supid' ");
      }
      else
      {
      $exp = explode('.',$p_img1);
      $ext = end($exp);
      $old="../images/products/".$p_img1;
  
          $image = $proname.'.'.$ext;
          $folder = "../images/products/".$image;
          rename($old,$folder);
          $sql = mysqli_query($conn,"UPDATE supplier SET supplier_name = '$su_name', supplier_phno = '$su_phno', supplier_address = '$su_address', supplier_email ='$su_mail', brand_id = '$brand_id', brand_name = '$brand_name', category_id ='$cat', category_name ='$cat_name', product_name ='$p_name', product_photo ='$image', product_quantity ='$p_qua', product_price ='$p_price', product_desc ='$p_desc'  WHERE supplier_id = '$supid' ");
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
                <h5 class="card-title fw-semibold mb-4">Supply List</h5>
                <div class="table-responsive ">
                  <table class="table text-nowrap  mb-0 align-middle  table-hover">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Supplier Name</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Phno</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Address</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">brand</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">category</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Product</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Quantity</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Price</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                         <th class="">
                          <h6 class="fw-semibold mb-0">image</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Edit</h6>
                        </th>
                        <th class="">
                          <h6 class="fw-semibold mb-0">Delete</h6>
                        </th>
                      </tr>
                    </thead>
<!--Php code for displaying the data from the database  -->
<?php  
$sql=mysqli_query($conn,"SELECT * FROM supplier");
while($row=mysqli_fetch_assoc($sql))
{
    $s_id=$row['supplier_id'];
    $s_name=$row['supplier_name'];
    $s_phno=$row['supplier_phno'];
    $s_address=$row['supplier_address'];
    $s_email=$row['supplier_email'];
    $b_name=$row['brand_name'];
    $c_name=$row['category_name'];
    $p_name=$row['product_name'];
    $p_photo=$row['product_photo'];
    $p_qua=$row['product_quantity'];
    $p_price=$row['product_price'];
    $p_desc=$row['product_desc'];
?>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo $s_id; ?></h6></td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $s_name; ?></p>                         
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $s_phno; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $s_address; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $s_email; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $b_name; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $c_name; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $p_name; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $p_qua; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">$<?php echo $p_price; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $p_desc; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4"><img src="../images/products/<?php echo $p_photo; ?>" alt="product image" width="50"></h6>
                        </td>
                        <td class="border-bottom-0">
                        <a href="admin-supplier.php?id=<?php echo $s_id; ?>"><span><i class="ti ti-edit btn btn-outline-success"></i></span></a>
                        </td>
                        <td class="border-bottom-0">
                        <a href="admin-supplier.php?d_id=<?php echo $s_id; ?>"><span><i class="ti ti-trash btn btn-outline-danger"></i></span></a>
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