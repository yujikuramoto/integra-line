<?php 
$accessToken = 'g+1NNYuFz0EDbgfBIP13UCjol3b04Rs793Q5GQ8Us8Fqpt5lFJJ23dtKkoQMysx+PVpnev2rkZ6g94tMNa5ZvUixtnd3NbEh0mY/3W1ztUr7ILa7G4NX/iFC+ovgjohW9QsJZIG6TcgkI8a43GMQ3wdB04t89/1O/w1cDnyilFU='; 
$jsonString = file_get_contents('php://input'); error_log($jsonString); 
$jsonObj = json_decode($jsonString); $message = $jsonObj->{"events"}[0]->{"message"}; 
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};


 // �����Ă������b�Z�[�W�̒��g���烌�X�|���X�̃^�C�v��I�� 
if ($message->{"text"} == '�m�F') {
     // �m�F�_�C�A���O�^�C�v 
    $messageData = [ 
        'type' => 'template', 
        'altText' => '�m�F�_�C�A���O', 
        'template' => [ 'type' => 'confirm', 'text' => '���C�ł����[�H', 
            'actions' => [
                [ 'type' => 'message', 'label' => '���C�ł�', 'text' => '���C�ł�' ],
                [ 'type' => 'message', 'label' => '�܂��܂��ł�', 'text' => '�܂��܂��ł�' ], 
            ] 
        ]
 ]; 
} elseif ($message->{"text"} == '�{�^��') { 
    // �{�^���^�C�v 
    $messageData = [ 
        'type' => 'template',
         'altText' => '�{�^��', 
        'template' => [
             'type' => 'buttons',
             'title' => '�^�C�g���ł�',
             'text' => '�I�����Ă�', 
            'actions' => [
                 [ 
                    'type' => 'postback', 
                    'label' => 'webhook��post���M', 
                    'data' => 'value' 
                ],
                 [
                     'type' => 'uri',
                     'label' => 'google�ֈړ�', 
                     'uri' => 'https://google.com' 
                 ]
              ]
          ] 
     ]; 
} elseif ($message->{"text"} == '�J���[�Z��') {
     // �J���[�Z���^�C�v 
    $messageData = [ 
        'type' => 'template', 
        'altText' => '�J���[�Z��', 
        'template' => [
             'type' => 'carousel', 
            'columns' => [ 
                [ 
                    'title' => '�J���[�Z��1', 
                    'text' => '�J���[�Z��1�ł�',
                     'actions' => [
                         [
                            'type' => 'postback',
                             'label' => 'webhook��post���M',
                             'data' => 'value'
                         ],
                         [ 
                            'type' => 'uri', 
                            'label' => '���e�̌��R�~�L�������',
                             'uri' => 'https://report.clinic/'
                         ] 
                    ] 
                ],
                 [ 
                        'title' => '�J���[�Z��2', 
                        'text' => '�J���[�Z��2�ł�', 
                        'actions' => [ 
                            [
                                'type' => 'postback', 
                                'label' => 'webhook��post���M', 
                                'data' => 'value' 
                            ], 
                            [ 
                                'type' => 'uri', 
                                'label' => '�����������', 
                                'uri' => 'https://jobikai.com/' 
                            ] 
                        ] 
                    ], 
                ] 
            ] 
    ];
 } else {
     // ����ȊO�͑����Ă����e�L�X�g���I�E���Ԃ�
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