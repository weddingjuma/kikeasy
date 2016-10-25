<?php
require_once 'db.php';
require_once 'logincheck.php';

$sql1 = "SELECT * FROM supplier";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST['submit'])){
  $supid = $_POST['supid'];
  header('Location: printsupdata.php?supid='.$supid);
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
          <div class="col-lg-12" style="color: #c92a2a;">
              <h1 class="page-header">Generate Supplier Order Sheet</h1>
          </div>
      </div>

      <div class="col-md-8">
      <!-- add customer start form -->
        <form method="post" action="ordersup.php">

          <div class="form-group">
              <label>Select Supplier ID</label>
              <select class="select-boxs form-control" name="supid" autocomplete="off" required>
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

              <button type="submit" name="submit" class="btn btn-primary">View</button>

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
