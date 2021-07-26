# WebVIST_Recuitment
Recruitment task for WebVIST

# How to run the website
There are several things needed: 
* Web server for hosting
* PHP configured
* Twig configured
* Database connected
* PHPmailer configured

## Web server for hosting
I used IIS from Windows, but any other hosting server will work just fine. 

## PHP
Website's backend is built fully with PHP, so make sure to install it on your server. <br>
The file that is loaded at the beginning is 'index.php'. 

## Twig
Main tool used to connect PHP with HTML. <br>
To install it, use composer.
https://twig.symfony.com/doc/2.x/installation.html

## Database
In the directory 'Databases' dumped databases can be found. <br>
Download it and place in your SQL client, and then configure data in 'config.inc.php' file.

## PHPmailer
To install it, use composer. Details can be found here:
https://github.com/PHPMailer/PHPMailer

If any problems occur, please contact me: adrianciesielczyk2000@gmail.com