<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/18/2015
 * Time: 3:48 PM
 */

require_once 'connect.php';
require_once 'session_start.php';

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <?php include 'headerScripts.php'?>
</head>
<body>
    <div class="container">
        <div class="jumbotron col-lg-6 col-lg-offset-3">
<?php
if(!isset($_POST['username']) || !isset($_POST['password'])){
    ?>

            <h3>Signin</h3>
            <form action="" method="post" class="form-horizontal">
                <div class="gap">
                    <label>Username</label>
                    <input class="form-control" id="username" name="username" type="text" placeholder="username" required>
                </div>
                <div class="gap">
                    <label>Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="password" required>
                </div>
                <div class="gap">
                    <input class="btn btn-primary col-lg-12" type="submit" value="Signin">
                </div>
            </form>
            <br>
            <br>
            <div class="gap">
                <button class="btn btn-default col-lg-12"><a>Signup</a></button>
            </div>


<?php

}else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tdb = DB::getInstance();
    $tdb->query("select username from user where username = ? AND password = ?",array($username,$password));
    if($tdb->count()){
        $_SESSION['isLoggedIn'] = true;
        echo 'Login Successfull';
        echo "<a href='logout.php'>logout</a>";
    }else{
        echo 'Credentials doesn\'t match';
    }
}


?>
        </div>
    </div>
</body>
</html>
