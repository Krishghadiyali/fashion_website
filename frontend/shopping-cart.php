<?php
require "commen.php"
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form method="POST">

                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $q = "SELECT * FROM `cart` WHERE 	`user-no` = '$_SESSION[email]'";
                                $result = mysqli_query($conn, $q);
                                
                                while ($data = mysqli_fetch_assoc($result)) {
                                    $idp = $data['product-no'];
                                    $productId = 'update' . $idp;
                                    $q1 = "SELECT * FROM `products` WHERE `id` = '$idp'";
                                    $result1 = mysqli_query($conn, $q1);
                                    $data1 = mysqli_fetch_assoc($result1);




                                ?>

                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="img/product/<?php echo $data1['photo']; ?>" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6><?php echo $data1['name']; ?></h6>
                                                <h5>$<?php echo $data1['price']; ?></h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" name="<?php echo $productId; ?>" value="<?php echo $data['cont']; ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">$<?php echo $data['cont'] * $data1['price']; ?></td>

                                        <td class="cart__close">
                                            <a href="remove_item_cart.php?data=<?php echo $idp; ?>" class="fa fa-close"></a>

                                        </td>
                                    </tr>
                                <?php
                                }


                                if (isset($_POST['update'])) {
                                    $qup = "SELECT * FROM `cart` WHERE 	`user-no` = '$_SESSION[email]'";
                                    $resultup = mysqli_query($conn, $qup);
                                    while ($data = mysqli_fetch_assoc($resultup)) {
                                        $idp = $data['product-no'];
                                        $upname = 'update' . $idp;
                                        $aaa = $_POST[$upname];
                                        $q9 = "UPDATE `cart` SET `cont`='$aaa' WHERE `product-no`='$idp'";
                                        $result9 = mysqli_query($conn, $q9);
                                        echo "<script>window.location ='shopping-cart.php'; </script>";// imp


                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.php">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button type="submit" name="update" style="border: none; background-color: transparent;"><a><i class="fa fa-spinner"></i>Update cart</a></button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
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
                    <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

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