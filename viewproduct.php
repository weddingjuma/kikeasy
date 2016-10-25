<?php
require_once 'db.php';
require_once 'logincheck.php';

$sql = "SELECT * FROM product";
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
          <div class="col-lg-12" style="color: #099268;">
              <h1 class="page-header">Availible Products</h1>
          </div>
      </div>

      <!-- /.row -->
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="panel panel-default">
                                  <!-- /.panel-heading -->
                                  <div class="panel-body">
                                      <div class="dataTable_wrapper">
                                          <table class="table table-striped table-bordered table-hover" id="dataTable-viewProduct">
                                              <thead>
                                                  <tr>
                                                      <th>Product ID</th>
                                                      <th>Supplier ID</th>
                                                      <th>Name</th>
                                                      <th>Type</th>
                                                      <th>Color</th>
                                                      <th>Warranty</th>
                                                    </tr>
                                              </thead>
                                              <tbody>

                                              <?php
                                              while($row = mysqli_fetch_assoc($result))
                                              {
                                              ?>
                                                  <tr class="odd gradeX">
                                                      <td><?php echo $row['product_id']; ?></td>
                                                      <td><?php echo $row['sup_id']; ?></td>
                                                      <td><?php echo $row['name']; ?></td>
                                                      <td><?php echo $row['type']; ?></td>
                                                      <td><?php echo $row['colors']; ?></td>
                                                      <td><?php echo $row['warranty']; ?></td>
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
    $('#dataTable-viewProduct').DataTable({
        "lengthMenu": [[20, 40, 60], [20, 40, 60]]
    });
} );

</script>

<!-- footer -->
<?php include 'footer.php'; ?>
