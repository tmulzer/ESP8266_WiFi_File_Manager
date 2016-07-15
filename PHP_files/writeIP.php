<html>
<body bgcolor='#E6E6E6'>
<?php
$chipIP = trim($_POST['chipIP']);
$chipPort = trim($_POST['chipPort']);
$fh = fopen('controllerIP.txt','w');
fwrite($fh, $chipIP);
fwrite($fh, "\n");
fwrite($fh, $chipPort);
fclose($fh);
echo "Address: ".$chipIP.":".$chipPort." saved!";
echo "<META http-equiv='refresh' content='1;URL=.'>";
?>
</body>
</html>
