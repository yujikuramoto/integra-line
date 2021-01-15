

<?php

    $userID=$_GET['uID'];

try {
	$goto=$_GET['goto'];
} catch ( Exception $ex ) {
	$goto='';
}


    // リダイレクト先のURLへ転送する

	if ($goto=='anpi')
	{
		
    	$url = 'https://ostomate.site/emergency/step1?uid=' . $userID;
	} else {
    	$url = 'https://ostomate.site/regist/regist?uid=' . $userID;
	}


    header('Location: ' . $url, true, 301);

    // すべての出力を終了
    exit;