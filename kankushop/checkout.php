<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>KANKU</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#checkout-form').validate({
                rules: {
                    title: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true
                    },
                    address1: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    zip: {
                        required: true,
                        number: true
                    },
                    country: {
                        required: true
                    },
                    payment: {
                        required: true
                    },
                    terms: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "Please select your title"
                    },
                    name: {
                        required: "Please enter your name"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        number: "Please enter a valid phone number"
                    },
                    address1: {
                        required: "Please enter your address"
                    },
                    city: {
                        required: "Please enter your city"
                    },
                    state: {
                        required: "Please enter your state"
                    },
                    zip: {
                        required: "Please enter your zip code",
                        number: "Please enter a valid zip code"
                    },
                    country: {
                        required: "Please select your country"
                    },
                    payment: {
                        required: "Please select a payment method"
                    },
                    terms: {
                        required: "You must agree to the terms and conditions"
                    }
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    error.addClass("help-block");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).closest(".form-group").addClass("has-error");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest(".form-group").removeClass("has-error");
                }
            });
        });
    </script>

</head>

<body>


    <div class="wrap">
        <?php 
            include_once("config.php");
            include("header.php"); 
            
            $sub_total=$_GET['sub_total'];
            

            if (isset($_POST['submit'])) 
            {
                $u_id;
                $total = $_POST['total'];
                $title = $_POST['title'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
                $country = $_POST['country'];
                $payment = $_POST['payment'];
                $status = "Pending";

                $sql = mysqli_query($conn, "INSERT INTO orders(user_id, total, pre_name, name, email, mno, address1, address2, city, state, zip, country, payment, status) 
                                                    VALUES ('$u_id','$total','$title','$name','$email','$phone','$address1','$address2','$city','$state','$zip','$country','$payment','$status')")or die('query failed');
            
                echo "<script>alert('Order Placed Successfully - Track Order');";
                echo "window.location.href = 'index.php';</script>";
                mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$u_id'") or die('query failed');
            }
        ?>   
    </div>

    <section class="banner banner-secondary" id="top" style="background-color:rgba(255, 0, 0, 0.66);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <h3 style="color:white; text-align:center;">Checkout</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 pull-right">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <em>Sub-total</em>
                                    </div>

                                    <div class="col-xs-6 text-right">
                                        <strong>₹ <?php echo $sub_total; ?></strong>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <em>Extra</em>
                                    </div>

                                    <div class="col-xs-6 text-right">
                                        <strong>₹ 0</strong>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <em>Tax 5%</em>
                                    </div>

                                    <div class="col-xs-6 text-right">
                                        <strong>₹ <?php echo (($sub_total * 5)/100); ?></strong>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <b>Total</b>
                                    </div>

                                    <div class="col-xs-6 text-right">
                                        <strong>₹ <?php echo $sub_total + (($sub_total * 5)/100); ?></strong>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        <form id="checkout-form" action="" method="post">
                            <input type="hidden" name="total" value="<?php echo $sub_total + (($sub_total * 5)/100); ?>">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Title:</label>
                                        <select class="form-control" name="title">
                                            <option value="">-- Select --</option>
                                            <option value="dr">Dr.</option>
                                            <option value="miss">Miss</option>
                                            <option value="mr">Mr.</option>
                                            <option value="mrs">Mrs.</option>
                                            <option value="ms">Ms.</option>
                                            <option value="other">Other</option>
                                            <option value="prof">Prof.</option>
                                            <option value="rev">Rev.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Name:</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Phone:</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Address 1:</label>
                                        <input type="text" class="form-control" name="address1">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Address 2:</label>
                                        <input type="text" class="form-control" name="address2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">City:</label>
                                        <input type="text" class="form-control" name="city">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">State:</label>
                                        <input type="text" class="form-control" name="state">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Zip:</label>
                                        <input type="text" class="form-control" name="zip">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Country:</label>
                                        <select class="form-control" name="country">
                                            <option value="">-- Select --</option>
                                            <option value="India">India</option>
                                            <option value="Australia">Australia</option>
                                            <option value="United-States">United States</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Payment method</label>
                                        <select class="form-control" name="payment">
                                            <option value="">-- Select --</option>
                                            <option value="cod">Cash On Delivery</option>
                                            <option value="bank" disabled>Bank account</option>
                                            <option value="paypal" disabled>PayPal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    <input type="checkbox" name="terms">
                                    I agree with the <a href="terms.php" target="_blank">Terms &amp;
                                        Conditions</a>
                                </label>
                            </div>

                            <div class="clearfix">
                                <div class="blue-button pull-left">
                                    <a href="cart.php">Back</a>
                                </div>

                                <div class="blue-button pull-right">
                                    <input type="submit" name="submit" value="Finish"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php include("footer.php"); ?>

</body>

</html>