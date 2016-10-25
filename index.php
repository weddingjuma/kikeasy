<?php
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
          <div class="col-lg-12" style="color: #1862ab;">
              <h1 class="page-header">Welcome To Kikeasy Dashboard</h1>
          </div>
      </div>

          <div class="row">
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-success">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-area-chart fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                                 <div class="huge"><?php echo totalSales(); ?></div>
                                 <div>Total Sales !</div>
                             </div>
                         </div>
                     </div>
                     <a href="viewsale.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Sales Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-info">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-pie-chart fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                                 <div class="huge"><?php echo totalRents(); ?></div>
                                 <div>Total Rents !</div>
                             </div>
                         </div>
                     </div>
                     <a href="viewrent.php">
                         <div class="panel-footer">
                             <span class="pull-left">View More Rent Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-warning">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-12 text-right">
                                 <div class="huge"><?php echo totalSalesIncome(); ?></div>
                                 <div>Total Sales Income (Rs) !</div>
                             </div>
                         </div>
                     </div>
                     <a href="addsale.php">
                         <div class="panel-footer">
                             <span class="pull-left">Add New Sale</span>
                             <span class="pull-right"><i class="fa fa-plus-square-o"></i></span>

                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-danger">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-12 text-right">
                                 <div class="huge"><?php echo totalrentIncome(); ?></div>
                                 <div>Total Rent Income (Rs) !</div>
                             </div>
                         </div>
                     </div>
                     <a href="addrent.php">
                         <div class="panel-footer">
                             <span class="pull-left">Add New Rent</span>
                             <span class="pull-right"><i class="fa fa-plus-square-o"></i></span>

                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
           </div>

    <div class="row">
    <?php
    $sql = "SELECT * FROM `stock` WHERE `quantity` <= 10;";
    $result = mysqli_query($dbc, $sql);
    ?>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
              <strong>Stock Ending Soon Products ( Quantity < 10 )</strong>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTable-endStock">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Stock Price</th>
                              </tr>
                        </thead>
                        <tbody>
                          <?php
                          while($row = mysqli_fetch_assoc($result))
                          {
                          ?>
                            <tr class="odd gradeX">
                                <td><?php echo $row['product_id']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                            </tr>

                          <?php
                        }
                          ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    </div>

</div>
    </div>
</div>

</div>
<script>
$(document).ready( function () {
    $('#dataTable-endStock').DataTable({
      "lengthChange": false,
      "searching": false,
        "lengthMenu": [[5], [5]]
    });
} );
</script>
<!-- footer -->
<?php include 'footer.php'; ?>
