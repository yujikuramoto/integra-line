<?php
$accessToken = '81e9BiSD6pC3Zj7zC5GCWocLr11Yv9UY3xuyxSGVE3rbUIiJ6ITfWGIUxMkykC32me25NPiXffrxuTmUHkt0lO9kf6qvjL1CRUBZcn/UkEW3SIBXCgZFaQiZDO4Iik8DbpqlC/7VoVXvc/o2Pqa/lgdB04t89/1O/w1cDnyilFU=';

$userID=$_GET['uID'];
/* $text = [
  // [
  //   'type' => 'template',
  //   'altText' => '安否確認をお願いします。',
  //   'template' => [
		// 'type' => 'buttons',
		// 'actions' => [
		// 	'type' => 'message',
		// 	'label' => '安否確認を行う',
		// 	'text' => '安否確認'
		// ],
		// 'thumbnailImageUrl' => 'https://t4.ftcdn.net/jpg/02/33/71/53/240_F_233715387_fNNxz3L3re2Fh0nM3xLqMHTpJXCEMbms.jpg',
		// 'title' => '災害が発生しました',
		// 'text' => '緊急支援の為、下のボタンより安否確認を行ってください。'

  //   ]
  // ],



    'type'     => 'template',
    'altText'  => '安否確認をお願いします。',
    'template' => [
        'type'    => 'buttons',
        'thumbnailImageUrl' => 'https://t4.ftcdn.net/jpg/02/33/71/53/240_F_233715387_fNNxz3L3re2Fh0nM3xLqMHTpJXCEMbms.jpg',
        'title'   => '災害が発生しました' ,
        'text'    => '緊急支援の為、下のボタンより安否確認を行ってください。',
        'actions' => [
            ['type'=>'message', '安否確認を行う'=>'', 'text'=>'安否確認',],
        ],
    ]




];

$message = [
    'to' => $userID,
    'messages' => $text,
    //'client_id'     => $client_id,
    //'client_secret' => $client_secret
]; */

$text = [
    [
    'type' => 'text',
    'text' => '災害地域に指定されました。安否確認を行ってください。'
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