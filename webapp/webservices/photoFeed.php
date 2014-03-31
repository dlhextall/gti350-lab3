<?php

require_once '../inc/DatabaseConnection.php';
$dbh = DatabaseConnection::singleton();

$specific_user = null;
if (isset($_GET['user_id']) && is_numeric($_GET['user_id']) && $_GET['user_id'] > 0) {
    $specific_user = $_GET['user_id'];
}
$tags = null;
if (isset($_GET['p_tags']) && $_GET['p_tags'] !== "") {
    $tags = $_GET['p_tags'];
}

$result = null;
if ($specific_user === null && $tags === null) {
    if ($stmt = $dbh->get()->query("SELECT * FROM Photo ORDER BY p_id DESC")) {
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
} else if ($specific_user === null && $tags !== null) {
    if ($stmt = $dbh->get()->prepare("SELECT * FROM Photo WHERE p_tags LIKE ? ORDER BY p_id DESC")) {
        $queryTag = "%$tags%";
        $stmt->bindParam(1, $queryTag, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
} else if ($specific_user !== null && $tags === null) {
    if ($stmt = $dbh->get()->prepare("SELECT * FROM Photo WHERE p_app_user_id = ? ORDER BY p_id DESC")) {
        $stmt->bindParam(1, $specific_user, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
} else {
    if ($stmt = $dbh->get()->prepare("SELECT * FROM Photo WHERE p_app_user_id = ? AND p_tags LIKE '%?%' ORDER BY p_id DESC")) {
        $stmt->bindParam(1, $specific_user, PDO::PARAM_INT);
        $stmt->bindParam(2, $tags, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

header('Content-Type: application/json');
echo json_encode($result);

?>