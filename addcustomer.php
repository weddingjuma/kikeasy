<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

if(isset($_POST["submit"])) {
  $n_id = $_POST['n_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $p_number = $_POST['p_number'];

$sql = "INSERT INTO customer ( n_id, name, address, p_number) VALUES ('".$n_id."', '".$name."', '".$address."', '".$p_number."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    header('Location: addrent.php?nid='.$n_id."&name=".$name);
    } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin.
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
          <div class="col-lg-12" style="color: #1862ab;">
              <h1 class="page-header">Add New Customer</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add customer start form -->
        <form method="post" action="addcustomer.php">
              <div class="form-group">
                  <label>National Id Number</label>
                  <input class="form-control" name="n_id" autocomplete="off" placeholder="123456789V">
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="name" autocomplete="off" placeholder="Nimal" required>
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" name="address" autocomplete="off" placeholder="Kandy, SriLanka" required>
              </div>
              <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" name="p_number" autocomplete="off" placeholder="0711231231">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Next - Fill Rent Data </button>
        </form>
      </div>
    </div>
</div>

</div>

<!-- footer -->
<?php include 'footer.php'; ?>
