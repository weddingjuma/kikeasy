<?php
require_once '../db.php';

$nid = $_GET['cusnid'];

$sql = "SELECT * FROM customer WHERE n_id='".$nid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>National Id Number</label>
    <input class='form-control' name='n_id' value='".$row['n_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Name</label>
    <input class='form-control' name='name' value='".$row['name']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Address</label>
    <input class='form-control' name='address' value='".$row['address']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Phone Number</label>
    <input class='form-control' name='p_number' value='".$row['p_number']."' autocomplete='off' required>
</div>

<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
