<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * User enrollment and identity provisioning module.
 * Facilitates the creation of unique user identifiers and the storage 
 * of secure credentials within the persistence layer.
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
 * Identity Lifecycle Handler
 * Manages the allocation and verification of new user identities.
 */
if (isset($_POST['submit'])) {
  if ($_POST['submit'] == "register") {
    /**
     * Sanitization & Conflict Detection
     * Verifies the uniqueness of the requested identifier in the global repository.
     */
    $username = mysqli_real_escape_string($con, $_POST['register_username']);
    $password = mysqli_real_escape_string($con, $_POST['register_password']);

    $check_query = "SELECT * FROM users WHERE UserName = '$username'";
    $check_result = mysqli_query($con, $check_query) or die(mysqli_error($con));

    if (mysqli_num_rows($check_result) > 0) {
      header("Location: index.php?Message=" . urlencode("Identification Conflict: Username is already allocated. Use a different identifier."));
    } else {
      /**
       * Resource Persistence
       * Commits the new identity credentials to the 'users' entity.
       */
      $insert_query = "INSERT INTO users (UserName, Password) VALUES ('$username', '$password')";
      $insert_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
      header("Location: index.php?Message=" . urlencode("Enrollment Successful. You may now proceed to authenticate."));
    }
  }
}
?>