<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Centralized database connectivity module utilizing MySQLi extension.
 * Established for consistent data persistence across the application.
 * Facilitates the abstraction of database connection parameters and error handling.
 *
 * @category   Full Stack Web Application
 * @package    Digital Bookstore Management System
 * @author     Amey Thakur <https://github.com/Amey-Thakur>
 * @author     Mega Satish <https://github.com/msatmod>
 * @license    MIT License
 * @link       https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE
 * @date       2021-08-28
 */

/**
 * Persistence Configuration
 * Defines parameters for local environment deployment (XAMPP/LAMP).
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'digital_bookstore');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/**
 * Connection Initialisation
 * Establishes a link to the MySQL transaction engine.
 */
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_connect_error());

/**
 * Schema Selection
 * Selects the target relational database for the current operation scope.
 */
$db = mysqli_select_db($con, DB_NAME) or die("Failed to select database: " . mysqli_error($con));
?>