<html>
<body bgcolor='#E6E6E6'>
    <pre>
    <?php
    $filename = $_POST['filename'];    // gets file name and target IP from index
    $chipIP = trim($_POST['chipIP']);
    $chipPort = trim($_POST['chipPort']);
    echo "<br>";
    $filepath = "filebin/$filename";  //adds filebin/ for file IO
    $out = file($filepath);           // reads file into Array $out
    $filelines = count($out);            //  Number of lines in array
    $header = "newfile";                //newfile indicates this is first part of file string.
    echo "<br>";
    $filesize = 0;                        //rests vars
    $x = 0;
    $header = "**command**Newfile**\n";   //  headeer defaults to this  changed if looped to more data
    $filenametoESP = trim($filename) . "\n";
    $datatoESP = "";
    echo "<b>";
    echo trim($filenametoESP);
    echo " Sent to ESP.</b>";
    echo "<br><br>";
    echo "************************ Start File *********************************";
    echo "<br><br><br>";

    foreach ($out as $t) {
        $filesize = $filesize + strlen($t);    // cumulative string size to trigger a break
        if ($t == "\n") {
            $t = "  ";
        } //  removes blank lines to avoid errors at file.writeline()
        $datatoESP = $datatoESP . $t;             // builds file string
        $x++;
        if ($filesize > 1200) {
            sendtoESP($datatoESP, $header, $filenametoESP, $chipIP, $chipPort); //  sends data to function sendtoESP resets filesize
            $filesize = 0;
            $datatoESP = "";
            $header = "**command**Apdfile**\n"; // header now changed to append
        }
        if ($x == $filelines) // stops the new file or apdfile at last element of array
        {
            if ($datatoESP) {
                sendtoESP($datatoESP, $header, $filenametoESP, $chipIP, $chipPort);
            }
        }
    }

    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "************************  End File  *********************************";
    echo "<br>";
    echo "<br>";
    echo "<b>$filenametoESP Sent to ESP!</b>";
    echo "<META http-equiv='refresh' content='2;URL=.'>";

    function sendtoESP($datatoESP, $header, $filenametoESP, $chipIP, $chipPort)
    {
        $fp = fsockopen($chipIP, $chipPort, $errno, $errstr, 10);
        $out = $header . $filenametoESP . trim($datatoESP);
        echo trim($datatoESP);
        fwrite($fp, $out);
        fclose($fp);
        flush();
    }

    ?>
    </pre>
</body>
</html>

