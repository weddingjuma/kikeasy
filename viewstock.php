<?php
require_once 'db.php';
require_once 'logincheck.php';
$sql = "SELECT * FROM stock";
$result = mysqli_query($dbc, $sql);
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
          <div class="col-lg-12" style="color: #2f9e44;">
              <h1 class="page-header">Availible Stock</h1>
          </div>
      </div>

      <!-- /.row -->
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="panel panel-default">
                                  <!-- /.panel-heading -->
                                  <div class="panel-body">
                                      <div class="dataTable_wrapper">
                                          <table class="table table-striped table-bordered table-hover" id="dataTable-viewStock">
                                              <thead>
                                                  <tr>
                                                      <th>Product Id</th>
                                                      <th>Stock Price</th>
                                                      <th>Wholesale Price</th>
                                                      <th>Sale Price</th>
                                                      <th>Quantity</th>
                                                    </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                  <tr class="odd gradeX">
                                                      <td><?php echo $row['product_id']; ?></td>
                                                      <td><?php echo $row['stock_price']; ?></td>
                                                      <td><?php echo $row['whole_price']; ?></td>
                                                      <td><?php echo $row['sale_price']; ?></td>
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
                          <!-- /.col-lg-12 -->
                      </div>


</div>

</div>

<script>
$(document).ready( function () {
    $('#dataTable-viewStock').DataTable({
        "lengthMenu": [[20, 40, 60], [20, 40, 60]]
    });
} );
</script>

<!-- footer -->
<?php include 'footer.php'; ?>
