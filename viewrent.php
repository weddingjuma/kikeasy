<?php
require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

$sql1 = "SELECT * FROM rent";
$result1 = mysqli_query($dbc, $sql1);
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
          <div class="col-lg-12" style="color: #1b6ec2;">
              <h1 class="page-header">Rent History</h1>
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
                                                      <th>Card Id</th>
                                                      <th>Name</th>
                                                      <th>Products ID</th>
                                                      <th>Rent Price</th>
                                                      <th>Advance</th>
                                                      <th>Paid Tot Rent</th>
                                                      <th>Purches Date</th>
                                                      <th>Route</th>
                                                      <th>Referee</th>
                                                      <th>Status</th>
                                                    </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                while($row = mysqli_fetch_assoc($result1))
                                                {
                                                ?>
                                                  <tr class="odd gradeX">
                                                      <td><?php echo $row['card_id']; ?></td>
                                                      <td><?php echo $row['name']; ?></td>
                                                      <td><?php echo str_replace(' ', ',' ,$row['product_id']); ?></td>
                                                      <td><?php echo $row['r_total']; ?></td>
                                                      <td><?php echo $row['advance']; ?></td>
                                                      <td><?php echo paidRentTotal($row['card_id']); ?></td>
                                                      <td><?php echo $row['rent_date']; ?></td>
                                                      <td><?php echo $row['route']; ?></td>
                                                      <td><?php echo $row['referee']; ?></td>
                                                      <td><?php echo rentStatus($row['status']); ?></td>
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
