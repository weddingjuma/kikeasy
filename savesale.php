<?php

require_once 'db.php';
require_once 'logincheck.php';

$sid = $_GET['sid'];

// $sql = "SELECT * FROM sale WHERE sale_id = '".$sid."'";
// $result = mysqli_query($dbc, $sql);
// $row = mysqli_fetch_assoc($result);

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
              <h1 class="page-header">Print Bill</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo "<div class='alert alert-success'> Bill Added Successfully. Print Bill Or Add New One.
      <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>"; ?>
      </div>

      <div class="col-md-8">
      <!-- add stock start form -->


      <a href="print/index.php?sid=<?php echo $sid; ?>" target='_blank'><button type="submit" class="btn btn-primary">Print Bill</button></a>

      <a href="addsale.php"><button type="submit" class="btn btn-primary">Add A New Bill</button></a>
    </div>
    </div>
</div>

</div>

<!-- footer -->
<?php include 'footer.php'; ?>
