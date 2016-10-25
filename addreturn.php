<?php
require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

//show notification
$msg ="";

$return_id = countReturnId();

$sql1 = "SELECT * FROM stock";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $saleType = $_POST['saleType'];
  $rsId = $_POST['rsId'];
  $productId = $_POST['productId'];
  $nId = $_POST['nId'];
  $date = $_POST['date'];
  $route = $_POST['route'];
  $cnumber = $_POST['cnumber'];
  $note = $_POST['note'];
  $status = 1; //pending

$sql = "INSERT INTO `return` (return_id, sale_type, cusnid, rent_sale_id, rproductid, route, contact_num, status, note, add_date) VALUES ";
$sql .= "('".$return_id."', '".$saleType."', '".$nId."', '".$rsId."', '".$productId."', '".$route."', '".$cnumber."', '".$status."', '".$note."', '".$date."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> New Return added successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";

    //refresh page after 2 seconds
    header("Refresh:2");
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
              <h1 class="page-header">Add Return</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8 col-lg-8">
      <!-- add product start form -->
        <form method="post" action="addreturn.php">
              <div class="form-group">
                  <label>Return ID</label>
                  <input class="form-control" value="<?php echo $return_id; ?>" required readonly="readonly">
              </div>
              <div class="form-group">
                  <label>Sale Type</label>
                  <select name="saleType" class="form-control" required>
                        <option value="">Select Sale Type</option>
                        <option value="sale">Sale</option>
                        <option value="rent">Rent</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Rent / Sale ID</label>
                  <input class="form-control" name="rsId" autocomplete="off" required>
              </div>
              <div class='form-group'>
                <label>Select Product ID</label>
                    <select name="productId" class="select-boxs form-control" required>
                          <option value="">Select New Product ID</option>
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
              <div class="form-group">
                  <label>Customer Nation ID</label>
                  <input class="form-control" autocomplete="off" name="nId">
              </div>
              <div class="form-group">
                  <label>Date</label>
                  <input id="date" class="form-control" autocomplete="off" name="date" required>
              </div>
              <div class="form-group">
                  <label>Route</label>
                  <input class="form-control" name="route" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Contact Number</label>
                  <input class="form-control" name="cnumber" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Note</label>
                  <input class="form-control" name="note" autocomplete="off">
              </div>
              <div style="margin-bottom: 30px;">
              <button type="submit" name="submit" class="btn btn-primary">Add New Return</button>
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

 $('#date').datepicker({
     format: 'yyyy-mm-dd'
 });
</script>
<!-- footer -->
<?php include 'footer.php'; ?>
