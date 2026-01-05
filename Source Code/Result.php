<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Global search engine module utilizing sub-string matching across 
 * various entity attributes including Title, Author, and Category.
 * Facilitates discovery through a unified search interface.
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
    <title>Search Results | Digital Bookstore</title>

    <!-- UI Framework Dependencies -->
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/my.css" type="text/css">

    <style>
        #books .row {
            margin-top: 30px;
            font-weight: 800;
        }

        @media only screen and (max-width: 760px) {
            #books .row {
                margin-top: 10px;
            }
        }

        .book-block {
            margin-top: 20px;
            margin-bottom: 10px;
            padding: 10px 10px 10px 10px;
            border: 1px solid #DEEAEE;
            border-radius: 10px;
            height: 100%;
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
                     * Authentication State Management
                     * Renders Login/Signup Modals for guests and Logout for authenticated practitioners.
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
                                    <h4 class="modal-title text-center">Login Form</h4>
                                </div>
                                <div class="modal-body">
                                  <ul >
                                    <li>
                                      <div class="row">
                                          <div class="col-md-12 text-center">
                                              <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                                  <div class="form-group">
                                                      <label class="sr-only" for="username">Username</label>
                                                      <input type="text" name="login_username" class="form-control" placeholder="Username" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="sr-only" for="password">Password</label>
                                                      <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
                                                      <div class="help-block text-right">
                                                          <a href="#">Forget the password ?</a>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <button type="submit" name="submit" value="login" class="btn btn-block">
                                                          Sign in
                                                      </button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                  <h4 class="modal-title text-center">Member Registration Form</h4>
                              </div>
                              <div class="modal-body">
                                <ul >
                                  <li>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                                                <div class="form-group">
                                                    <label class="sr-only" for="username">Username</label>
                                                    <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="password">Password</label>
                                                    <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" value="register" class="btn btn-block">
                                                        Sign Up
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                    </div>
                </li>';
                    } else {
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
        /**
         * Search Execution Pipeline
         * Sanitize keyword input and execute a broad-spectrum wildcard search.
         * The query maps across Primary IDs, Titles, Authors, and Categories.
         */
        include "dbconnect.php";
        if (isset($_POST['keyword'])) {
            $keyword = mysqli_real_escape_string($con, $_POST['keyword']);

            $query = "SELECT * FROM products WHERE PID LIKE '%{$keyword}%' 
                      OR Title LIKE '%{$keyword}%' 
                      OR Author LIKE '%{$keyword}%' 
                      OR Publisher LIKE '%{$keyword}%' 
                      OR Category LIKE '%{$keyword}%'";

            $result = mysqli_query($con, $query) or die(mysqli_error($con));

            $i = 0;
            echo '<div class="container-fluid" id="books">
                    <div class="row">
                        <div class="col-xs-12 text-center" id="heading">
                            <h4 style="color:#00B9F5;text-transform:uppercase;"> Found ' . mysqli_num_rows($result) . ' Record(s) </h4>
                        </div>
                    </div>';

            /**
             * Result Presentation Engine
             * Iteratively renders search hits using a grid-based responsive layout.
             * Implements an offset-based alignment for precise visual balancing.
             */
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $path = "img/books/" . $row['PID'] . ".jpg";
                    $description = "description.php?ID=" . $row["PID"];

                    if ($i % 3 == 0) {
                        $offset = 0;
                    } else {
                        $offset = 1;
                    }

                    if ($i % 3 == 0) {
                        echo '<div class="row">';
                    }

                    echo '
                    <a href="' . $description . '">
                        <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-' . $offset . ' col-lg-3 text-center w3-card-4 w3-dark-grey" style="margin-bottom:20px; border-radius:10px;">
                            <div class="book-block">
                                <img class="book block-center img-responsive" src="' . $path . '" style="border-radius:5px;">
                                <hr>
                                <strong>' . $row["Title"] . '</strong><br>
                                INR ' . $row["Price"] . '  &nbsp;
                                <span style="text-decoration:line-through;color:#aaa;"> ' . $row["MRP"] . ' </span>
                                <span class="label label-warning">' . $row["Discount"] . '% OFF</span>
                            </div>
                        </div>
                    </a> ';

                    $i++;
                    if ($i % 3 == 0) {
                        echo '</div>';
                    }
                }
                // Close the last row if it's not complete
                if ($i % 3 != 0) {
                    echo '</div>';
                }
            } else {
                echo '<div class="row"><div class="col-md-12 text-center"><h4>No artifacts matched your search criteria.</h4></div></div>';
            }
            echo '</div>';
        }
        ?>

        <!-- Script Dependencies -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>