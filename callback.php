<?php 
$accessToken = 'g+1NNYuFz0EDbgfBIP13UCjol3b04Rs793Q5GQ8Us8Fqpt5lFJJ23dtKkoQMysx+PVpnev2rkZ6g94tMNa5ZvUixtnd3NbEh0mY/3W1ztUr7ILa7G4NX/iFC+ovgjohW9QsJZIG6TcgkI8a43GMQ3wdB04t89/1O/w1cDnyilFU='; 
$jsonString = file_get_contents('php://input'); error_log($jsonString); 
$jsonObj = json_decode($jsonString); $message = $jsonObj->{"events"}[0]->{"message"}; 
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};


 // 送られてきたメッセージの中身からレスポンスのタイプを選択 
if ($message->{"text"} == 'kakunin') {
     // 確認ダイアログタイプ 
    $messageData = [ 
        'type' => 'template', 
        'altText' => '確認ダイアログ', 
        'template' => [ 'type' => 'confirm', 'text' => '元気ですかー？', 
            'actions' => [
                [ 'type' => 'message', 'label' => '元気です', 'text' => '元気です' ],
                [ 'type' => 'message', 'label' => 'まあまあです', 'text' => 'まあまあです' ], 
            ] 
        ]
 ]; 
} elseif ($message->{"text"} == 'ボタン') { 
    // ボタンタイプ 
    $messageData = [ 
        'type' => 'template',
         'altText' => 'ボタン', 
        'template' => [
             'type' => 'buttons',
             'title' => 'タイトルです',
             'text' => '選択してね', 
            'actions' => [
                 [ 
                    'type' => 'postback', 
                    'label' => 'webhookにpost送信', 
                    'data' => 'value' 
                ],
                 [
                     'type' => 'uri',
                     'label' => 'googleへ移動', 
                     'uri' => 'https://google.com' 
                 ]
              ]
          ] 
     ]; 
} elseif ($message->{"text"} == 'カルーセル') {
     // カルーセルタイプ 
    $messageData = [ 
        'type' => 'template', 
        'altText' => 'ca', 
        'template' => [
             'type' => 'carousel', 
            'columns' => [ 
                [ 
                    'title' => 'カルーセル1', 
                    'text' => 'カルーセル1です',
                     'actions' => [
                         [
                            'type' => 'postback',
                             'label' => 'webhookにpost送信',
                             'data' => 'value'
                         ],
                         [ 
                            'type' => 'uri', 
                            'label' => '美容の口コミ広場を見る',
                             'uri' => 'https://report.clinic/'
                         ] 
                    ] 
                ],
                 [ 
                        'title' => 'カルーセル2', 
                        'text' => 'カルーセル2です', 
                        'actions' => [ 
                            [
                                'type' => 'postback', 
                                'label' => 'webhookにpost送信', 
                                'data' => 'value' 
                            ], 
                            [ 
                                'type' => 'uri', 
                                'label' => '女美会を見る', 
                                'uri' => 'https://jobikai.com/' 
                            ] 
                        ] 
                    ], 
                ] 
            ] 
    ];
 } else {
     // それ以外は送られてきたテキストをオウム返し
     $messageData = [ 'type' => 'text', 'text' => $message->{"text"} ]; 
} 
$response = [ 'replyToken' => $replyToken, 'messages' => [$messageData] ]; 
error_log(json_encode($response)); 
$ch = curl_init('https://api.line.me/v2/bot/message/reply'); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response)); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json; charser=UTF-8', 'Authorization: Bearer ' . $accessToken )); 
$result = curl_exec($ch); error_log($result); 
curl_close($ch);