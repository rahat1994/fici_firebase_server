<?php

require __DIR__ . '/vendor/autoload.php';

use Rahat\FiciFirebaseServer\CloudMessaging;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

if ($_POST['intent'] == 'fici_notification') {
    $messaging = new CloudMessaging();

    $result = $messaging
        ->setNotification($_POST['title'], $_POST['body'])
        ->setTopic($_POST['topic'])
        ->setData($_POST['data'])
        ->send();

    header('Content-Type: application/json');
    echo json_encode($result);
}
