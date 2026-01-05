<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Detailed product metadata presentation layer.
 * Renders exhaustive book specifications and handles cart-entry preparations.
 * Facilitates hierarchical data visualization for library artifacts.
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
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Books">
  <meta name="author" content="Amey Thakur">
  <title>Book Description | Digital Bookstore</title>

  <!-- UI Framework Dependencies -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/my.css" rel="stylesheet">

  <style>
    @media only screen and (width: 768px) {
      body {
        margin-top: 150px;
      }
    }

    @media only screen and (max-width: 760px) {
      #books .row {
        margin-top: 10px;
      }
    }

    .tag {
      display: inline;
      float: left;
      padding: 2px 5px;
      width: auto;
      background: #F5A623;
      color: #fff;
      height: 23px;
    }

    .tag-side {
      display: inline;
      float: left;
    }

    #books {
      border: 1px solid #DEEAEE;
      margin-bottom: 20px;
      padding-top: 30px;
      padding-bottom: 20px;
      background: #fff;
      margin-left: 10%;
      margin-right: 10%;
    }

    #description {
      border: 1px solid #DEEAEE;
      margin-bottom: 20px;
      padding: 20px 50px;
      background: #fff;
      margin-left: 10%;
      margin-right: 10%;
    }

    #description hr {
      margin: auto;
    }

    #service {
      background: #fff;
      padding: 20px 10px;
      width: 112%;
      margin-left: -6%;
      margin-right: -6%;
    }

    .glyphicon {
      color: #D67B22;
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
        <a class="navbar-brand" href="index.php">
          <img alt="Brand" src="img/logo.jpg" style="width: 118px;margin-top: -7px;margin-left: -10px;">
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php
          /**
           * Session-Specific Navigation
           * Renders authenticated user options.
           */
          if (isset($_SESSION['user'])) {
            echo '
                    <li><a href="cart.php" class="btn btn-md"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a></li>
                    <li><a href="destroy.php" class="btn btn-md"> <span class="glyphicon glyphicon-log-out">LogOut</span></a></li>
                         ';
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
        <form role="search" action="Result.php" method="post">
          <input type="text" name="keyword" class="form-control" placeholder="Search for a Book , Author Or Category"
            style="width:80%;margin:20px 10% 20px 10%;">
        </form>
      </div>
    </div>
  </div>


  <?php
  /**
   * Data Extraction Engine
   * Retrieves comprehensive artifact metadata using the Primary Identifier (PID).
   */
  include "dbconnect.php";
  if (isset($_GET['ID'])) {
    $PID = mysqli_real_escape_string($con, $_GET['ID']);
    $query = "SELECT * FROM products WHERE PID='$PID'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $path = "img/books/" . $row['PID'] . ".jpg";
        $target = "cart.php?ID=" . $PID . "&";
        echo '
    <div class="container-fluid" id="books">
        <div class="row">
            <div class="col-sm-10 col-md-6">
                <div class="tag">' . $row["Discount"] . '% OFF</div>
                <div class="tag-side"><img src="img/orange-flag.png"></div>
                <img class="center-block img-responsive" src="' . $path . '" style="padding:20px; max-height:550px; border-radius:10px;">
            </div>
            <div class="col-sm-10 col-md-4 col-md-offset-1">
                <h2>' . $row["Title"] . '</h2>
                <span style="color:#00B9F5;">
                    #' . $row["Author"] . '&nbsp;&nbsp;#' . $row["Publisher"] . '
                </span>
                <hr>
                <span style="font-weight:bold;">Quantity:</span>';

        echo '<select id="quantity">';
        for ($i = 1; $i <= $row['Available']; $i++)
          echo '<option value="' . $i . '">' . $i . '</option>';
        echo ' </select>';

        echo ' <br><br><br>
                <a id="buyLink" href="' . $target . '" class="btn btn-lg btn-danger" style="padding:15px; color:white; text-decoration:none; font-weight:800; border-radius:5px;">
                    ADD TO CART for INR ' . $row["Price"] . ' <br>
                    <span style="text-decoration:line-through;">RS ' . $row["MRP"] . '</span>
                    | ' . $row["Discount"] . '% SAVINGS
                </a>
            </div>
        </div>
    </div>';

        echo '
    <div class="container-fluid" id="description">
        <div class="row">
            <h2 style="color:#D67B22;">Technical Specifications</h2>
            <p>' . $row['Description'] . '</p>
            <pre style="background:inherit; border:none; color:#555;">
PRODUCT CODE  ' . $row["PID"] . '   <hr>
TITLE         ' . $row["Title"] . ' <hr>
AUTHOR        ' . $row["Author"] . ' <hr>
AVAILABLE     ' . $row["Available"] . ' <hr>
PUBLISHER     ' . $row["Publisher"] . ' <hr>
EDITION       ' . $row["Edition"] . ' <hr>
LANGUAGE      ' . $row["Language"] . ' <hr>
PAGES         ' . $row["page"] . ' <hr>
WEIGHT        ' . $row["weight"] . ' <hr>
            </pre>
        </div>
    </div>';
      }
    }
  }
  ?>


  <!-- Service Value Propositions -->
  <div class="container-fluid" id="service">
    <div class="row">
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-heart"></span> <br>
        <strong>24X7 Care</strong> <br>
        Happy to help 24X7, call us on 0120-3062244.
      </div>
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-ok"></span> <br>
        <strong>Trust</strong> <br>
        Your security is paramount. All transactions are encrypted.
      </div>
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-check"></span> <br>
        <strong>Assurance</strong> <br>
        100% genuine academic artifacts guaranteed.
      </div>
      <div class="col-sm-6 col-md-3 text-center">
        <span class="glyphicon glyphicon-tags"></span> <br>
        <strong>Value</strong> <br>
        Best price guarantee across the digital library ecosystem.
      </div>
    </div>
  </div>



  <!-- Script Dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    /**
     * Dynamic Cart Link Handling
     * Synchronizes the quantity selector with the final 'Add to Cart' hyperlink.
     */
    $(function () {
      var link = $('#buyLink').attr('href');
      $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
      $('#quantity').on('change', function () {
        $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
      });
    });
  </script>
</body>

</html>