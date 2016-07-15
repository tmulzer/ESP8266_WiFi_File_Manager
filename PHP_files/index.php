<?php
$chipdata = file("controllerIP.txt");   // reads IP number for ESP
$chipIP = $chipdata[0];
$chipPort = $chipdata[1];
$uploadfiles = scandir("./filebin");    // reads the /filebin dir and puts all files in an array.
?>

<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN'>
<html>
<head>
    <title>WiFi ESP8266 Manager</title>
    <style type="text/css">

    </style>
    <script type="text/javascript">

    </script>
</head>
<body>
    <h2><center>ESP8266 NodeMCU WiFi File Manager</center></h2>
    <table border="0" bgcolor='#f0f0f0' cellpadding="5" align="center" width="500">
        <tr>
            <td align="center">
                <form action='writeIP.php' method='post'>   <!-- writes updated IP -->
                    <label for="chipIP">ESP address: </label>
                    <input type='text' id="chipIP" name='chipIP' value='<?php echo $chipIP; ?>' size='15'>
                    <label for="chipPort">Port: </label>
                    <input type='text' id="chipPort" name='chipPort' value='<?php echo $chipPort; ?>' size='5'>
                    <input type='submit' value='Update'>
                </form>
                <br>

                <form method='get' action='http://<?php echo $chipIP.":".$chipPort; ?>'>   <!-- simple link to target ESP to get status -->
                    <input type='submit' value='Controller Status'>
                </form>

                <form method='post' action='send_Restart.php'>
                    <input type='hidden' name='chipIP' value="<?php echo $chipIP; ?>">
                    <input type='hidden' name='chipPort' value='<?php echo $chipPort; ?>'>
                    <input type='submit' value='   ReBoot ESP   '>
                </form>

                <br>
                <div style="border: 1px; background-color: #f8f8f8; width: 350px">
                    <b><center>Files in '/filebin' available for upload:</center></b>
                    <p>Click on a file to upload it.</p>
                    <p>An already existing file will be overwritten.</p>
                    <br>
                    <?php
                    foreach($uploadfiles as $t) // iterates through array to list files available to be uploaded
                    {
                        if($t != "." && $t != "..")
                        {
                    ?>
                    <div>
                        <form method='post' action='send_File.php'>
                            <input type='hidden' name='chipIP' value='<?php echo $chipIP; ?>'>
                            <input type='hidden' name='chipPort' value='<?php echo $chipPort; ?>'>
                            <input type='hidden' name='filename' value='<?php echo $t; ?>'>
                            <input type='submit' value='<?php echo $t; ?>'>
                        </form>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <br><br>
                <div style="display: table; width: 450px">
                    <div style="display: table-row;">
                        <div style="display: table-cell;"><label for="filename">File to file.remove():</label></div>
                        <div style="display: table-cell;">
                            <form action='send_Delfile.php' method='post'>
                                <input type='text' id="filename" name="filename" value=''>
                                <input type='submit' value='Delete  '>
                                <input type='hidden' name='chipIP' value='<?php echo $chipIP; ?>'>
                                <input type='hidden' name='chipPort' value='<?php echo $chipPort; ?>'>
                            </form>
                        </div>
                    </div>
                    <div style="display: table-row;">
                        <div style="display: table-cell;"><label for="filename">File to dofile():</label></div>
                        <div style="display: table-cell;">
                            <form action='send_Dofile.php' method='post'>
                                <input type='text' id="filename" name='filename' value=''>
                                <input type='submit' value=' Dofile  '>
                                <input type='hidden' name='chipIP' value='<?php echo $chipIP; ?>'>
                                <input type='hidden' name='chipPort' value='<?php echo $chipPort; ?>'>
                            </form>
                        </div>
                    </div>
                    <div style="display: table-row;">
                        <div style="display: table-cell;"><label for="filename">File to node.compile():</label></div>
                        <div style="display: table-cell;">
                            <form action='send_Compile.php' method='post'>
                                <input type='text' id="filename" name='filename' value=''>
                                <input type='submit' value='Compile'>
                                <input type='hidden' name='chipIP' value='<?php echo $chipIP; ?>'>
                                <input type='hidden' name='chipPort' value='<?php echo $chipPort; ?>'>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>