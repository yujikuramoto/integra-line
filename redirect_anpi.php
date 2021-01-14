

<?php

    $userID=$_GET['uID'];
    // リダイレクト先のURLへ転送する
    $url = 'http://ostomate.site/emergency/step1?uid=' . $userID;
    header('Location: ' . $url, true, 301);

    // すべての出力を終了
    exit;