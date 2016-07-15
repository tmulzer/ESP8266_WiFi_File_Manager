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
    $out = "**command**compile**\n" . $filename;
    fwrite($fp, $out);
    fclose($fp);
    flush($fp);
    if ($errno == 0) {
        echo "<b>compile($filename) sent!</b>";
        echo "<META http-equiv='refresh' content='2;URL=.'>";
    } else {
        echo "Error,  # $errno";
        echo "<META http-equiv='refresh' content='2;URL=.'>";
    }
    ?>
	</pre>
</body>
</html>

