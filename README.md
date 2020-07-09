# SSDOnline-project
SSDOnline project php project

# Installation
SSDOnline project is a PHP project which require webserver to run. For testing local your required to install or have wamp or xamp on your system.

# Database
On the directory there is "db.sql" file which is database sql code used in this project. Import to your database management system.

# Databases connection
Inorder to perfom database operation on this project, I have created file for make connection to database server and to perform few database operation called "DBConection.php" found in "includes folder".

# DBConnection.php file
Make few changes depend on your server status, the following line may required to be changed to make connection successful on DBConnection.php file.

# Code Line 4 "private $server = "localhost:3308";"
change "3308" if port number of your server is different or if your using database server(Mysql) below 8.0.18 you can remove ":3308" and remain with "localhost"

# Code Line 5 "private $username= "root";"
Change "root" if your database server username is different

# Code Line 6 "private $password= "";"
Change "" if your using password to your database username assing the password your using.

# Note:
Delete btn is double click and other button is single click.
		
After finished make changes save and you can test the project.
