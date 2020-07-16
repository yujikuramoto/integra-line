<?php 
$accessToken = 'g+1NNYuFz0EDbgfBIP13UCjol3b04Rs793Q5GQ8Us8Fqpt5lFJJ23dtKkoQMysx+PVpnev2rkZ6g94tMNa5ZvUixtnd3NbEh0mY/3W1ztUr7ILa7G4NX/iFC+ovgjohW9QsJZIG6TcgkI8a43GMQ3wdB04t89/1O/w1cDnyilFU='; 
$jsonString = file_get_contents('php://input'); error_log($jsonString); 
$jsonObj = json_decode($jsonString);
$message = $jsonObj->{"events"}[0]->{"message"}; 
$userID = $jsonObj->{"events"}[0]->{"source"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

$endMsg = 0;

// if ($message->{"text"} == '安否確認'){

//     $messageData = [ 
//         'type' => 'template', 
//         'altText' => '安否確認', 
//         'template' => [ 'type' => 'buttons', 
//             'thumbnailImageUrl' => 'https://liginc.co.jp/wp-content/uploads/2020/05/ec_200507_01_h-1310x874.jpg', 
//             'imageAspectRatio' => 'rectangle', 
//             'imageSize' => 'cover',          
//             'imageBackgroundColor' => '#FFFFFF',          
//             'text' => '現在状況を教えて下さい。', 
//             'defaultAction' => [
//                 [ 'type' => 'message', 'label' => '怪我はありません。', 'text' => '回答1:1' ],
//             ] ,
//             'actions' => [
//                 [ 'type' => 'message', 'label' => '怪我はありません。', 'text' => '回答1:1' ],
//                 [ 'type' => 'message', 'label' => '怪我がありますが、対応できます', 'text' => '回答1:2' ], 
//                 [ 'type' => 'message', 'label' => 'レスキューが必要です', 'text' => '回答1:3' ], 
//             ] 
//         ]
//  ];
//  endMsg = 1;
// }


// if ($message->{"text"} == '回答1:1' || $message->{"text"} == '回答1:2' ||  $message->{"text"} == '回答1:3'){

//     $messageData = [ 
//         'type' => 'template', 
//         'altText' => '住所確認', 
//         'template' => [ 'type' => 'buttons', 
//             'thumbnailImageUrl' => 'https://liginc.co.jp/wp-content/uploads/2020/05/ec_200507_01_h-1310x874.jpg', 
//             'imageAspectRatio' => 'rectangle', 
//             'imageSize' => 'cover',          
//             'imageBackgroundColor' => '#FFFFFF',          
//             'text' => '現在いる場所を教えて下さい。', 
//             'defaultAction' => [
//                 [ 'type' => 'message', 'label' => '怪我はありません。', 'text' => '回答1:1' ],
//             ] ,
//             'actions' => [
//                 [ 'type' => 'uri', 'label' => '地図より選択', 'uri' => 'https://line.me/R/nv/location/' ],
//                 [ 'type' => 'message', 'label' => '位置を入力', 'text' => '位置入力' ], 
//             ] 
//         ]
//  ];
//  endMsg = 1;
// }

$kaitoNo =  $message->{"text"};
$kaitoNo = mb_substr($kaitoNo, 0, 3);

if ($message->{"text"} == '安否確認') { 
    // ボタンタイプ 
    $messageData = [ 
        'type' => 'template',
         'altText' => 'ボタン', 
        'template' => [
             'type' => 'buttons',
             'title' => '安否確認v2',
             'text' => '現在状況を教えて下さい。', 
            'actions' => [
                [ 'type' => 'message', 'label' => '怪我はありません。', 'text' => '回答１:1' ],
                [ 'type' => 'message', 'label' => '怪我がありますが、対応できます。', 'text' => '回答1:2' ],
                [ 'type' => 'message', 'label' => 'レスキューが必要です。', 'text' => '回答1:3' ],
              ]
          ] 
     ];

     $endMsg=1;
 }

 if($kaitoNo=="回答１"){

    // ボタンタイプ 
    $messageData = [ 
        'type' => 'template',
         'altText' => 'ボタン', 
        'template' => [
             'type' => 'buttons',
             'title' => '現在位置',
             'text' => '現在の住所を教えて下さい', 
            'actions' => [
                [ 'type' => 'uri', 'label' => '地図から選択', 'uri' => 'https://line.me/R/nv/location/' ],
                [ 'type' => 'message', 'label' => '避難所から選択', 'text' => '回答2:避難所' ],
                [ 'type' => 'message', 'label' => '住所を入力', 'text' => '回答2:住所' ],
              ]
          ] 
     ];

     $endMsg=1;

 }

 if($message->{"text"}=="回答2:避難所"){

    // ボタンタイプ 
    $messageData = [ 
        'type' => 'template',
         'altText' => 'ボタン', 
        'template' => [
             'type' => 'buttons',
             'title' => '現在位置',
             'text' => '現在の住所を教えて下さい', 
            'actions' => [
                [ 'type' => 'message', 'label' => '広域避難場所', 'text' => '回答3:広域' ],
                [ 'type' => 'message', 'label' => '中央区', 'text' => '回答3:中央区' ],
                [ 'type' => 'message', 'label' => '東区', 'text' => '回答3:東区' ],
                [ 'type' => 'message', 'label' => '西区', 'text' => '回答3:西区' ],
                [ 'type' => 'message', 'label' => '南区', 'text' => '回答3:南区' ],
                [ 'type' => 'message', 'label' => '北区', 'text' => '回答3:北区' ],
                [ 'type' => 'message', 'label' => '戻る', 'text' => '回答1:1' ],
              ]
          ] 
     ];

     $endMsg=1;

 }

//地図
 if($message->{"type"} == 'location'){
    // ボタンタイプ 
    $messageData = [ 
        'type' => 'template',
         'altText' => 'ボタン', 
        'template' => [
             'type' => 'buttons',
             'title' => '緊急支援装具の提供',
             'text' => '位置情報の送信有難うございました。緊急支援装具は必要ですか？緊急支援装具は、サイズや種類が普段ご使用のものと異なります。使用方法などが異なりますので、承諾頂ける方のみご利用下さい。', 
            'actions' => [
                [ 'type' => 'message', 'label' => '承諾し、受取り希望', 'text' => '回答4:希望' ],
                [ 'type' => 'message', 'label' => '不要', 'text' => '回答4:不要' ],
              ]
          ] 
     ];

     $endMsg=1;

 }


 // 送られてきたメッセージの中身からレスポンスのタイプを選択 
if ($message->{"text"} == '確認') {
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
} elseif ($message->{"text"} == 'ca') {
     // カルーセルタイプ 
    $messageData = [ 
        'type' => 'template', 
        'altText' => 'カルーセル', 
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

    if($endMsg==0){

     // それ以外は送られてきたテキストをオウム返し
     $messageData = [ 'type' => 'text', 'text' => $message->{"text"} ]; 

    }

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
