<?php
include "connection.php";

if (empty($_POST['logemail']) || empty($_POST['logpass'])) {
  echo "Please enter both email and password";
} else {
  $email = $_POST['logemail'];
  $password = $_POST['logpass'];

  $query = "SELECT * FROM user_data WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userid = $row['userid'];
    $role = $row['role'];

    // // Start the session and store user_id and role
    session_start();
    $_SESSION['userid'] = $userid;
    $_SESSION['role'] = $role;

    // Redirect based on the role
    if ($role == 'admin') {
      // Redirect to admin profile page
      header("Location: admin_profile.php");
    } else {
      // Redirect to user profile page
      header("Location: user_profile.php");
    }
    exit;
  } else {
    echo "Invalid username and password";
  }
}

