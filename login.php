<?php
session_start();

if(isset($_SESSION['login_user'])) {
 header('location: index.php');
}

$msg = "";

// Login user details
$logins = array('admin' => 'admin');

if(isset($_POST['submit'])) {
  $userName = $_POST['username'];
  $passWord = $_POST['password'];

  if(!empty($userName) && !empty($passWord)){

    if ( isset($logins[$userName]) && $logins[$userName] == $passWord ){
      $_SESSION['login_user'] = $logins[$userName];
      header('Location: index.php');
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
                    <h2 align='center' class="panel-title"><strong>Kikeasy</strong></h2>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="UserName" autocomplete="off" name="username" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" autocomplete="off" name="password" type="password" required>
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
