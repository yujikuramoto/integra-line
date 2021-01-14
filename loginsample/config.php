<?php
// 直接アクセスを拒否する
if (array_shift(get_included_files()) !== __FILE__) {
    define("CLIENT_ID", "1655577549");
    define("CLIENT_SECRET", "688dc45bc090c7a5d3c1d4ddb66df3dc");
    define("REDIRECT_URI", "https://integra-line.herokuapp.com/loginsample/callback.php");
} else {
    echo 'Access Denied';
}
