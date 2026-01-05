<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * User registration management module.
 *
 * @category   Full Stack Web Application
 * @package    Digital Bookstore Management System
 * @author     Amey Thakur <https://github.com/Amey-Thakur>
 * @author     Mega Satish <https://github.com/msatmod>
 * @license    MIT License
 * @link       https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE
 * @date       2021-08-28
 */

include "dbconnect.php";


if (isset($_POST['submit'])) {
  if ($_POST['submit'] == "register") {
    $username = $_POST['register_username'];
    $password = $_POST['register_password'];
    $query = "select * from users where UserName = '$username'";
    $result = mysqli_query($con, $query) or die(mysql_error);
    if (mysqli_num_rows($result) > 0) {
      header("Location: index.php?register=" . "Username is already taken...Use different username");
    } else {
      $query = "INSERT INTO users VALUES ('$username','$password')";
      $result = mysqli_query($con, $query);
      header("Location: index.php?register=" . "Successfully Registered!!");
    }
  }
}

?>