<html>
<body>

<?php

    $userID=$_SESSION["userID"];
    echo "<H1>ID:$userID</H1>"

?>
<input type='text' id='result' size='40' ></input>
<input type='button' value='QRCODE by BarcodeScanner' onclick='scanQR()' ></input>
<input type='button' value='JANCODE by Pic2shop' onclick='scanJAN()' ></input>

<script>
function scanQR(){
    var s='zxing://scan/?ret='
    s+=encodeURIComponent(location.origin+location.pathname+'?r={CODE}')
    document.location=s
}

function scanJAN(){
    var s='pic2shop://scan?callback='+encodeURIComponent(location.origin+location.pathname+'?r=EAN')
    document.location=s
}

window.addEventListener('DOMContentLoaded',function(){
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    var r=getParameterByName('r')
    if(r) getElementById('result').value=r
},false)
</script>

</body></html>