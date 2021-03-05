<?php
// 直接アクセスを拒否する
if (array_shift(get_included_files()) !== __FILE__) {
    define("CLIENT_ID", "1654438976");
    define("CLIENT_SECRET", "757ee907af57d28ce02fcd1a2bea3215");
    define("REDIRECT_URI", "https://integra-line.herokuapp.com/login_anpi/callback.php");
} else {
    echo 'Access Denied';
}
