<?php
require_once '../db.php';

$did = $_GET['deliverid'];

$sql = "SELECT * FROM deliver WHERE deliver_id = '".$did."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM deliver_product WHERE deliver_id = '".$did."'";
$result1 = mysqli_query($dbc, $sql1);


echo "
<div class='col-lg-8'>
  <div class='form-group'>
      <label>Vehicle Number</label>
      <input type='text' class='form-control' value='".$row['vehicle_num']."' readonly='readonly'>
  </div>
  <div class='form-group'>
      <label>Vehicle Driver / Owner Name</label>
      <input type='text' class='form-control' value='".$row['vo_name']."' readonly='readonly'>
  </div>
  <div class='form-group'>
      <label>Phone Number</label>
      <input type='text' class='form-control' value='".$row['p_number']."' readonly='readonly'>
  </div>
  <div class='form-group'>
      <label>Route</label>
      <input type='text' class='form-control' value='".$row['v_route']."' readonly='readonly'>
  </div>
  </div>


  <div class='row'>
            <div class='col-lg-12'>
                <div class='panel'>
                    <div class='panel-body'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Id</th>
                                        <th>Quantity</th>
                                        <th>More</th>
                                      </tr>
                                </thead>
                                <tbody>";
?>
<?php
                                  while($row1 = mysqli_fetch_assoc($result1))
{
  ?>
  <?php

                                echo "<tr class='odd gradeX'>";
                                echo "<td>#<div class='hidden'><input type='text' name='id[]' value='".$row1['id']."'></input></div></td>";
                                echo "<td>".$row1['product_id']."</td>";
                                echo "<td><input type='text' class='form-control' name='qty[]' value='".$row1['d_quantity']."'</input></td>";
                                echo "<td><button type='submit' name='submit' class='btn btn-primary'>Save Change</button></td>";
                                echo "</tr>";

?>
<?php
}
?>
<?php
                              echo "</tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>


";

?>
