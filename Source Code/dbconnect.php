<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Centralized database connectivity module utilizing MySQLi extension.
 * Established for consistent data persistence across the application.
 *
 * @category   Full Stack Web Application
 * @package    Digital Bookstore Management System
 * @author     Amey Thakur <https://github.com/Amey-Thakur>
 * @author     Mega Satish <https://github.com/msatmod>
 * @license    MIT License
 * @link       https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE
 * @date       2021-08-28
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'digital_bookstore');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysqli_select_db($con, DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
?>