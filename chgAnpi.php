<?php
$accessToken ='81e9BiSD6pC3Zj7zC5GCWocLr11Yv9UY3xuyxSGVE3rbUIiJ6ITfWGIUxMkykC32me25NPiXffrxuTmUHkt0lO9kf6qvjL1CRUBZcn/UkEW3SIBXCgZFaQiZDO4Iik8DbpqlC/7VoVXvc/o2Pqa/lgdB04t89/1O/w1cDnyilFU=';

$userID=$_GET['uID'];


$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer '.$accessToken,
];

// ボディーを設定
$body = json_encode([
            'replyToken' => $replyToken,
            'messages'   => [
                $message,
            ]
        ]);

// CURLオプションを設定
$options = [
    CURLOPT_URL            => 'https://api.line.me/v2/bot/user/' . $userID . '/richmenu/richmenu-3af463a7010502d0ce4511c905e77907',
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_POSTFIELDS     => $body,
];

// 返信
$curl = curl_init();
curl_setopt_array($curl, $options);
curl_exec($curl);
curl_close($curl);

