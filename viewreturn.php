<?php
require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

$sql1 = "SELECT * FROM `return`";
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
          <div class="col-lg-12" style="color: #099268;">
              <h1 class="page-header">Return View / Edit</h1>
          </div>
      </div>

<div id="returnResult"></div>
      <!-- /.row -->
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="panel panel-default">
                                  <!-- /.panel-heading -->
                                  <div class="panel-body">
                                      <div class="dataTable_wrapper">
                                          <table class="table table-striped table-bordered table-hover" id="dataTable-viewReturn">
                                              <thead>
                                                  <tr>
                                                      <th>Return ID</th>
                                                      <th>National ID</th>
                                                      <th>Sale Type</th>
                                                      <th>Product ID</th>
                                                      <th>Rent /Sale ID</th>
                                                      <th>Route</th>
                                                      <th>Contact Number</th>
                                                      <th>Note</th>
                                                      <th>Added Date</th>
                                                      <th>Status</th>
                                                    </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                while( $row1 = mysqli_fetch_assoc($result1) )
                                                {
                                                ?>
                                                  <tr class="odd gradeX">
                                                      <td><?php echo $row1['return_id']; ?></td>
                                                      <td><?php echo $row1['cusnid']; ?></td>
                                                      <td><?php echo $row1['sale_type']; ?></td>
                                                      <td><?php echo $row1['rproductid']; ?></td>
                                                      <td><?php echo $row1['rent_sale_id']; ?></td>
                                                      <td><?php echo $row1['route']; ?></td>
                                                      <td><?php echo $row1['contact_num']; ?></td>
                                                      <td><?php echo $row1['note']; ?></td>
                                                      <td><?php echo $row1['add_date']; ?></td>
                                                      <td><select id="selects" class="form-control" onchange="returnStatus(this.value)">
                                                              <?php echo changeReturnStatus($row1['id']); ?>
                                                          </select>
                                                      </td>
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
// Change View Return Status
function returnStatus(str) {
  if (str == "") {
      document.getElementById("returnResult").innerHTML = "";
      return;
  } else {
       if (window.XMLHttpRequest) {
           xmlhttp = new XMLHttpRequest();
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
             document.getElementById("returnResult").innerHTML = "<div class='alert alert-success'> Save Successfully </div>";
                setTimeout(function() {
                    $('#returnResult').fadeOut('fast');
                }, 1500);
           }
       };
      // console.log(str);
       xmlhttp.open("GET","ajax/checkdata.php?fid=returnstatus&id="+str,true);
       xmlhttp.send();
   }
}

$(document).ready( function () {
    $('#dataTable-viewReturn').DataTable({
        "lengthMenu": [[20, 40, 60], [20, 40, 60]]
    });
} );
</script>

<!-- footer -->
<?php include 'footer.php'; ?>
