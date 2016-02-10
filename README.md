# installApp
Stands for checking php version, mysql installed, import sql

Time estimate: 2hrs

step 1:
 + check PHP version
 + check by name which webserver is running (Apache or nginx)
 + check webserver version (Apache or nginx)
 - check which database driver is available (mysql, mysqli, PDO, mongo)
 - check file permissions for config.php

step 2:
 + enter site's title
 + enter user/password/database credentials
 + select database driver (mysql, mysqli, PDO, mongo)

 - validate site's title
 + check database connection is working
 + check MySQL version (if any mysql* driver already installed) [NEED A DB CONNECTION]

step 3:
 + save settings into config.php file
   db credentials
   db driver
   site's title

 - import sql quieries from *.sql files [INTERNALLY, NO USER ADDICTION REQUIRED]

Bonus:
u can do step 3 like  progress bar animated how things go to 100% and text what backedn do ..
u need to make if will use msqli  or PDO or mongodb ... user select db driver and it is just for inner information

make   install/   - app/   and  public/    folders
inside app make all php  things   and  inside  public   make  all html  tpl  php css  js  things

Result:
Save database connection settings into config.php file (also save selected value for db driver: mysql, mysqli, Mongo)
Executed *.sql import files
