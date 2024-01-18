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
}
if (isset($_POST['place_order'])) {
    $country = $_POST['country'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $town_city = $_POST['town_city'];
    $state = $_POST['state'];
    $pin_no = $_POST['pin_no'];
    $q1 = "UPDATE `users-info` SET `country`='$country',`address1`='$address1',`address2`='$address2',`town-city`='$town_city',`state`='$state',`pin-no`='$pin_no' WHERE email='$_SESSION[email]'";
    $result1 = mysqli_query($conn, $q1);
}
if (isset($_POST['view_order'])) {
    echo "<script>window.location ='orders.php'; </script>";

}
?>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"> Welcome <?php echo $fname . ' ' . $lname; ?></h6>
                        <h3 class="checkout__title">Profile Details</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input name="fname" type="text" value="<?php echo $fname; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input name="lname" type="text" value="<?php echo $lname; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country" value="<?php echo $country; ?>">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address1" placeholder="Street Address" class="checkout__input__add" value="<?php echo $address1; ?>">
                            <input type="text" name="address2" placeholder="Apartment, suite, unite ect (optinal)" value="<?php echo $address2; ?>">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="town_city" value="<?php echo $town_city; ?>">
                        </div>
                        <div class="checkout__input">
                            <p>State<span>*</span></p>
                            <input type="text" name="state" value="<?php echo $state; ?>">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="pin_no" value="<?php echo $pin_no; ?>">
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
                                    <img style="margin-left: 72px;" src="img/profilepic-removebg-preview.png" alt="">
                                    <button name="place_order" type="submit" class="site-btn">UPDATE DETAILS</button>
                                    <button name="view_order" type="submit" class="site-btn">ORDERS</button>


                                </div>
                            </div>


                </div>

            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->