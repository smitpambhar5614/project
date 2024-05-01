
        <?php
        include 'connection.php';

        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="assets/images/favicon.ico">

            <link
                href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
                rel="stylesheet">

            <title>Astonish</title>

            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="assets/css/fontawesome.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/owl.css">

        </head>

        <body>

            <!-- ***** Preloader Start ***** -->
            <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
            <!-- ***** Preloader End ***** -->

            <!-- Header -->
            <?php
            include('header.php');
            ?>

            <!-- Page Content -->

            <div class="container">
                <div class="row">
                </div>
            </div>>

            <div class="products">
                <div class="container">
                    <div class="row">

                        <?php
                        include('connection.php');
                        $p_id = $_GET['p_id'];
                        $sql = "SELECT * FROM products where p_id=$p_id;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each row and print the product data
                            while ($row = mysqli_fetch_assoc($result)) {
                                $p_id = $row["p_id"];
                                $p_name = $row["p_name"];
                                $p_img = $row["p_img"];
                                $p_mrp = $row["p_mrp"];
                                $p_price = $row["p_price"];
                                $p_desc = $row["p_desc"];
                                ?>

                                <div class="col-md-4 col-xs-12">
                                    <div>
                                        <img src="assets\product-image\<?php echo $p_img; ?>" alt="" class="img-fluid wc-image">
                                    </div>
                                    <br>
                                </div>

                                <div class="col-md-8 col-xs-12">
                                    <form action="#" method="post" class="form">
                                        <h2>
                                            <?php echo $p_name ?>
                                        </h2>

                                        <br>

                                        <p class="lead">
                                            <small><del>₹
                                                    <?php echo $p_mrp; ?>
                                                </del></small><strong class="text-dark" style="font-weight: 500;">₹
                                                <?php echo $p_price; ?>
                                            </strong>
                                        </p>

                                        <br>

                                        <p class="lead">
                                            <?php echo $p_desc; ?>
                                        </p>


                                        <br>

                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="control-label">Quantity</label>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="number"
                                                                class="form-control form-control-lg text-center" name="qty"
                                                                value="1" min="1" max="10" style="width: 85px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="" method="post">
                                                            <?php
                                                            if (!isset($_SESSION['user_id'])) { ?>
                                                                <input type="submit"
                                                                    style="margin-top:5.5px; margin-left: 25px; height: 35px;"
                                                                    name="noWish" value="🖤">
                                                            <?php } else { ?>
                                                                <input type="submit"
                                                                    style="margin-top:5.5px; margin-left: 25px; height: 35px;"
                                                                    name="wishlist" value="🖤">
                                                            <?php } ?>

                                                            <?php
                                                            if (!isset($_SESSION['user_id'])) { ?>
                                                                <input type="submit" class="btn btn-dark btn-block"
                                                                    style="margin-top:-36px; margin-left: -130px; width: 150px;"
                                                                    name="noLogin" value="Add To Cart">
                                                            <?php } else { ?>
                                                                <input type="submit" class="btn btn-dark btn-block"
                                                                    style="margin-top:-36px; margin-left: -130px; width: 150px;"
                                                                    name="addtocart" value="Add To Cart">
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                        } else {
                            echo "No products found.";
                        }
                        mysqli_free_result($result);
                        mysqli_close($conn);

                        include 'connection.php';
                        if (isset($_POST['noWish'])) {
                            echo '<script>alert("Please login to add product in wishlist");</script>';
                        }

                        if (isset($_POST['noLogin'])) {
                            echo '<script>alert("Please login to purchase product");</script>';
                        }

                        if (isset($_POST['addtocart'])) {
                            $p_id = $_GET['p_id'];
                            $sql = "SELECT * FROM products where p_id=$p_id;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each row and print the product data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $user_id = $_SESSION['user_id'];
                                    $p_id = $row["p_id"];
                                    $p_name = $row["p_name"];
                                    $p_img = $row["p_img"];
                                    $qty = $_POST['qty'];
                                    $p_price = $row["p_price"];
                                    $p_desc = $row["p_desc"];

                                    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
                                }
                            }
                            if (mysqli_num_rows($check_cart_numbers) > 0) {
                                echo '<script>alert("already added to cart!");</script>';
                            } else {
                                mysqli_query($conn, "INSERT INTO `cart`(user_id, p_id, p_name, p_img, qty, p_price, p_desc) VALUES
           ('$user_id', '$p_id', '$p_name', '$p_img', '$qty', '$p_price' ,' $p_desc')") or die('query failed');
                                echo '<script>alert("product added to cart");';
                                echo "window.location.href ='cart.php'</script>";
                            }
                        }

                        if (isset($_POST['wishlist'])) {
                            $p_id = $_GET['p_id'];
                            $sql = "SELECT * FROM products where p_id=$p_id;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each row and print the product data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $user_id = $_SESSION['user_id'];
                                    $p_id = $row["p_id"];
                                    $p_name = $row["p_name"];
                                    $p_img = $row["p_img"];
                                    $qty = 1;
                                    $p_price = $row["p_price"];
                                    $p_desc = $row["p_desc"];

                                    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
                                }
                            }
                            if (mysqli_num_rows($check_cart_numbers) > 0) {
                                echo '<script>alert("already added to your wishlist!");</script>';
                            } else {
                                mysqli_query($conn, "INSERT INTO `wishlist`(user_id, p_id, p_name, p_img, qty, p_price, p_desc) VALUES
           ('$user_id', '$p_id', '$p_name', '$p_img', '$qty', '$p_price' ,' $p_desc')") or die('query failed');
                                echo '<script>alert("product added to your wishlist!");';
                                echo "window.location.href ='wishlist.php'</script>";
                            }
                        }

                        ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="latest-products">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading">
                                <h2>Similar Products</h2>
                                <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>

                        <?php
                        include('connection.php');
                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each row and print the product data
                            while ($row = mysqli_fetch_assoc($result)) {
                                $p_id = $row["p_id"];
                                $p_name = $row["p_name"];
                                $p_img = $row["p_img"];
                                $p_mrp = $row["p_mrp"];
                                $p_price = $row["p_price"];
                                $p_desc = $row["p_desc"];
                                ?>

                                <div class="col-md-4">
                                    <div class="product-item">
                                        <a href="product-details.php?p_id=<?php echo $p_id; ?>"><img
                                                src="assets\product-image\<?php echo $p_img; ?>" alt=""></a>
                                        <div class="down-content">
                                            <a href="product-details.php?p_id=<?php echo $p_id; ?>">
                                                <h4>
                                                    <?php echo $p_name; ?>
                                                </h4>
                                            </a>
                                            <h6><small><del>₹
                                                        <?php echo $p_mrp; ?>
                                                    </del></small>₹
                                                <?php echo $p_price; ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>


                            <?php }
                        } else {
                            echo "No products found.";
                        }
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        ?>


                    </div>
                </div>
            </div>

            <?php
            include('footer.php');
            ?>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <form action="#" id="contact">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input type="text" class="form-control" placeholder="Pick-up location"
                                                    required="">
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <input type="text" class="form-control" placeholder="Return location"
                                                    required="">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input type="text" class="form-control" placeholder="Pick-up date/time"
                                                    required="">
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <input type="text" class="form-control" placeholder="Return date/time"
                                                    required="">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter full name" required="">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter email address" required="">
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <input type="text" class="form-control" placeholder="Enter phone"
                                                    required="">
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Additional Scripts -->
            <script src="assets/js/custom.js"></script>
            <script src="assets/js/owl.js"></script>
        </body>

        </html>
        ----------------------------------------------------------
        cart


        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="assets/images/favicon.ico">
            <link
                href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
                rel="stylesheet">

            <title>Astonish</title>

            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="assets/css/fontawesome.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/owl.css">

        </head>

        <body>

            <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!-- ***** Preloader End ***** -->

            <!-- Header -->
            <?php
            include('header.php');

            if (!isset($_SESSION['user_id'])) {
                $user_id = "";
            } else {
                $user_id = $_SESSION['user_id'];
            }

            $cart_rows_number = 0;
            $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number);

            ?>

            <section class="pt-5 pb-5">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-12 col-12" style="margin-top:60px;">
                            <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                            <p class="mb-5 text-center">
                                <i class="text-dark font-weight-bold">
                                    <?php echo $cart_rows_number; ?>
                                </i> items in your cart
                            </p>


                            <?php
                            $sub_total = 0;
                            include('connection.php');
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <table id="shoppingCart" class="table table-condensed table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width:60%">Product</th>
                                            <th style="width:12%">Price</th>
                                            <th style="width:10%">Quantity</th>
                                            <th style="width:16%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $user_id = $_SESSION['user_id'];
                                        $sql = "SELECT * FROM `cart` WHERE user_id = '$user_id'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row and print the product data
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $cart_id = $row['cart_id'];
                                                $p_id = $row["p_id"];
                                                $p_name = $row["p_name"];
                                                $p_img = $row["p_img"];
                                                $qty = $row['qty'];
                                                $p_price = $row["p_price"];
                                                $p_desc = $row["p_desc"];

                                                if (isset($_POST['update'])) {
                                                    $qty = $_POST['qty'];
                                                    mysqli_query($conn, "UPDATE `cart` SET `qty` = '$qty' WHERE `cart_id` = '$cart_id'") or die('query failed');
                                                    echo "<script>alert('Quantity updated');";
                                                    echo "window.location.href ='cart.php'</script>";
                                                }

                                                if (isset($_POST['remove'])) {
                                                    $delete_id = $cart_id;
                                                    mysqli_query($conn, "DELETE FROM `cart` WHERE `cart_id` = '$delete_id'") or die('query failed');
                                                    echo "<script>alert('product remove form the cart');";
                                                    echo "window.location.href ='cart.php'</script>";
                                                }

                                                ?>
                                                <tr>
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-md-3 text-left">
                                                                <img src="assets\product-image\<?php echo $p_img; ?>" alt=""
                                                                    class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                            </div>
                                                            <div class="col-md-9 text-left mt-sm-2">
                                                                <h4>
                                                                    <?php echo $p_name; ?>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price">₹
                                                        <?php echo $p_price * $qty; ?>
                                                    </td>
                                                    <?php $sub_total = $sub_total + ($p_price * $qty); ?>
                                                    <td data-th="Quantity">
                                                        <form action="" method="post">
                                                            <input type="number" class="form-control form-control-lg text-center"
                                                                value="<?php echo $qty; ?>" min="1" max="10" name="qty">
                                                    </td>
                                                    <td class="actions" data-th="">
                                                        <div class="text-right">

                                                            <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                                value="update" name="update">
                                                                <i class="fas fa-sync"></i>
                                                            </button>

                                                            <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                                value="remove" name="remove">
                                                                <i class="fas fa-trash"></i>
                                                            </button>


                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        } else {
                                            echo "Your cart is empty";
                                        }
                            }
                            ?>

                                </tbody>
                            </table>
                            <div class="float-right text-right">
                                <h4>Subtotal:</h4>
                                <h1>₹
                                    <?php echo $sub_total; ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex align-items-center">
                        <div class="col-sm-6 order-md-2 text-right">
                            <a href="catalog.php" class="btn btn-dark mb-4 btn-lg pl-5 pr-5">Checkout</a>
                        </div>
                        <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                            <a href="products.php" style="color:black">
                                <i class="fas fa-arrow-left mr-2" style="color:black"></i> Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            include('footer.php');
            ?>



            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Additional Scripts -->
            <script src="assets/js/custom.js"></script>
            <script src="assets/js/owl.js"></script>
        </body>

        </html>

        --------------------------
        wishlist


        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="assets/images/favicon.ico">
            <link
                href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
                rel="stylesheet">

            <title>Astonish</title>

            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="assets/css/fontawesome.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/owl.css">

        </head>

        <body>

            <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!-- ***** Preloader End ***** -->

            <!-- Header -->
            <?php
            include('header.php');
            ?>

            <!-- Page Content -->

            <div class="container">
                <div class="row">
                </div>
            </div>

            <?php

            if (!isset($_SESSION['user_id'])) {
                $user_id = "";
            } else {
                $user_id = $_SESSION['user_id'];
            }


            $wishlist_rows_number = 0;
            $select_wish_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
            $wishlist_rows_number = mysqli_num_rows($select_wish_number);
            ?>
            <section class="pt-5 pb-5">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-12 col-12" style="margin-top:60px;">
                            <h3 class="display-5 mb-2 text-center">Wishlist</h3>
                            <p class="mb-5 text-center">
                                <i class="text-dark font-weight-bold">
                                    <?php echo $wishlist_rows_number; ?>
                                </i> items in your Wishlist
                            </p>


                            <?php
                            include('connection.php');
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <table id="shoppingCart" class="table table-condensed table-responsive" style="">
                                    <thead>
                                        <tr>
                                            <th style="width:60%">Product</th>
                                            <th style="width:12%">Price</th>
                                            <th style="width:16%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $user_id = $_SESSION['user_id'];
                                        $sql = "SELECT * FROM `wishlist` WHERE user_id = '$user_id'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row and print the product data
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $wish_id = $row['wish_id'];
                                                $p_id = $row["p_id"];
                                                $p_name = $row["p_name"];
                                                $p_img = $row["p_img"];
                                                $qty = $row['qty'];
                                                $p_price = $row["p_price"];
                                                $p_desc = $row["p_desc"];


                                                if (isset($_POST['cart'])) {
                                                    $sql = "SELECT * FROM products where p_id=$p_id;";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $user_id = $_SESSION['user_id'];
                                                            $p_id = $row["p_id"];
                                                            $p_name = $row["p_name"];
                                                            $p_img = $row["p_img"];
                                                            $qty = $row['qty'];
                                                            $p_price = $row["p_price"];
                                                            $p_desc = $row["p_desc"];

                                                            $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
                                                        }
                                                    }
                                                    if (mysqli_num_rows($check_cart_numbers) > 0) {
                                                        echo '<script>alert("already added to cart!");</script>';
                                                    } else {
                                                        mysqli_query($conn, "INSERT INTO `cart`(user_id, p_id, p_name, p_img, qty, p_price, p_desc) VALUES
                ('$user_id', '$p_id', '$p_name', '$p_img', '$qty', '$p_price' ,' $p_desc')") or die('query failed');
                                                        echo '<script>alert("product added to cart");';
                                                        echo "window.location.href ='wishlist.php'</script>";
                                                    }
                                                }

                                                if (isset($_POST['remove'])) {
                                                    $delete_id = $wish_id;
                                                    mysqli_query($conn, "DELETE FROM `wishlist` WHERE `wish_id` = '$delete_id'") or die('query failed');
                                                    echo "<script>alert('product remove form the wishlist');";
                                                    echo "window.location.href ='wishlist.php'</script>";
                                                }

                                                ?>
                                                <tr>
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-md-3 text-left">
                                                                <img src="assets\product-image\<?php echo $p_img; ?>" alt=""
                                                                    class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                            </div>
                                                            <div class="col-md-9 text-left mt-sm-2">
                                                                <h4>
                                                                    <?php echo $p_name; ?>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price">₹
                                                        <?php echo $p_price; ?>
                                                    </td>

                                                    <td class="actions" data-th="">
                                                        <div class="text-right">
                                                            <form action="" method="post">
                                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                                    name="cart" value="cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                                    name="remove" value="remove">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>


                                            <?php }
                                        } else {
                                            echo "You don't have any wished products";
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($conn);
                            }
                            ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left" style="margin-left: 450px;">
                        <a href="products.php" style="color:black">
                            <i class="fas fa-arrow-left mr-2" style="color:black"></i> Continue Shopping</a>
                    </div>
                </div>
                </div>
            </section>

            <?php
            include('footer.php');
            ?>


            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Additional Scripts -->
            <script src="assets/js/custom.js"></script>
            <script src="assets/js/owl.js"></script>
        </body>

        </html>