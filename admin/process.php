<?php
include("config/config.php");

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];
    $phone = $_GET['phone'];

    // Prepare and execute the SQL query to update the order status.
    $updateQuery = "UPDATE orders SET order_status = 'accepted' WHERE id = $orderId";

    if (mysqli_query($con, $updateQuery)) {
        // Order status updated successfully.
        echo 'Order status updated to "accepted".';
    } else {
        // Error updating order status.
        echo 'Error updating order status: ' . mysqli_error($con);
    }
}

require '../vendor/autoload.php'; // Include the Twilio PHP SDK

use Twilio\Rest\Client;

// Your Twilio Account SID and Auth Token
$account_sid = 'AC513b3f66f6f41e537329aac6fd09eb33';
$auth_token = '517b9981995828fb71e26fba32e88b7d';

// Initialize the Twilio client
$client = new Client($account_sid, $auth_token);

// Send an SMS
$message_body = 'Your order is accepted. Thank you for choosing us.';

$message = $client->messages->create(
    '+44 7471 416078', // Recipient's phone number (without single quotes)
    [
        'from' => '+447883300816', // Your Twilio phone number
        'body' => $message_body
    ]
);

// Check if the message was sent successfully
if ($message->sid) {
    echo 'SMS sent successfully.';
} else {
    echo 'Failed to send SMS.';
}
?>
