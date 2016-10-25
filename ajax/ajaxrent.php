<?php
require_once '../db.php';
require_once '../function.php';

$cardId = $_GET['cardid'];

$paidRentTotal = paidRentTotal($cardId);
$needToPayRent = needToPayRent($cardId);

$sql1="SELECT card_id, n_id, product_id, r_total, advance FROM rent WHERE card_id = '".$cardId."'";
$sql2="SELECT payment, up_time FROM updaterent WHERE card_id = '".$cardId."'";
// $sql1="SELECT r.card_id, r.n_id, r.product_id, r.r_total, r.advance, u.payment, u.up_time FROM rent r JOIN updaterent u ON r.card_id = u.card_id WHERE u.card_id = '".$cardId."'";
$result1 = mysqli_query($dbc,$sql1);
$result2 = mysqli_query($dbc,$sql2);

$row1 = mysqli_fetch_assoc($result1);
echo "
<div class='row col-md-12'>
  <div class='form-group col-md-4'>
      <label>Card Id</label>
      <input type='text' class='form-control' name='card_id' value='".$row1['card_id']."' readonly='readonly'>
  </div>
  <div class='form-group col-md-4'>
      <label>National Id Card</label>
      <input type='text' class='form-control' value='".$row1['n_id']."' readonly='readonly'>
  </div>
  <div class='form-group col-md-4'>
      <label>Product Id</label>
      <input type='text' class='form-control' value='".str_replace(' ', ',' ,$row1['product_id'])."' readonly='readonly'>
  </div>
</div>

<div class='row'>
                  <div class='col-lg-8'>
                        <div class='panel panel-default'>
                            <div class='panel-body'>
                                <div class='table-responsive'>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Payments</th>
                                            </tr>
                                        </thead>
                                        <tbody>";

                                if(mysqli_num_rows($result2) > 0 ){
                                    while($row2 = mysqli_fetch_assoc($result2)) {

                                          echo "<tr>";
                                          echo "<td> ".$row2['up_time']." </td>";
                                          echo "<td> ".$row2['payment']." </td>";
                                          echo "</tr>";
                                  }} else {
                                      echo "<td> <h3 class='text-center' style='padding-left:100px;'>No Data Found ! </h3></td>";
                                  }

                                echo "</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class='col-lg-4'>
                       <div class='panel panel-primary'>
                           <div class='panel-heading'>
                               Summery
                           </div>
                           <div class='panel-body'>
                             <div class='col-lg-6'>
                               <p>Price :</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>".$row1['r_total']."</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>Advance :</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>".$row1['advance']."</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>Paid Total Rent :</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>".$paidRentTotal."</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>Need To Pay Rent :</p>
                             </div>
                             <div class='col-lg-6'>
                               <p>".$needToPayRent."</p>
                             </div>

                       </div>
                   </div>
</div>";


?>
