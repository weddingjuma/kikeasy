<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT sup_id FROM supplier";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $sup_Id = $_POST['sup_Id'];
  $productId = $_POST['productId'];
  $productName = $_POST['productName'];
  $productType = $_POST['productType'];
  $productColors = $_POST['productColors'];
  $productWarranty = $_POST['productWarranty'];

$sql = "INSERT INTO product (sup_id, product_id, name, type, colors, warranty) VALUES ('".$sup_Id."', '".$productId."', '".$productName."', '".$productType."', '".$productColors."', '".$productWarranty."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> New Product added successfully. <a href='addstock.php'><button type='submit' class='btn btn-primary'>Add This Product To Stock</button></a>
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  }
}
?>

<!-- header -->
<?php include 'header.php'; ?>

<div id="wrapper">

<!-- Navigation -->
<?php include 'navigation.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">

      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Add Products</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add product start form -->
        <form method="post" action="addproduct.php" data-toggle="validator">
          <div class="form-group">
              <label>Select Supplier ID</label>
              <select name="sup_Id" class="select-boxs form-control" required>
                    <option value="">Select Supplier ID</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['sup_id']; ?>"><?php echo $row1['sup_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

              <div class="form-group">
                  <label>Product ID</label>
                  <input class="form-control" pattern="^[_A-z0-9]{1,}$" maxlength="10" name="productId" onchange="checkPId(this.value)"  autocomplete="off" placeholder="ex: 1234ABCD"required>
              </div>

              <div id="pidresult"></div>

              <div class="form-group">
                  <label>Product Name</label>
                  <input class="form-control" name="productName" autocomplete="off" placeholder="ex : LG TV" required>
              </div>
              <div class="form-group">
                  <label>Product Type</label>
                  <input class="form-control" name="productType" autocomplete="off" placeholder="ex : 5L" required>
              </div>
              <div class="form-group">
                  <label>Product Colors</label>
                  <input class="form-control" name="productColors" autocomplete="off" placeholder="ex : red,black,blue">
              </div>
              <div class="form-group">
                  <label>Product Warranty</label>
                  <input class="form-control" name="productWarranty" autocomplete="off" placeholder="1 year">
              </div>
              <div style="margin-bottom : 30px;">
              <button type="submit" name="submit" class="btn btn-primary">Add New Product</button>
              </div>
        </form>
      </div>
    </div>
</div>

</div>

<script>
// check product id already exssits
       function checkPId(str) {
           if (str == "") {
               document.getElementById("pidresult").innerHTML = "";
               return;
           } else {
               if (window.XMLHttpRequest) {
                   // code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp = new XMLHttpRequest();
               }
               xmlhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("pidresult").innerHTML = this.responseText;
                   }
               };
              //  console.log(str);
               xmlhttp.open("GET","ajax/checkdata.php?fid=prodid&pid="+str,true);
               xmlhttp.send();
           }
       }

</script>
<!-- footer -->
<?php include 'footer.php'; ?>
