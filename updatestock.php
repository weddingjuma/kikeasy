<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql = "SELECT * FROM stock";
$result = mysqli_query($dbc, $sql);

if(isset($_POST["submit"])) {
  $stockQuantity = $_POST['stockQuantity'];
  $productId = $_POST['productId'];
  $availableQuantity = $_POST['availableQuantity'];

//show message
  if($result){
    $newQuantity = $availableQuantity + $stockQuantity;
    $sql1 = "UPDATE stock SET quantity='".$newQuantity."' WHERE product_id='".$productId."'";
    mysqli_query($dbc, $sql1);

    $msg = "<div class='alert alert-success'> Update Stock Quantity successfully
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
              <h1 class="page-header">Update Stock Quantity</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add product start form -->
        <form method="post" action="updatestock.php">
          <div class="form-group">
              <label>Select Product Id</label>
              <select name="productId" class="select-boxs form-control"  onchange="ajaxstock(this.value)" autocomplete="off" required>
                    <option value="">Select Product Id</option>
                  <?php
                  while ( $row = mysqli_fetch_assoc($result) )
                  {
                  ?>
                    <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

              <div id ="stockQty"></div>

              <div class="form-group">
                  <label>Type Add New quantity</label>
                  <input class="form-control" name="stockQuantity" autocomplete="off" placeholder="10000" required>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Update Stock</button>
        </form>
      </div>
    </div>
</div>

</div>

<script>
function ajaxstock(str) {
    if (str == "") {
        document.getElementById("stockQty").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("stockQty").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/updatestockq.php?productid="+str,true);
        xmlhttp.send();
    }
}

// Select box
$(document).ready(function() {
  $(".select-boxs").select2();
});
</script>
<!-- footer -->
<?php include 'footer.php'; ?>
