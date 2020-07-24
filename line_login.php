<?php

$callback_url = "https://integra-line.herokuapp.com/line_callback.php";

$url = sprintf(
    "https://access.line.me/dialog/oauth/weblogin"
    ."?response_type=code"
    ."&client_id=%s"
    ."&redirect_uri=%s"
    ,LINE_CLIENT_ID
    ,$callback_url
);

header("Location: {$url}");
exit;