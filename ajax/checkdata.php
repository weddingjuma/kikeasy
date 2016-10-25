<?php
require_once '../db.php';

$fId = $_GET['fid'];

  if($fId == 'cardid'){
    $cId = $_GET['cid'];
    checkcardid();
  }

  if($fId == 'prodid'){
    $pId = $_GET['pid'];
    checkpordid();
  }

  if($fId == 'supid'){
    $supId = $_GET['sid'];
    checksupid();
  }

  if($fId == 'dilid'){
    $dId = $_GET['did'];
    checkdilid();
  }

  if($fId == 'returnstatus'){
    $rId = $_GET['id'];
    $stacode = $_GET['stacode'];
    returnStatus();
  }


function checkcardid(){
  global $dbc, $cId;
  $sql = "SELECT card_id FROM rent WHERE card_id = '".$cId."'";
  $result = mysqli_query($dbc,$sql);

    if(mysqli_num_rows($result) > 0 ){

      $result = "<div class='alert alert-danger'> Card ID Already Taken. Try Another One. </div>";
    } else {
      $result ="";
    }
    echo $result;
}

function checkpordid(){
  global $dbc, $pId;
  $sql = "SELECT product_id FROM product WHERE product_id = '".$pId."'";
  $result = mysqli_query($dbc,$sql);

    if(mysqli_num_rows($result) > 0 ){

      $result = "<div class='alert alert-danger'> Product ID Already Taken. Try Another One. </div>";
    } else {
      $result ="";
    }
    echo $result;
}

function checksupid(){
  global $dbc, $supId;
  $sql = "SELECT sup_id FROM supplier WHERE sup_id = '".$supId."'";
  $result = mysqli_query($dbc,$sql);

    if(mysqli_num_rows($result) > 0 ){

      $result = "<div class='alert alert-danger'> Supplier ID Already Taken. Try Another One. </div>";
    } else {
      $result ="";
    }
    echo $result;
}

function checkdilid(){
  global $dbc, $dId;
  $sql = "SELECT deliver_id FROM deliver WHERE deliver_id = '".$dId."'";
  $result = mysqli_query($dbc,$sql);

    if(mysqli_num_rows($result) > 0 ){

      $result = "<div class='alert alert-danger'> Deliver ID Already Taken. Try Another One. </div>";
    } else {
      $result ="";
    }
    echo $result;
}

//change viewrent Status database code
function returnStatus(){
  global $dbc, $rId, $stacode;
  $sql = "UPDATE `return` SET status='".$stacode."' WHERE id='".$rId."'";
  mysqli_query($dbc,$sql);
}
?>
