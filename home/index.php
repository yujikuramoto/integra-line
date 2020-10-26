

<?php

    $userID=$_GET['uID'];
    // リダイレクト先のURLへ転送する
    $url = 'https://ostomate.site/regist/regist?uid=' . $_GET['uID'];
    header('Location: ' . $url, true, 301);

    // すべての出力を終了
    exit;