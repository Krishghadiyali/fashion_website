<?php
error_reporting(0);
require "connect.php";

session_start();




// $q = "SELECT `name` FROM `user` WHERE email = '$_SESSION[email]'";
// $result = mysqli_query($conn, $q);
// $user = mysqli_fetch_assoc($result);

///logotut
if (isset($_SESSION['email'])) {
    $status = 'Logout';
} else {
    $status = 'Signin';
}
if (isset($_GET['Logout'])) {

    echo "<script>alert('Do you want to logout?');</script>";
    echo "<script>window.location ='logout.php'; </script>";
}
if (isset($_GET['Signin'])) {
    echo "<script>window.location ='login.php'; </script>";
}
if (isset($_GET['ch_pass'])) {
    echo "<script>window.location ='changepass.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
    <link rel="stylesheet" href="ff.css" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <form action="" method="get" style="display: inline-block;">
                                    <button style="background-color: transparent; border: none; padding: 0%; margin-right: 25px;" type="submit" name="<?php echo $status; ?>"> <a><?php echo $status; ?></a>
                                    </button>
                                </form>
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">Shop</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <?php
                        if ($status == 'Logout') { ?>
                            <a href="profile.php"><img style="max-width : 11%;" src="img/profilepic-removebg-preview.png" alt=""></a>

                        <?php }

                        $qtc = "SELECT * FROM `cart` WHERE 	`user-no` = '$_SESSION[email]'";
                        $resulttc = mysqli_query($conn, $qtc);
                        $tprice = array();
                        $tamount = array();
                        $k=0;
                        while ($data = mysqli_fetch_assoc($resulttc)) {
                            $tprice[] = $data['cont'];
                            $idp = $data['product-no'];
                            $qta = "SELECT * FROM `products` WHERE `id` = '$idp'";
                            $resultta = mysqli_query($conn, $qta);
                            $datata = mysqli_fetch_assoc($resultta);
                            $tamount[] = $datata['price'];
                            $k++;
                        }

                        $data3 = array();

                        foreach ($tprice as $key => $value) {
                            $data3[$key] = $value * $tamount[$key];
                        }
                        $total = array_sum($data3);
                        ?>
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="#"><img src="img/icon/heart.png" alt=""></a>
                        <a  href="shopping-cart.php"><img src="img/icon/cart.png" alt=""> <span style="color: #e53637;"><?php echo $k; ?></span></a>
                        <div class="price" style="color: #e53637;">$<?php echo $total; ?></div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->