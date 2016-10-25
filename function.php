<?php
require_once 'db.php';
require_once 'logincheck.php';

//count sale id
function countId(){
  global $dbc;
  $sql = "SELECT sale_id FROM sale ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($dbc, $sql);
  $row = mysqli_fetch_array($result);
  $count = $row['sale_id'] + 1;
  return $count;
}

//count return id
function countReturnId(){
  global $dbc;
  $sql = "SELECT return_id FROM `return` ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($dbc, $sql);
  $row = mysqli_fetch_array($result);
  $count = $row['return_id'] + 1;
  return $count;
}


//reduce totoal stock
function changeStock($productId, $qty){
  global $dbc;
  $sql = "SELECT quantity FROM stock WHERE product_id = '".$productId."'";
  $result = mysqli_query($dbc, $sql);
  $row = mysqli_fetch_array($result);

  if ( $row['quantity'] >= $qty ) {
  $count1 = $row['quantity'] - $qty;
  $sql1 = "UPDATE stock SET quantity='".$count1."' WHERE product_id = '".$productId."'";
  mysqli_query($dbc, $sql1);
  }
}


//calculate paid total rent
function paidRentTotal($cardId){
  global $dbc;
  $sql = "SELECT payment FROM updaterent WHERE card_id = '".$cardId."'";
  $result = mysqli_query($dbc, $sql);
  $rentTotoal = 0;
    while($row = mysqli_fetch_array($result)){
      $payment = $row['payment'];
      $rentTotoal += $payment;
    }
    return $rentTotoal;
}


//total - advance
function needToPay($cardId){
  global $dbc;
  $sql = "SELECT * FROM rent WHERE card_id = '".$cardId."'";
  $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_array($result);
    $totadvTotal = $row['r_total'] - $row['advance'];
    return $totadvTotal;
}


//needtopay - paid rent amount
function needToPayRent($cardId){
  global $dbc;
  $sql1 = "SELECT * FROM rent WHERE card_id = '".$cardId."'";
  $result1 = mysqli_query($dbc, $sql1);

  $sql2 = "SELECT payment FROM updaterent WHERE card_id = '".$cardId."'";
  $result2 = mysqli_query($dbc, $sql2);

  $rentTotoal = 0;

    while($row = mysqli_fetch_array($result2)){
      $payment = $row['payment'];
      $rentTotoal += $payment;
    }

    $row = mysqli_fetch_array($result1);
    $totadvrenTotal = ($row['r_total'] - $row['advance'] ) - $rentTotoal;

    return $totadvrenTotal;
}


//check rent finish or not
function checkRent($cardId){
  global $dbc;
  $sql1 = "SELECT * FROM rent WHERE card_id = '".$cardId."'";
  $result1 = mysqli_query($dbc, $sql1);

  $sql2 = "SELECT payment FROM updaterent WHERE card_id = '".$cardId."'";
  $result2 = mysqli_query($dbc, $sql2);

  $rentTotoal = 0;

    while($row = mysqli_fetch_array($result2)){
      $payment = $row['payment'];
      $rentTotoal += $payment;
    }

    $row = mysqli_fetch_array($result1);
    $balance = ($row['r_total'] - $row['advance'] ) - $rentTotoal;

    if($balance <= 0 ){
      $rentStatus = 0; //finish
    } else{
      $rentStatus = 1; //pending
    }

    return $rentStatus;
}

//print rent status finish or pending (input -> status code 1 or 0)
function rentStatus($rStatus){
  if($rStatus == 0){
    $statusCode = "<span class='label label-sm label-success'>Finish</span>";
  } elseif ($rStatus == 1) {
    $statusCode = "<span class='label label-sm label-danger'>Pending</span>";
  }
  return $statusCode;
}

//count sales
function totalSales(){
  global $dbc;
  $sql = "SELECT COUNT(*) FROM sale";
  $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_array($result);
    $total = $row[0];
    return $total;
}

//count rents
function totalRents(){
  global $dbc;
  $sql = "SELECT COUNT(*) FROM rent";
  $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_array($result);
    $total = $row[0];
    return $total;
}

//count sales Income
function totalSalesIncome(){
  global $dbc;
  $sql = "SELECT SUM(bill_total) AS sum FROM sale";
  $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    $tot = $row['sum'];
    return $tot;
}

//Count Rent Income
function totalrentIncome(){
  global $dbc;
  $sql = "SELECT SUM(r_total) AS sum FROM rent";
  $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    $tot = $row['sum'];
    return $tot;
}

// Change Return Status
function changeReturnStatus($rowid){
  global $dbc;
  $sql = "SELECT status FROM `return` WHERE id='".$rowid."'";
  $result = mysqli_query($dbc, $sql);
  $row = mysqli_fetch_assoc($result);

  $code1 = "&stacode=1";
  $code2 = "&stacode=0";

 if($row['status'] == 1){
   $res = "<option selected value='$rowid$code1'>Pending</option>";
   $res .= "<option value='$rowid$code2'>Finish</option>";
 } elseif ($row['status'] == 0) {
   $res = "<option selected value='$rowid$code2'>Finish</option>";
   $res .= "<option value='$rowid$code1'>Pending</option>";
 }
 return $res;
}

?>
