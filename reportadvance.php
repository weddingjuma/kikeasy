<?php

require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

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
              <h1 class="page-header">Advance Report</h1>
          </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <h3>Product Details</h3>
        </div>
        <div class ="col-md-4">
          <h4>Total Sales Items</h4>
        </div>
        <div class ="col-md-8">
          <h4>: <?php echo totalSales(); ?> </h4>
        </div>
      </div>

      <div class="row">
        <div class ="col-md-4">
          <h4>Total Rents Items</h4>
        </div>
        <div class ="col-md-8">
          <h4>: <?php echo totalRents(); ?> </h4>
        </div>
      </div>
      <div class="row">
        <div class ="col-md-4">
          <h4>Total Rents / Sales Items</h4>
        </div>
        <div class ="col-md-8">
          <h4>: <?php echo (totalSales()+totalRents()); ?> </h4>
        </div>
      </div>

      <div class="row" style="margin-top: 5px; margin-bottom: 20px; border-bottom: 1px solid #666;"> </div>

      <div class="row">
        <div class="col-md-12">
          <h3>Income Details</h3>
        </div>
        <div class ="col-md-4">
          <h4>Total Sales Income</h4>
        </div>
        <div class ="col-md-8">
          <h4>: Rs  <?php echo totalSalesIncome(); ?> </h4>
        </div>
      </div>

      <div class="row">
        <div class ="col-md-4">
          <h4>Total Rents Income</h4>
        </div>
        <div class ="col-md-8">
          <h4>: Rs <?php echo totalrentIncome(); ?> </h4>
        </div>
      </div>
      <div class="row">
        <div class ="col-md-4">
          <h4>Total Rents / Sales Income</h4>
        </div>
        <div class ="col-md-8">
          <h4>: Rs <?php echo (totalSalesIncome() + totalrentIncome()); ?> </h4>
        </div>
      </div>

      </div>
</div>

</div>



<!-- footer -->
<?php include 'footer.php'; ?>
