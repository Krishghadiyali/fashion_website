<?php
require "commen.php";

require "connect.php";


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $q  = "SELECT * FROM `users-info` WHERE email='$email' && password = '$password';";
    $result = mysqli_query($conn, $q);

    if ($result) {
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            echo "<script>alert('you are login successfully ');</script>";
            echo "<script>window.location ='index.php'; </script>";
            // header("Location: page1.php");
            // exit();
        } else {
            $q1  = "SELECT email FROM `users-info` WHERE email='$email'";
            $result1 = mysqli_query($conn, $q1);
            $user = mysqli_fetch_assoc($result1);

            if ($user) {
                echo "<script>alert('Wrong Email Address or Password')</script>";
            } else {
                echo "<script>alert('you have no accounts')</script>";
            }
        }
    }
}
?>

    <div id="d1">

        <form action="" method="post" id="d2" autocomplete="off">
            <div class="c1">Login in to account</div>
            <input type="email" pattern="[^ @]*@[^ @]*" name="email" id="" required placeholder="Email">
            <input type="password" name="password" id="" required placeholder="Password">
            <button type="submit" class="btn1" name="login">Login</button>
            <!-- <button type="submit" class="btn1" name="forgot">Forgotten password?</button> -->
            <a href="email.php">Forgotten password?</a>
            <a href="registration.php" class="btn2">Create new account</a>

        </form>
    </div>
</body>


</html>