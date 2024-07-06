<?php
session_start();

$response = [
    'success' => false,
    'message' => ''
];

if (!isset($_SESSION['number'])) {
    $response['message'] = 'Please set the maximum number first.';
} else {
    if (isset($_POST['guess'])) {
        $guess = (int) $_POST['guess'];
        $number = $_SESSION['number'];

        if ($guess > $number) {
            $response['message'] = 'It\'s too high!';
        } elseif ($guess < $number) {
            $response['message'] = 'It\'s too low!';
        } else {
            $response['message'] = 'Congratulations! You guessed the number.';
            $response['success'] = true;
            unset($_SESSION['number']);  // Reset the game
        }
    } else {
        $response['message'] = 'Invalid guess.';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>