# ESP8266 NodeMCU WiFi File Manager
These files allow remote file management over WiFi for ESP8266 chips running NodeMCU.

With these files it is possible to add, delete, compile, and run files on the ESP via a web browser.


Files in the Lua_files folder (4) should be uploaded to a freshly formated ESP8266 running NodeMCU.
init.lua should be edited to reflect your LAN SSID and Password settings.

PHP files should be uploaded to a web server that is in the same network as the ESP.

![Screenshot Index](/pics/screenshot-index.png?raw=true)

# How To
Copy the Lua files to your ESP.

You can also use your own code to create a TCP server.

But don't change the wifi-tools.lua (otherwise the PHP files won't work).


Copy the PHP Files to a webserver in your local network.

Copy the files you want to upload to the ESP to the filebin directory.
Don't change the name of the directory.

Give proper rights to the controllerIP.txt file. (or just use 777)


Use your browser to access the WiFi File Manager.

You should get a list of files in the filebin directory.


Enter the name or IP of the ESP that you want to access.

Enter the port on which the TCP server is listening.

Press the update button.


You should now be able to work with the File Manager.

# Project differences
This project is a fork of https://github.com/breagan/ESP8266_WiFi_File_Manager

The original code didn't come with an explicit license. (2016-07-15)

The most differences compared to the original project are in PHP and HTML code.
There where syntax errors and wrong formattings.

Lua files are changed to improve readability.
And some unused line have been removed.

Theres a new function that allows you to set a port different to 80 for the connection with your ESP.

To change the port that your ESP is listening, edit the servernode.lua file.
