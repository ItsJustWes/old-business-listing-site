

Setup process

1. Edit the '.php' files in this package - very little code - most of it is basic HTML. 

The db.php file has the following code: 

    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   = 'DATABASE NAME';
    $DATABASE_USER   = 'USER';
    $DATABASE_PASSWORD = 'PASS';


2. Create images to replace the default ones.

3. In the b.php you will need to get a Google Map API code. 

4. The State Databases we provide are in SQL format. Create and name your database --  then import this file. 
Once it is imported the database will be populated with the new Table (which will be named 'List') and Records.

6. Upload files. 


**************************
.htaccess file

In this file you will see the following code:

Options +FollowSymLinks
RewriteEngine On
RewriteRule (.*).htm$ http://www.yourdomain.net/q.php?q=$1 

Edit the last line.

This will rewrite the URLs to Search Friendly URLs.

So http://yoursite.com/accountants.htm will now return results