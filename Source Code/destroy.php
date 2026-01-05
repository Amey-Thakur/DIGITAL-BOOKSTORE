<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Session termination module.
 * Finalizes the user session lifecycle and executes a clean logout.
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
 * Session Deconstruction
 * Unsets relevant session identifiers and invalidates the stateful token.
 */
session_start();
unset($_SESSION['user']);
session_destroy();

/**
 * Redirection Lifecycle
 * Returns the client to the index entry point with an idempotency message.
 */
header("location: index.php?Message=" . urlencode("Successfully logged out!!"));
?>