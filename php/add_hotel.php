<?php
include 'db_connect.php'; // Ensure this file contains the necessary code to connect to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_name = $_POST['hotel_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Hotels (hotel_name, address, city, state, zip_code, phone_number, email)
            VALUES ('$hotel_name', '$address', '$city', '$state', '$zip_code', '$phone_number', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "New hotel added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
