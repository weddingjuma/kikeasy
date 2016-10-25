<?php
require_once '../db.php';

$productId = $_GET['productId'];

$stockmsg = "<div class='alert alert-danger' style='margin-top: 10px;'> Stock Already added. Try another Product.
<button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";

//Check product already availible stock
$sql2 = "SELECT product_id FROM stock WHERE product_id = '".$productId."'";
$result2 = mysqli_query($dbc, $sql2);

  if (mysqli_num_rows($result2) > 0){
      echo $stockmsg;

  } else {

  $sql1="SELECT * FROM product WHERE product_id = '".$productId."'";
  $result1 = mysqli_query($dbc,$sql1);

  echo "
  <div class='row'>
  <div class='col-lg-12' style='padding-top: 10px;'>
                          <div class='panel panel-default'>
                              <div class='panel-heading'>
                                  Product Deatils
                              </div>
                              <div class='panel-body'>
                                  <div class='table-responsive'>
                                      <table class='table'>
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Product Id</th>
                                                  <th>Name</th>
                                                  <th>Type</th>
                                                  <th>Colors</th>
                                              </tr>
                                          </thead>
                                          <tbody>";

                                              while($row1 = mysqli_fetch_array($result1)) {
                                                  echo "<tr>";
                                                  echo "<td>1</td>";
                                                  echo "<td>" . $row1['product_id'] . "</td>";
                                                  echo "<td>" . $row1['name'] . "</td>";
                                                  echo "<td>" . $row1['type'] . "</td>";
                                                  echo "<td>" . $row1['colors'] . "</td>";
                                                  echo "</tr>";
                                              }

                                echo "</tbody>
                                      </table>
                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>
                </div>";
  }
?>
