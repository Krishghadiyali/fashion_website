<?php

require "commen.php";
if (isset($_POST['submit_pass'])) {
    $_SESSION['email'] = $_POST['email'];
    $q  = "SELECT * FROM `users-info` WHERE email='$_SESSION[email]';";
    $result = mysqli_query($conn, $q);
    $user = mysqli_fetch_assoc($result);

    if ($result) {
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            function get_password($str, $len = 8)
            {
                $pass = "";
                $str_length = strlen($str);
                for ($i = 0; $i < $len; $i++) {
                    $pass .= $str[rand(0, $str_length)];
                }
                return $pass;
            }
            $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$&*!";
            $_SESSION['pass'] = get_password($str);
            //////////////////////////////////////////////////
            date_default_timezone_set('Asia/Calcutta');
            $to = $_POST['email'];
            $cc = $_POST['email'];
            $from = "200305105021@paruluniversity.ac.in";
            $sub = 'New password';
            $headers = "From: $from\r\n" .
                "Cc: $cc \r\n" .
                'X-Mailer: PHP/' . phpversion() . "\r\n" .
                "MIME-Version: 1.0\r\n" .
                "Content-Type: text/html; charset=utf-8\r\n" .
                "Content-Transfer-Encoding: 8bit\r\n\r\n";
            $mess = '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="aa.css">
                <style>
                    #d1 {
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        padding-top: 5%;
            
                    }
            
                    #d2 {
            
                        width: 32%;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        justify-content: center;
                        background-color: white;
                        border-radius: 8px 8px 8px 8px;
                        padding-top: 3%;
                        padding-bottom: 3%;
                        padding-left: 2%;
                        padding-right: 2%;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            
            
                    }
            
                    .c1 {
                        font-size: 200%;
                        font-weight: bolder;
                        margin-bottom: 3%;
                    }
            
                    .c2 {
                        font-size: 150%;
                        margin-bottom: 3%;
                    }
                </style>
            </head>
            
            <body>
                <div id="d1">
                    <div id="d2">
            
                        <div class="c2">Hello '. $user['name'].'Your Password is </div>
                        <div class="c1">'. $_SESSION['pass'] .'</div>
            
                    </div>
            
                </div>
            </body>
            
            </html>';
                $ee=mail($to,$sub,$mess,$headers);






            /////////////////////////////////////////////////
            echo "<script>alert('email send to $_SESSION[email]')</script>";
            echo "<script>window.location ='forgot.php'; </script>";// imp
            // header("Location: forgot.php");
            // exit();
        } else {

            echo "<script>alert('you have no accounts')</script>";
        }
    }
}






?>


    <div id="d1">
        <form action="" method="post" id="d2" autocomplete="off">
            <div class="c1">Forgot Password</div>
            <input type="email" name="email" id="" required placeholder="Enter An Email">
            <button type="submit" class="btn1" name="submit_pass">Get password on email id</button>


        </form>
    </div>

</body>

</html>
