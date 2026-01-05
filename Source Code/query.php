<?php
/**
 * DIGITAL-BOOKSTORE
 *
 * Inquiry dispatch and notification automation module.
 * Facilitates asynchronous communication between site visitors and library 
 * administrators via automated SMTP instrumentation.
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
 * Inquiry Processing Pipeline
 * Intercepts POST payloads from the scholarly inquiry form.
 */
if (isset($_POST["submit"]) && $_POST["submit"] == "query") {
    /**
     * Configuration & Metadata
     * Defines administrative recipient and identity headers.
     */
    $recipient = "shivangi.gupta1404@gmail.com";
    $subject = "Digital Bookstore Inquiry: Research/Technical Support";

    $sender = strip_tags($_POST["sender"]);
    $senderEmail = filter_var($_POST["senderEmail"], FILTER_SANITIZE_EMAIL);
    $message = strip_tags($_POST["message"]);

    /**
     * Outbound Dispatch (Admin)
     * Transmits the specific inquiry to the institutional triage desk.
     */
    $mailBody = "Institutional Inquiry Generated\n";
    $mailBody .= "---------------------------\n";
    $mailBody .= "Name: $sender\n";
    $mailBody .= "Email: $senderEmail\n\n";
    $mailBody .= "Payload:\n$message";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    /**
     * Autonotification Pipeline (User)
     * Dispatches a stateful acknowledgment to the generator.
     */
    $resSub = "Acknowledgement of Inquiry Receipt | Digital Bookstore";
    $resBody = "Dear " . $sender . ",\n\n";
    $resBody .= "This transmission confirms that our library systems have successfully received your inquiry.\n";
    $resBody .= "A technical representative or administrator will review your payload and respond accordingly.\n\n";
    $resBody .= "Reference Metadata:\n";
    $resBody .= "Source: Digital Bookstore Repository Archival Instance\n";
    $resBody .= "Note: This is an automated system response. Do not reply to this header.";

    mail($senderEmail, $resSub, $resBody, "From: Digital Bookstore Registry <noreply@bookstoreproject.edu>");

    /**
     * State Persistence
     * Returns the user to the primary index with a success notification.
     */
    header("location: index.php?response=" . urlencode("Your inquiry has been successfully dispatched. We will analyze the payload and respond shortly."));
}
?>