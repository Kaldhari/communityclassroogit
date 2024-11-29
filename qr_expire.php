<?php
// Set expiration time (10 seconds from script load)
$expire_time = 10; // seconds

// Check if the QR code has expired
$timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : time();

if (time() - $timestamp > $expire_time) {
    echo "The QR code has expired.";
    exit;
}

// If QR code is still valid, display the information
$first_name = "John";
$last_name = "Doe";
$phonenumber = "1234567890";
$company = "Company XYZ";

echo "First Name: $first_name<br>";
echo "Last Name: $last_name<br>";
echo "Phone Number: $phonenumber<br>";
echo "Company: $company<br>";
?>
