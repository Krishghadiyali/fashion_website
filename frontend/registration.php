<?php

require "commen.php";

if (isset($_POST['submit_data'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    if ($password == $con_password) {
        $q = "INSERT INTO `users-info`VALUES ('$fname','$lname','','','','','','','$phone_no','$email','$password')";
        $result = mysqli_query($conn, $q);
        echo "<script>alert('You are successfully Register')</script>";
        echo "<script>window.location ='login.php'; </script>";
    } else {
        echo "<script>alert('Do not mach password')</script>";
    }
}
?>



    <div id="d1">

        <form action="" method="POST" id="d2">
            <div class="c1">Create a new account</div>
            <div class="c2">It's quick and easy.</div>
            <input type="text" name="fname" id="" required placeholder="First Name">
            <input type="text" name="lname" id="" required placeholder="Last Name">
            <input type="tel" pattern="[0-9]{10}" name="phone_no" onkeyup="check();  return false;" id="phone_no" required placeholder="Phone_no"><span id="message"></span>
            <input type="email" pattern="[^ @]*@[^ @]*" name="email" id="" required placeholder="Email">
            <input type="password" name="password" id="" required placeholder="Password">
            <input type="password" name="con_password" id="" required placeholder="Confirm Password">
            <button type="submit" class="btn1" name="submit_data">Sign Up</button>
            <a href="login.php">Already have an account?</a>
        </form>

    </div>


</body>
<script>
    function check() {

        var mobile = document.getElementById('phone_no');


        var message = document.getElementById('message');

        var goodColor = "#e6f1ff";
        var badColor = "rgb(255, 231, 231)";
        var badColor1 = "rgb(254, 75, 75)";


        if (mobile.value.length != 10) {

            mobile.style.backgroundColor = badColor;
            message.style.color = badColor1;
            message.innerHTML = "required 10 digits, match requested format!"
        } else {
            mobile.style.backgroundColor = goodColor;
            message.innerHTML = null;

        }

    }
</script>

</html>