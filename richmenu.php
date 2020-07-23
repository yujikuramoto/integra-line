<?php 
$accessToken = 'g+1NNYuFz0EDbgfBIP13UCjol3b04Rs793Q5GQ8Us8Fqpt5lFJJ23dtKkoQMysx+PVpnev2rkZ6g94tMNa5ZvUixtnd3NbEh0mY/3W1ztUr7ILa7G4NX/iFC+ovgjohW9QsJZIG6TcgkI8a43GMQ3wdB04t89/1O/w1cDnyilFU='; 
//$jsonString = file_get_contents('php://input'); error_log($jsonString); 
//$jsonObj = json_decode($jsonString);
//$message = $jsonObj->{"events"}[0]->{"message"}; 
//$userID = $jsonObj->{"events"}[0]->{"source"};
//$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
//$contentType = $jsonObj->{"result"}[0]->{"content"}->{"contentType"};

     // カルーセルタイプ 
    $setData = [

        'size' => [
          'width' => '2500',
          'height' => '1686'
        ],
        'selected' => 'false',
        'name' => 'Nice richmenu',
        'chatBarText' => 'Tap here',
        'areas' => [
          'bounds' => [
            'x' => '34',
            'y' => '24',
            'width' => '169',
            'height' => '193'
          ],
          'action' => [
            'type' => 'uri',
            'uri' => 'https://developers.line.biz/en/news/'
          ]

        ]
      ];

//$response = [ 'replyToken' => $replyToken, 'messages' => [$setData] ]; 


error_log(json_encode($response)); 
$ch = curl_init('https://api.line.me/v2/bot/richmenu'); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($setData)); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json; charser=UTF-8', 'Authorization: Bearer ' . $accessToken )); 
$result = curl_exec($ch); error_log($result); 
curl_close($ch);

echo $result;

