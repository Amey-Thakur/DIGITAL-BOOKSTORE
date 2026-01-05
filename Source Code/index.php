<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Central orchestration and portal entry point.
 * Integrates authentication management, session persistence, and primary navigational
 * routing for the digital library ecosystem. Facilitates categorized library browsing.
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
include "dbconnect.php";

/**
 * Message Dispatcher
 * Renders modal-style alerts for transactional feedback (Success/Failure).
 */
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . mysqli_real_escape_string($con, $_GET['Message']) . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . mysqli_real_escape_string($con, $_GET['response']) . '");
           </script>';
}

/**
 * Transactional Routing Logic
 * Handles POST requests for persistent state changes (Login/Registration).
 */
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "login") {
        /**
         * Authentication Layer
         * Validates user credentials against the persistent repository.
         * Implementation follows a stateful session initialization pattern.
         */
        $username = mysqli_real_escape_string($con, $_POST['login_username']);
        $password = mysqli_real_escape_string($con, $_POST['login_password']);
        $query = "SELECT * FROM users WHERE UserName ='$username' AND Password='$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row['UserName'];
            print '<script type="text/javascript">alert("Authentication Successful. Welcome back!");</script>';
        } else {
            print '<script type="text/javascript">alert("Invalid Credentials. Please verify your identity.");</script>';
        }
    } else if ($_POST['submit'] == "register") {
        /**
         * Identity Provisioning Layer
         * Facilitates unique identifier allocation and credential persistence.
         */
        $username = mysqli_real_escape_string($con, $_POST['register_username']);
        $password = mysqli_real_escape_string($con, $_POST['register_password']);
        $check_query = "SELECT * FROM users WHERE UserName = '$username'";
        $check_result = mysqli_query($con, $check_query) or die(mysqli_error($con));

        if (mysqli_num_rows($check_result) > 0) {
            print '<script type="text/javascript">alert("Identification Conflict: Username already exists in the repository.");</script>';
        } else {
            $insert_query = "INSERT INTO users (UserName, Password) VALUES ('$username', '$password')";
            mysqli_query($con, $insert_query) or die(mysqli_error($con));
            print '<script type="text/javascript">alert("Registration successful. You may now initiate terminal access.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Digital Bookstore - Academic Library Management">
    <meta name="author" content="Amey Thakur">
    <title>Digital Bookstore | Home</title>

    <!-- UI Framework Dependencies -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>
        .modal-header {
            background: #D67B22;
            color: #fff;
            font-weight: 800;
        }

        .modal-body {
            font-weight: 800;
        }

        .modal-body ul {
            list-style: none;
        }

        .modal .btn {
            background: #D67B22;
            color: #fff;
        }

        .modal a {
            color: #D67B22;
        }

        .modal-backdrop {
            position: inherit !important;
        }

        #login_button,
        #register_button {
            background: none;
            color: #D67B22 !important;
        }

        #query_button {
            position: fixed;
            right: 0px;
            bottom: 0px;
            padding: 10px 80px;
            background-color: #D67B22;
            color: #fff;
            border-color: #f05f40;
            border-radius: 2px;
            z-index: 1000;
        }

        @media(max-width:767px) {
            #query_button {
                padding: 5px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    /**
                     * UI Orchestration
                     * Conditional rendering based on authentication state.
                     */
                    if (!isset($_SESSION['user'])) {
                        echo '
            <li>
                <button type="button" id="login_button" class="btn btn-lg" data-toggle="modal" data-target="#login">Login</button>
                <div id="login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">Identity Verification</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                    <div class="form-group">
                                        <label class="sr-only" for="username">Username</label>
                                        <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="login_password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="login" class="btn btn-block">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <button type="button" id="register_button" class="btn btn-lg" data-toggle="modal" data-target="#register">Sign Up</button>
                <div id="register" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">New Member Enrollment</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                    <div class="form-group">
                                        <label class="sr-only" for="username">Username</label>
                                        <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="register_password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="register" class="btn btn-block">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>';
                    } else {
                        echo ' <li> <a href="#" class="btn btn-lg"> <span class="glyphicon glyphicon-user"></span> Hello, ' . htmlspecialchars($_SESSION['user']) . ' </a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> <span class="glyphicon glyphicon-shopping-cart"></span> Cart </a> </li>
                    <li> <a href="destroy.php" class="btn btn-lg"> <span class="glyphicon glyphicon-log-out"></span> Logout </a> </li>';
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- Search Box Layer -->
    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" method="POST" action="Result.php">
                    <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;"
                        placeholder="Search for a Book, Author, or Category">
                </form>
            </div>
        </div>

        <div class="container-fluid" id="header">
            <div class="row">
                <!-- Taxonomy Navigation -->
                <div class="col-md-3 col-lg-3" id="category">
                    <div style="background:#D67B22;color:#fff;font-weight:800;border:none;padding:15px;"> The Digital
                        Library </div>
                    <ul>
                        <li> <a href="Product.php?value=entrance%20exam"> Entrance Exam </a> </li>
                        <li> <a href="Product.php?value=Literature%20and%20Fiction"> Literature & Fiction </a> </li>
                        <li> <a href="Product.php?value=Academic%20and%20Professional"> Academic & Professional </a>
                        </li>
                        <li> <a href="Product.php?value=Biographies%20and%20Auto%20Biographies"> Biographies </a> </li>
                        <li> <a href="Product.php?value=Children%20and%20Teens"> Children & Teens </a> </li>
                        <li> <a href="Product.php?value=Regional%20Books"> Regional Books </a> </li>
                        <li> <a href="Product.php?value=Business%20and%20Management"> Business & Management </a> </li>
                        <li> <a href="Product.php?value=Health%20and%20Cooking"> Health and Cooking </a> </li>
                    </ul>
                </div>

                <!-- Featured Slider -->
                <div class="col-md-6 col-lg-6">
                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="item active"><img class="img-responsive" src="img/carousel/1.jpg"></div>
                            <div class="item"><img class="img-responsive" src="img/carousel/2.jpg"></div>
                            <div class="item"><img class="img-responsive" src="img/carousel/3.jpg"></div>
                            <div class="item"><img class="img-responsive" src="img/carousel/4.jpg"></div>
                            <div class="item"><img class="img-responsive" src="img/carousel/5.jpg"></div>
                            <div class="item"><img class="img-responsive" src="img/carousel/6.jpg"></div>
                        </div>
                    </div>
                </div>

                <!-- Asset Promotionals -->
                <div class="col-md-3 col-lg-3" id="offer">
                    <a href="Product.php?value=Regional%20Books"> <img class="img-responsive center-block"
                            src="img/offers/1.png"></a>
                    <a href="Product.php?value=Health%20and%20Cooking"> <img class="img-responsive center-block"
                            src="img/offers/2.png"></a>
                    <a href="Product.php?value=Academic%20and%20Professional"> <img class="img-responsive center-block"
                            src="img/offers/3.png"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- New Acquisitions Layer -->
    <div class="container-fluid text-center" id="new">
        <h3 style="color:#D67B22; margin-bottom:20px;"> NEW ARRIVALS </h3>
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-1&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="book block-center img-responsive" src="img/new/1.jpg">
                        <hr>
                        Like A Love Song <br>
                        INR 113 <span class="label label-warning">35% OFF</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-2&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="block-center img-responsive" src="img/new/2.jpg">
                        <hr>
                        General Knowledge 2017 <br>
                        INR 68 <span class="label label-warning">43% OFF</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-3&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="block-center img-responsive" src="img/new/3.png">
                        <hr>
                        Indian Family Business Mantras <br>
                        INR 400 <span class="label label-warning">33% OFF</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-4&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="img/tag.png"></div>
                        <img class="block-center img-responsive" src="img/new/4.jpg">
                        <hr>
                        SSC Mathematics 2021 <br>
                        INR 289 <span class="label label-warning">33% OFF</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Academic Contributor Showcase -->
    <div class="container-fluid" id="author">
        <h3 style="color:#D67B22;"> POPULAR AUTHORS </h3>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Durjoy%20Datta"><img class="img-responsive center-block"
                        src="img/popular-author/0.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block"
                        src="img/popular-author/1.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block"
                        src="img/popular-author/2.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block"
                        src="img/popular-author/3.jpg"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block"
                        src="img/popular-author/4.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block"
                        src="img/popular-author/5.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block"
                        src="img/popular-author/6.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block"
                        src="img/popular-author/7.jpg"></a>
            </div>
        </div>
    </div>

    <!-- Informational Footer -->
    <footer style="margin-left:-6%;margin-right:-6%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 col-md-5 col-lg-5 col-md-offset-1">
                    <div class="row text-center">
                        <h2>Communication Portal</h2>
                        <hr class="primary">
                        <p>Facilitating seamless discourse and library support services.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <span class="glyphicon glyphicon-earphone"></span>
                            <p>+91 123-456-7890</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <p>contact@digitalbookstore.edu</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-3 text-center col-md-offset-1">
                    <h2 style="color:#D67B22;">Social Metadata</h2>
                    <div style="margin-top:20px;">
                        <a href="https://twitter.com"><img title="Twitter" alt="Twitter" src="img/social/twitter.png"
                                width="35" height="35" /></a>
                        <a href="https://linkedin.com"><img title="LinkedIn" alt="LinkedIn"
                                src="img/social/linkedin.png" width="35" height="35" /></a>
                        <a href="https://facebook.com"><img title="Facebook" alt="Facebook"
                                src="img/social/facebook.png" width="35" height="35" /></a>
                        <a href="https://google.com"><img title="google+" alt="google+" src="img/social/google.jpg"
                                width="35" height="35" /></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="container">
        <!-- Persistent Query Trigger -->
        <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query"> Inquiry
            Terminal </button>
        <div class="modal fade" id="query" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Scholarly Inquiry Form</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="query.php" class="form" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" name="sender" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Institutional Email"
                                    name="senderEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="query">Message</label>
                                <textarea class="form-control" rows="5" cols="30" name="message"
                                    placeholder="Technical Inquiry / Metadata Correction" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="query" class="btn btn-block">Dispatch
                                    Query</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Runtime -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>