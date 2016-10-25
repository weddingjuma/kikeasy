<?php
require_once 'db.php';

$supid = $_GET['supid'];

$sql = "SELECT * FROM product WHERE sup_id = '".$supid."'";
$result = mysqli_query($dbc,$sql);

?>

<!-- header -->
<?php include 'header.php'; ?>

<div id="wrapper">

<!-- Navigation -->
<?php include 'navigation.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">

      <div class="row page-header">

      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div class="dataTable_wrapper">
                          <table class="table table-striped table-bordered table-hover" id="dataTable-viewsupdata">
                              <thead>
                                  <tr>
                                      <th>Product Id</th>
                                      <th>Product Name</th>
                                      <th>quantity</th>

                                    </tr>
                              </thead>
                              <tbody>
                                <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>
                                  <tr class="odd gradeX">
                                      <td><?php echo $row['product_id']; ?></td>
                                      <td><?php echo $row['name']; ?></td>
                                      <th></th>
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

</div>

<script>
$(document).ready( function () {
    $('#dataTable-viewsupdata').DataTable({
    dom: 'Brtip',
      buttons: [
        'excel', 'pdf', 'print'
    ],
    "pageLength": 30,
  });
} );
</script>

<!-- footer -->
<?php include 'footer.php'; ?>
