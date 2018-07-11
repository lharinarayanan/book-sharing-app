# Spider-task-3
 A book reading and sharing social networking website wher users can add,remove,like,rate books according to  their  choice.
Done with PHP Version 7.2.5 and code for accessing and manipulating database has been written in mysql procedural format.
# General Instructions To run this task
Install XAMPP (X- any OS A-Apache M-MySql P-PHP P-Pearl) on your laptop/pc (works on all operating systems).After installation start the apache and mysql componemts in the xampp control pannel.

Extract the above php and html files to the demo folder in the htdocs folder within the xampp folder in your respective localdisk eg. C:\xampp\htdocs\demo

Create database hari_db in http://localhost/phpmyadmin/index.php by clicking on the new icon on the left of the page.

Within the database create the following tables in XAMPP PHPMYADMIN SQL control pannel within the database.

CREATE TABLE user ( id INT(9) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), email VARCHAR(255), telephone bigint(10), password VARCHAR(255) );

CREATE TABLE books ( id INT(9) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), title VARCHAR(255), author VARCHAR(255), // # don't provide any default length,image VARCHAR(255),status VARCHAR(255),rating INT(9),comments VARCHAR(255) ); 
note VARCHAR(255) );

Place the above link in your browser http://localhost/demo/sp_login.php

Thus the user can signup/login if his account exists and can add edit remove books and can control his profile status
P.S
Not much of emphasis has been given to styling of the webpage.
The apache and mysql component in the XAMPP control pannel need to be started only once but it sholud be done after you log into your system.
Asynchronous Search implemented
