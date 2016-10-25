<?php
require_once '../db.php';

$productId = $_GET['productId'];
$tab = $_GET['tab'];

$sql1="SELECT p.product_id, p.name, p.warranty, s.sale_price FROM product p JOIN stock s ON p.product_id = s.product_id WHERE p.product_id = '".$productId."'";
$result1 = mysqli_query($dbc,$sql1);
$row = mysqli_fetch_array($result1);

if($tab == 1){
echo "

<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['name']."' name='pname1' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['warranty']."' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['sale_price']."' name='psalep1' id='s_price1' class='form-control' readonly='readonly'>
</div>
";
}

if($tab == 2){
echo "

<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['name']."' name='pname2' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['warranty']."' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['sale_price']."' name='psalep2' id='s_price2' class='form-control' readonly='readonly'>
</div>
";
}

if($tab == 3){
echo "

<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['name']."' name='pname3' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['warranty']."' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['sale_price']."' name='psalep3' id='s_price3' class='form-control' readonly='readonly'>
</div>
";
}

if($tab == 4){
echo "

<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['name']."' name='pname4' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['warranty']."' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['sale_price']."' name='psalep4' id='s_price4' class='form-control' readonly='readonly'>
</div>
";
}

if($tab == 5){
echo "

<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['name']."' name='pname5' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['warranty']."' class='form-control' readonly='readonly'>
</div>
<div class='col-lg-2 form-group'>
    <input type='text' value='".$row['sale_price']."' name='psalep5' id='s_price5' class='form-control' readonly='readonly'>
</div>
";
}
?>
