<?php
require_once 'db.php';
require_once 'logincheck.php';
$sql = "SELECT * FROM sale";
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
          <div class="col-lg-12" style="color: #3b5bdb;">
              <h1 class="page-header">Selling History</h1>
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
                                                      <th>Sale Id</th>
                                                      <th>Sale Date</th>
                                                      <th>National Id</th>
                                                      <th>Name</th>
                                                      <th>Address</th>
                                                      <th>Sub Total (Rs)</th>
                                                      <th>Discount %</th>
                                                      <th>Discount (Rs)</th>
                                                      <th>Total (Rs)</th>
                                                      <th>#</th>
                                                    </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                  <tr class="odd gradeX">
                                                      <td><?php echo $row['sale_id']; ?></td>
                                                      <td><?php echo $row['sale_date']; ?></td>
                                                      <td><?php echo $row['n_id']; ?></td>
                                                      <td><?php echo $row['name']; ?></td>
                                                      <td><?php echo $row['address']; ?></td>
                                                      <td><?php echo $row['total']; ?></td>
                                                      <td><?php echo $row['discount']; ?></td>
                                                      <td><?php echo $row['total'] - $row['bill_total']; ?></td>
                                                      <td><?php echo $row['bill_total']; ?></td>
                                                      <td><a href='print/index.php?sid=<?php echo $row['sale_id']; ?>' target="_blank"><i class='fa fa-print'></i></td>
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
    $('#dataTable-viewStock').DataTable( {
      dom: 'Bfrtip',
        buttons: [
          'excel', 'pdf', 'print'
      ],
      "pageLength": 30,
    });
} );
</script>

<!-- footer -->
<?php include 'footer.php'; ?>
