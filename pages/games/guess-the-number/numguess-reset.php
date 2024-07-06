<?php
session_start();

$response = ['success' => false];

if (isset($_POST['maxNumber'])) {
    $maxNumber = (int) $_POST['maxNumber'];
    if ($maxNumber > 0) {
        $_SESSION['number'] = rand(1, $maxNumber);
        $_SESSION['maxNumber'] = $maxNumber;
        $response['success'] = true;
    }
} else {
    unset($_SESSION['number']);
    unset($_SESSION['maxNumber']);
    $response['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>