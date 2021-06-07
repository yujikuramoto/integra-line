<?php
$accessToken = '81e9BiSD6pC3Zj7zC5GCWocLr11Yv9UY3xuyxSGVE3rbUIiJ6ITfWGIUxMkykC32me25NPiXffrxuTmUHkt0lO9kf6qvjL1CRUBZcn/UkEW3SIBXCgZFaQiZDO4Iik8DbpqlC/7VoVXvc/o2Pqa/lgdB04t89/1O/w1cDnyilFU=';//'g+1NNYuFz0EDbgfBIP13UCjol3b04Rs793Q5GQ8Us8Fqpt5lFJJ23dtKkoQMysx+PVpnev2rkZ6g94tMNa5ZvUixtnd3NbEh0mY/3W1ztUr7ILa7G4NX/iFC+ovgjohW9QsJZIG6TcgkI8a43GMQ3wdB04t89/1O/w1cDnyilFU='; 

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
    CURLOPT_URL            => 'https://api.line.me/v2/bot/user/' . $userID . '/richmenu/richmenu-6bae441d5f194d3b93d3bd0dac42a878',
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

