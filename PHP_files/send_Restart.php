<html>
<body bgcolor='#E6E6E6'>
    <pre>
    <?php
    $chipIP = trim($_POST['chipIP']);
    $chipPort = trim($_POST['chipPort']);
    $fp = fsockopen($chipIP, $chipPort, $errno, $errstr, 10);
    $out = "**command**restart**";
    fwrite($fp, $out);
    fclose($fp);
    flush($fp);
    echo "<b>node.restart() command sent to $chipIP:$chipPort</b>";
    echo "<br>Redirect in 5 seconds time for ESP to reboot.";
    echo "<META http-equiv='refresh' content='5;URL=.'>";
    ?>
    </pre>
</body>
</html>

