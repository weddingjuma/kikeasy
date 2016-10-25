<?php
require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM stock";
$result1 = mysqli_query($dbc, $sql1);

$sql2 = "SELECT * FROM deliver";
$result2 = mysqli_query($dbc, $sql2);

if(isset($_POST["submit"])) {
  $producId = $_POST['producId'];
  $deliverId = $_POST['deliverId'];
  $quantity = $_POST['quantity'];

$sql = "INSERT INTO deliver_product (deliver_id, product_id, d_quantity) VALUES ('".$deliverId."', '".$producId."', '".$quantity."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){

    changeStock($producId , $quantity);

    $msg = "<div class='alert alert-success'> New Deliver Vehicle To Products Added Successfully
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
              <h1 class="page-header">Add Vehicle To Deliver Products</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add product start form -->
        <form method="post" action="adddeliverprod.php">

              <div class="form-group">
                  <label>Select Deliver ID</label>
                  <select name="deliverId" id="select-boxs" class="select-boxs form-control" required>
                        <option value="">Select Deliver ID</option>
                      <?php
                      while ( $row2 = mysqli_fetch_assoc($result2) )
                      {
                      ?>
                        <option value="<?php echo $row2['deliver_id']; ?>"><?php echo $row2['deliver_id']; ?></option>
                      <?php
                      }
                      ?>

                  </select>

              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <label>Select Product ID</label>
                <select name="producId" id="select-boxs" class="select-boxs form-control" required>
                      <option value="">Select Product ID</option>
                    <?php
                    while ( $row1 = mysqli_fetch_assoc($result1) )
                    {
                    ?>
                      <option value="<?php echo $row1['product_id']; ?>"><?php echo $row1['product_id']; ?></option>
                    <?php
                    }
                    ?>

                </select>

              </div>
              <div class="form-group col-md-5">
                  <label>Quantity</label>
                  <input class="form-control" name="quantity" autocomplete="off" required>
              </div>
            </div>
            <div class="row">
              <button type="submit" name="submit" class="btn btn-primary">Add New Deliver Vehicle Products</button>
            </div>
        </form>
      </div>
    </div>
</div>

</div>

<script>
// Select box
$(document).ready(function() {
  $(".select-boxs").select2();
});

</script>
<!-- footer -->
<?php include 'footer.php'; ?>
