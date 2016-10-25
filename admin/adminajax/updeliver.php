<?php
require_once '../db.php';

$did = $_GET['deliverid'];

$sql = "SELECT * FROM deliver WHERE deliver_id='".$did."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>Deliver ID</label>
    <input class='form-control' name='d_id' value='".$row['deliver_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Vehical Number</label>
    <input class='form-control' name='v_number' value='".$row['vehicle_num']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Vehical Driver / Owner Name</label>
    <input class='form-control' name='vo_name' value='".$row['vo_name']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Phone Number</label>
    <input class='form-control' name='p_number' value='".$row['p_number']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Vehical Route</label>
    <input class='form-control' name='v_route' value='".$row['v_route']."' autocomplete='off' required>
</div>

<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
