<?php
$accessToken = '81e9BiSD6pC3Zj7zC5GCWocLr11Yv9UY3xuyxSGVE3rbUIiJ6ITfWGIUxMkykC32me25NPiXffrxuTmUHkt0lO9kf6qvjL1CRUBZcn/UkEW3SIBXCgZFaQiZDO4Iik8DbpqlC/7VoVXvc/o2Pqa/lgdB04t89/1O/w1cDnyilFU=';

$userID=$_GET['uID'];
$msg=$_GET['msg'];

$text = [
    [
    'type' => 'text',
    'text' => $msg
    ],
];

$message = [
    'to' => $userID,
    'messages' => $text,
    'client_id'     => $client_id,
    'client_secret' => $client_secret
];

$message = json_encode($message);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $accessToken, 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/bot/message/push');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$message = curl_exec($ch);
curl_close($ch);