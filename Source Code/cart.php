<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Shopping cart management subsystem. Handles stateful persistence of 
 * user selections, order placement, and inventory synchronization.
 *
 * @category   Full Stack Web Application
 * @package    Digital Bookstore Management System
 * @author     Amey Thakur <https://github.com/Amey-Thakur>
 * @author     Mega Satish <https://github.com/msatmod>
 * @license    MIT License
 * @link       https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE
 * @date       2021-08-28
 */

session_start();
if (!isset($_SESSION['user']))
    header("location: index.php?Message=Login To Continue");

include "dbconnect.php";
$customer = $_SESSION['user'];

/**
 * Transactional Triggers
 * Handles asynchronous-style requests for order placement and item removal.
 */
if (isset($_GET['place'])) {
    $query = "DELETE FROM cart WHERE Customer='$customer'";
    $result = mysqli_query($con, $query);
    ?>
    <script type="text/javascript">
        alert("Order Successfully Placed!! Kindly Keep the cash Ready. It will be collected on Delivery");
        window.location.href = "index.php";
    </script>
    <?php
}

if (isset($_GET['remove'])) {
    $product = mysqli_real_escape_string($con, $_GET['remove']);
    $query = "DELETE FROM cart WHERE Customer='$customer' AND Product='$product'";
    $result = mysqli_query($con, $query);
    ?>
    <script type="text/javascript">
        alert("Item Successfully Removed");
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart">
    <meta name="author" content="Amey Thakur">
    <title>Shopping Cart | Digital Bookstore</title>

    <!-- UI Framework Dependencies -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>
        #cart {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .panel {
            border: 1px solid #D67B22;
            padding-left: 0px;
            padding-right: 0px;
        }

        .panel-heading {
            background: #D67B22 !important;
            color: white !important;
        }

        @media only screen and (width: 767px) {
            body {
                margin-top: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="padding: 1px;">
                    <img class="img-responsive" alt="Brand" src="img/logo.jpg" style="width: 147px;margin: 0px;">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    /**
                     * Session Lifecycle Control
                     * Renders user-specific navigation elements (Logout) if authenticated.
                     */
                    if (isset($_SESSION['user'])) {
                        echo ' <li> <a href="destroy.php" class="btn btn-lg"> <span class="glyphicon glyphicon-log-out"></span> LogOut </a> </li>';
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- Search Interface Section -->
    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" method="POST" action="Result.php">
                    <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;"
                        placeholder="Search for a Book , Author Or Category">
                </form>
            </div>
        </div>

        <?php
        echo '<div class="container-fluid" id="cart">
                <div class="row">
                    <div class="col-xs-12 text-center" id="heading">
                        <h2 style="color:#D67B22;text-transform:uppercase;"> YOUR CART </h2>
                    </div>
                </div>';

        if (isset($_SESSION['user'])) {
            /**
             * Cart Synchronization Logic
             * Handles addition/updating of items in the cart repository.
             */
            if (isset($_GET['ID'])) {
                $product = mysqli_real_escape_string($con, $_GET['ID']);
                $quantity = (int) $_GET['quantity'];

                $check_query = "SELECT * FROM cart WHERE Customer='$customer' AND Product='$product'";
                $check_result = mysqli_query($con, $check_query);

                if (mysqli_num_rows($check_result) == 0) {
                    $insert_query = "INSERT INTO cart (Customer, Product, Quantity) VALUES ('$customer', '$product', '$quantity')";
                    mysqli_query($con, $insert_query);
                } else {
                    $update_query = "UPDATE cart SET Quantity=$quantity WHERE Customer='$customer' AND Product='$product'";
                    mysqli_query($con, $update_query);
                }
            }

            /**
             * Aggregation & presentation
             * Executes an INNER JOIN to retrieve descriptive metadata for carted artifacts.
             */
            $query = "SELECT p.PID, p.Title, p.Author, p.Edition, c.Quantity, p.Price 
                      FROM cart c 
                      INNER JOIN products p ON c.Product = p.PID
                      WHERE c.Customer = '$customer'";
            $result = mysqli_query($con, $query);
            $total = 0;

            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                $j = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $path = "img/books/" . $row['PID'] . ".jpg";
                    $subTotal = $row['Quantity'] * $row['Price'];

                    if ($i % 2 == 1)
                        $offset = 1;
                    if ($i % 2 == 0)
                        $offset = 2;

                    if ($j % 2 == 0)
                        echo '<div class="row">';

                    echo '
                    <div class="panel col-xs-12 col-sm-4 col-sm-offset-' . $offset . ' col-md-4 col-md-offset-' . $offset . ' col-lg-4 col-lg-offset-' . $offset . ' text-center" style="color:#D67B22;font-weight:800;">
                        <div class="panel-heading">Artifact ' . $i . '</div>
                        <div class="panel-body">
                            <img class="image-responsive block-center" src="' . $path . '" style="height :100px; border-radius:5px;"> <br>
                            Title: ' . $row['Title'] . ' <br>
                            Code: ' . $row['PID'] . ' <br>
                            Author: ' . $row['Author'] . ' <br>
                            Edition: ' . $row['Edition'] . ' <br>
                            Quantity: ' . $row['Quantity'] . ' <br>
                            Price: INR ' . $row['Price'] . ' <br>
                            Sub Total: INR ' . $subTotal . ' <br>
                            <a href="cart.php?remove=' . $row['PID'] . '" class="btn btn-sm" style="background:#D67B22;color:white;font-weight:800; margin-top:10px;">
                                Remove Artifact
                            </a>
                        </div>
                    </div>';

                    if ($j % 2 == 1)
                        echo '</div>';
                    $total += $subTotal;
                    $i++;
                    $j++;
                }

                if ($j % 2 != 0)
                    echo '</div>';

                echo '
                <div class="container">
                    <div class="row">
                        <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center" style="color:#D67B22;font-weight:800;">
                            <div class="panel-heading">GRAND TOTAL</div>
                            <div class="panel-body">INR ' . $total . '</div>
                        </div>
                    </div>
                </div>';

                echo '
                <div class="row" style="margin-top:30px;">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
                        <a href="index.php" class="btn btn-lg btn-block" style="background:#D67B22;color:white;font-weight:800;">Continue Shopping</a>
                    </div>
                    <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1 col-lg-4">
                        <a href="cart.php?place=true" class="btn btn-lg btn-block" style="background:#D67B22;color:white;font-weight:800;">Place Order</a>
                    </div>
                </div>';
            } else {
                echo '
                <div class="row">
                    <div class="col-md-12 text-center" style="color:#D67B22;font-weight:bold; margin-top:50px;">
                        <h4>Your academic selection is currently empty.</h4>
                        <a href="index.php" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800; margin-top:20px;">Return to Catalog</a>
                    </div>
                </div>';
            }
        }
        echo '</div>';
        ?>

        <!-- Script Dependencies -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>