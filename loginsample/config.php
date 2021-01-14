<?php
// 直接アクセスを拒否する
if (array_shift(get_included_files()) !== __FILE__) {
    define("CLIENT_ID", "1654489742");
    define("CLIENT_SECRET", "2e8ca695b0fcb0662f497a328c87cdfe");
    define("REDIRECT_URI", "https://integra-line.herokuapp.com/loginsample/callback.php");
} else {
    echo 'Access Denied';
}
