<?php
require "commen.php";

?>
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
                                $q = "SELECT * FROM `ordered` WHERE 	`user` = '$_SESSION[email]'";
                                $result = mysqli_query($conn, $q);
                                $insert_count = array();
                                $k = 0;
                                while ($data = mysqli_fetch_assoc($result)) {
                                    $idp = $data['product_id'];
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
                                                    <input type="text"  value="<?php echo $data['product_cont']; ?>" readonly>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">$<?php echo $data['product_cont'] * $data['product_amount']; ?></td>

                                        <td class="cart__close">
                                            <a class="fa fa-close"></a>

                                        </td>
                                    </tr>
                                <?php
                                }


                                ?>

                            </tbody>
                        </table>
                    </div>
                    
                </form>

            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>TOTAL AMOUNT</h6>
                  
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <?php
                        $qtc = "SELECT * FROM `ordered` WHERE 	`user` = '$_SESSION[email]'";
                        $resulttc = mysqli_query($conn, $qtc);
                        $tprice = array();
                        $tamount = array();

                        while ($data = mysqli_fetch_assoc($resulttc)) {
                            $tprice[] = $data['product_cont'];
                            $idp = $data['product_id'];
                            $qta = "SELECT * FROM `products` WHERE `id` = '$idp'";
                            $resultta = mysqli_query($conn, $qta);
                            $datata = mysqli_fetch_assoc($resultta);
                            $tamount[] = $data['product_amount'];
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
                    <a href="shop.php" class="primary-btn">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->