# Windows Apache PHP mysql setup
1. download Aparche from https://www.apachelounge.com/download/
2. copy the folder Aparche24 from the downloaded zip into C drive C:\
3. download and install visual c++ redistribute for visual studio 2015 
4. download the VC15 x86 Thread Safe (2019-Dec-17 15:43:37) php version 7.3.13 from  https://windows.php.net/download/
5. go to C:\ directory and create a new folder called php
6. extract the downloaded zip file into the php folder
7. open the httpd.conf file  in the dir C:\Aparche34\conf\
8. add the following line into the configuration file 

```
LoadModule php7_module "C:\php\php7apache2_4.dll"
AddHandler application/x-httpd-php .php
#configure the path to php.ini
PHPIniDir "C:/php"
```

9. Find "DirectoryIndex"
    change "index.html to "index.php"
10. Find "SeverName"
    change "www.example.com:80" to "localhost"

11.open cmd (run as administor)
12.C:\WINDOWS\system32>cd C:\Apache\bin\httpd -k install

**Environment Setup because the path is not specific

13.Right click the window logo
14.Click System -> system info -> advanced system setting -> environment variable
15.On System variable select and highlight the path and click edit
16. Create a new environment variable as followed

```
**Note that C:\php has to be on the top
C:\php
C:\Apache24
C:\Apache24\bin
```


17. Open cmd as administor
18. cd C:\Apache24\bin
19. type on the console    > httpd -S
20. The following message is shown

```
AH00558: httpd: Could not reliably determine the server's fully qualified domain name, using fe80::3900:18b2:3269:319c. Set the 'ServerName' directive globally to suppress this message
VirtualHost configuration:
ServerRoot: "C:/Apache24"
Main DocumentRoot: "C:/Apache24/htdocs"
Main ErrorLog: "C:/Apache24/logs/error.log"
Mutex default: dir="C:/Apache24/logs/" mechanism=default
PidFile: "C:/Apache24/logs/httpd.pid"
Define: DUMP_VHOSTS
Define: DUMP_RUN_CFG
Define: SRVROOT=c:/Apache24
```
-----RESTART WINDOWS ----- and rerun httpd -k install

21. go to C:\php rename "php.ini-development" to "php.ini"
22. find and remove the semicolon from the line extension_dir = "ext"
23. find and remove the semicolon from the line extension=mysqli
23. find and remove the semicolon from the line extension=mbstring
24. cd C:\php and then type php -n

*** httpd -k restart 
//command to start the apache server

25. go to browser and type localhost, and it will display "It works"
26. go to C:Apache24\htdoc and create a file info.php
27. write the following code into the file 

```
    <?php phpinfo(); ?>
```
28. go to localhost again, click on the php.info, the php info should be displayed on the screen.

----- NOW install mysql community server
29. goto https://dev.mysql.com/downloads/windows/installer/8.0.html
30. download and install the msi

----- NOW install the phpmyadmin
31. goto https://www.phpmyadmin.net/
32. extract and place the folder phpMyAdmin-5.0.1-all-languages into the C:\Apache24\htdoc
33. open the localhost on the browser and you will be able to log on to the phpmyadmin login page
34. configure the mysql using default setting.

35. NOTE if username: root password: doesnt work then do the following
35. open the mysql client teminal and run the following code
```
SELECT user,authentication_string,plugin,host FROM mysql.user;
```
36. change the authentication with the native password
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
```

37. The dafault username: root
    The default password: password


