AMNON SISAY — PERSONAL PORTFOLIO (PHP VERSION)
==============================================

PROJECT FILES
-------------
index.php       Main portfolio page (PHP + HTML)
assets/style.css Page styling and responsive layout
js/main.js      Original template JavaScript (if needed)
connect.php     Connects PHP to the MySQL database using PDO
message.php     Validates and saves contact form messages
database.sql   Creates the database and messages table
img/            Website images, including your profile photo
lib/            Original template libraries

WHAT PHP DOES
-------------
The portfolio page is served by PHP. The contact form sends its data to
message.php, which validates the fields and stores messages in MySQL.
Prepared statements are used for database inserts.

RUN WITH XAMPP
--------------
1. Extract this project folder into C:\xampp\htdocs\
2. Start Apache and MySQL in the XAMPP Control Panel.
3. Open http://localhost/phpmyadmin
4. Import database.sql.
5. If your MySQL username/password is different, edit connect.php.
6. Open http://localhost/personal-portfolio-template2_Grade12-main/
7. Submit a test message and check the messages table in phpMyAdmin.

REQUIREMENTS
------------
- PHP 8 or newer recommended
- MySQL or MariaDB
- PDO MySQL PHP extension enabled

NOTE
----
This project is based on your supplied Grade 12 portfolio template and uses
the PHP/MySQL project structure described in the GitHub reference README.
Your projects/achievements section remains honest and says it can be updated
when you have real projects to add.
