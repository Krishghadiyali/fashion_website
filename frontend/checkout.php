<?php

require "commen.php";
if (isset($_SESSION['email'])) {
    $q = " SELECT * FROM `users-info` WHERE email='$_SESSION[email]'";
    $result = mysqli_query($conn, $q);
    $data = mysqli_fetch_assoc($result);
    $fname = $data['first-name'];
    $lname = $data['last-name'];
    $country = $data['country'];
    $address1 = $data['address1'];
    $address2 = $data['address2'];
    $town_city = $data['town-city'];
    $state = $data['state'];
    $pin_no = $data['pin-no'];
    $phone_no = $data['phone-no'];
    $email = $data['email'];
    $password = $data['password'];
} else {
    echo "<script>alert('You have no account, first create your account ')</script>";
    echo "<script>window.location ='registration.php'; </script>";
}

?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                    here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input name="fname" type="text" value="<?php echo $fname; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input name="lname" type="text" value="<?php echo $lname; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" value="<?php echo $country; ?>" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address1" placeholder="Street Address" class="checkout__input__add" value="<?php echo $address1; ?>"required>
                                <input type="text" name="address2" placeholder="Apartment, suite, unite ect (optinal)" value="<?php echo $address2; ?>"required>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town_city" value="<?php echo $town_city; ?>"required>
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state" value="<?php echo $state; ?>"required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="pin_no" value="<?php echo $pin_no; ?>"required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone_no" value="<?php echo $phone_no; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="<?php echo $email; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <?php
                                    $q = "SELECT * FROM `cart` WHERE 	`user-no` = '$_SESSION[email]'";
                                    $result = mysqli_query($conn, $q);
                                    $k = 0;
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $idp = $data['product-no'];
                                        $q1 = "SELECT * FROM `products` WHERE `id` = '$idp'";
                                        $result1 = mysqli_query($conn, $q1);
                                        $data1 = mysqli_fetch_assoc($result1);
                                        $k++;
                                    ?>

                                        <li><?php echo $k; ?>.<?php echo $data1['name']; ?><span>$<?php echo $data['cont'] * $data1['price']; ?></span></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <ul class="checkout__total__all">
                                    <?php
                                    $qtc = "SELECT * FROM `cart` WHERE 	`user-no` = '$_SESSION[email]'";
                                    $resulttc = mysqli_query($conn, $qtc);
                                    $tprice = array();
                                    $tamount = array();

                                    while ($data = mysqli_fetch_assoc($resulttc)) {
                                        $tprice[] = $data['cont'];
                                        $idp = $data['product-no'];
                                        $qta = "SELECT * FROM `products` WHERE `id` = '$idp'";
                                        $resultta = mysqli_query($conn, $qta);
                                        $datata = mysqli_fetch_assoc($resultta);
                                        $tamount[] = $datata['price'];
                                    }
                                    $data3 = array();
                                    foreach ($tprice as $key => $value) {
                                        $data3[$key] = $value * $tamount[$key];
                                    }
                                    $total = array_sum($data3);
                                    ?>
                                    <li>Subtotal <span>$<?php echo $total; ?></span></li>
                                    <li>Total <span>$<?php echo $total; ?></span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <?php
                                if (isset($_POST['place_order'])) {
                                    $country = $_POST['country'];
                                    $address1 = $_POST['address1'];
                                    $address2 = $_POST['address2'];
                                    $town_city = $_POST['town_city'];
                                    $state = $_POST['state'];
                                    $pin_no = $_POST['pin_no'];
                                    $q1 = "UPDATE `users-info` SET `country`='$country',`address1`='$address1',`address2`='$address2',`town-city`='$town_city',`state`='$state',`pin-no`='$pin_no' WHERE email='$_SESSION[email]'";
                                    $result1 = mysqli_query($conn, $q1);


                                    //////////////////////////////////////////////////
                                    $qplace = "SELECT * FROM `cart` WHERE 	`user-no` = '$_SESSION[email]'";
                                    $resultplace = mysqli_query($conn, $qplace);
                                    $k = 0;
                                    while ($data = mysqli_fetch_assoc($resultplace)) {
                                        $idp = $data['product-no'];
                                        $contp = $data['cont'];
                                        $q1 = "SELECT * FROM `products` WHERE `id` = '$idp'";
                                        $result1 = mysqli_query($conn, $q1);
                                        $data1 = mysqli_fetch_assoc($result1);
                                        $pricep = $data1['price'];
                                        $q2 = "INSERT INTO `ordered`( `user`, `product_id`, `product_cont`, `product_amount`) VALUES ('$_SESSION[email]','$idp','$contp','$pricep')";
                                        $result2 = mysqli_query($conn, $q2);
                                    }
                                    $deletecart = "DELETE FROM `cart` WHERE `user-no`='$_SESSION[email]';";
                                    $resuldelete = mysqli_query($conn, $deletecart);
                                    echo "<script>alert('Your order are place please continue shoping')</script>";
                                    echo "<script>window.location ='orders.php'; </script>";

                                }
                                ?>
                                <button name="place_order" type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>