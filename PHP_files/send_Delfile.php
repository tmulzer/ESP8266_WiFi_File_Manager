<html>
<body bgcolor='#E6E6E6'>
    <pre>
    <?php
    $filename = $_POST['filename'];
    $chipIP = trim($_POST['chipIP']);
    $chipPort = trim($_POST['chipPort']);
    echo $filename . "<br>" . $chipIP.":".$chipPort;
    echo "<br>";
    $fp = fsockopen($chipIP, $chipPort, $errno, $errstr, 10);
    $out = "**command**delfile**\n" . $filename;
    fwrite($fp, $out);
    fclose($fp);
    flush();
    if ($errno == 0) {
        echo "<b>$filename deleted!</b>";
        echo "<META http-equiv='refresh' content='2;URL=.'>";
    } else {
        echo "Error, $filename may not be deleted!  Error # $errno";
        echo "<META http-equiv='refresh' content='2;URL=.'>";
    }
    ?>
    </pre>
</body>
</html>
