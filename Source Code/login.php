<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * User authentication and session instantiation module.
 * Facilitates the verification of secure credentials and the primary 
 * initialization of the stateful user context within the application.
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

/**
 * Authentication Lifecycle Handler
 * Manages the validation of user-submitted identification tokens.
 */
if (isset($_POST['submit'])) {
  if ($_POST['submit'] == "login") {
    /**
     * Sanitization & query orchestration
     * Uses escaping to mitigate injection risks in the legacy architecture.
     */
    $username = mysqli_real_escape_string($con, $_POST['login_username']);
    $password = mysqli_real_escape_string($con, $_POST['login_password']);

    $query = "SELECT * FROM users WHERE UserName = '$username' AND Password = '$password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      session_start();
      $_SESSION['user'] = $row['UserName'];
      header("Location: index.php?Message=" . urlencode("Successfully Logged In. Access Granted."));
    } else {
      header("Location: index.php?Message=" . urlencode("Authentication Failure: Incorrect Credentials."));
    }
  }
}
?>