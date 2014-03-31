<?php

require_once 'inc/DatabaseConnection.php';
include 'inc/secure_functions.php';
sec_session_start(); // Our custom secure way of starting a php session. 
 
if(isset($_POST['email'], $_POST['p'])) { 
   $email = $_POST['email'];
   $password = $_POST['p']; // The hashed password.
   $dbh = DatabaseConnection::singleton();
   if(login($email, $password, $dbh->get()) == true) {
      // Login success
      header('Location: ./test.php');
   } else {
      // Login failed
      header('Location: ./index.php?error=' . urlencode("Invalid email address or password."));
   }
} else { 
   // The correct POST variables were not sent to this page.
   header('Location: ./index.php?error=' . urlencode('Invalid request'));
}

?>