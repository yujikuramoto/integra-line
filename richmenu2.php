 <?php 

            $json=array(
                "size" => array(
                    "width" => 1200 ,
                    "height" => $height ,
                ),
                "selected" => false ,
                "name" => "テストメニュー" ,
                "chatBarText" => "メニューはこちら" ,
                "areas" => array(
                    array(
                        "bounds" => array(
                            "x" => 0 ,
                            "y" => 0 ,
                            "width" => 1400 ,
                            "height" => 810 ,
                        ),
                        "action" =>array(
                　　　　　　　　　"type" => "message" ,
                　　　　　　　　　"text" => "メッセージを送信します。" ,
            　　　　　　　　　　　),
                    ),
                ),
            );


    $url="https://api.line.me/v2/bot/richmenu";

    $headers = array(
        "Content-type: application/json",
        "Authorization: Bearer 'g+1NNYuFz0EDbgfBIP13UCjol3b04Rs793Q5GQ8Us8Fqpt5lFJJ23dtKkoQMysx+PVpnev2rkZ6g94tMNa5ZvUixtnd3NbEh0mY/3W1ztUr7ILa7G4NX/iFC+ovgjohW9QsJZIG6TcgkI8a43GMQ3wdB04t89/1O/w1cDnyilFU='",
        );

    $ch = curl_init(); // はじめ

    //postするデータの配列
    $body = json_encode($json);

    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //ヘッダー追加オプション
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result =  curl_exec($ch);
    $result = mb_convert_encoding($result,"UTF-8","EUC-JP");
    curl_close($ch); //終了
    
    echo $result;