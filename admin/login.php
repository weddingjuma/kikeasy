<?php
session_start();

if(isset($_SESSION['admin_user'])) {
 header('location: updatecus.php');
}

$msg = "";

// Login user details
$logins = array('admin1' => 'admin1');

if(isset($_POST['submit'])) {
  $adminUserName = $_POST['adminusername'];
  $adminPassWord = $_POST['adminpassword'];

  if(!empty($adminUserName) && !empty($adminPassWord)){

    if ( isset($logins[$adminUserName]) && $logins[$adminUserName] == $adminPassWord ){
      $_SESSION['admin_user'] = $logins[$adminUserName];
      header('Location: updatecus.php');
    } else {
      $msg = "<div class='alert alert-success'> No user found. Try agian.
      <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";

    }

  } else {
    $msg = "<div class='alert alert-success'> Fill all Username And Password.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
}
}

?>

<!-- header -->
<?php include 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

              <?php echo $msg; ?>

            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="UserName" autocomplete="off" name="adminusername" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" autocomplete="off" name="adminpassword" type="password" required>
                            </div>

                            <input type="submit" class="btn btn-lg btn-success btn-block" name="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>
