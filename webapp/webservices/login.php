<?php

require_once '../inc/secure_functions.php';
require_once '../inc/DatabaseConnection.php';
sec_session_start();
$dbh = DatabaseConnection::singleton();


$response;
if (!isset($_POST['username'], $_POST['passwd'])) {
    $response = array(
        "success" => false,
        "info" => "Field missing",
    );
} else if (login($_POST['username'], $_POST['passwd'], $dbh->get()) === true) {
    $user = getCurrentUser($dbh->get());
    $response = array(
        "success" => true,
        "App_User" => $user,
    );
} else {
    $response = array(
        "success" => false,
        "info" => "login error : {$_POST['username']} - {$_POST['passwd']}",
    );
}

header('Content-Type: application/json');
echo json_encode($response);

?>