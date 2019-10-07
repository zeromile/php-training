# Basic PHP #
## Day 01 ##
[Basic PHP/MySQL Install](basic-php-instructions.md)
 - Create ```index.php```
 - Comments ```// /* */```
 - ```echo``` Command
 - Variables
 - Strings
 - Concatenation
 - Arrays
   - Indexed
   - Associative
   - Multi-dimensional

## Day 02 ##
 - ```include_once``` vs ```require_once()```
 - Control structures
   - ```for```
   - ```if```
   - ```==``` vs ```=```
 - Functions

Challenge: Create a 3 page website (```about.php```, ```index.php```, ```contact.php```) whose navigation and page content is fed by arrays; use functions to access the arrays and echo the content. You will need:  ```content.php```, ```functions.php```, and ```nav.php``` files

## Day 03 ##
 - Make a backup of your Vagrant file ```$ mv Vagrantfile Vagrantfile.log```
 - Download [Vagrantfile](Vagrantfile) from the repo to your local ```php-training``` folder (or copy-paste to an empty ```Vagrantfile``` - click on file, view "raw", then file/save)
 - Create a basic form on the ```contact.php``` page (firstname, lastname, submit)
 - Use ```$_POST/$_GET``` to pull data into the index.php
 - Use "Null Coalescing" ```??``` operators to set default value of variable from ```$_POST```

Challenge: Split into teams of 2 and, on the White boards, write out a basic HTML page that uses PHP to set a name variable before the HTML and then echo out that variable in the body of the HTML.

Challenge: Same teams, on the white boards, before your HTML use php to set two names with an array and then use a loop in the body of the HTML to echo each name out in ```<p>``` tags.

Challenge: Use PHP to get the first and last name variables from ```$_POST``` and echo them out as the default content for the two first and last name fields in the form.

## Day 04 ##
  - Databases (what are they? how do they even work?)
    - MySQL
      - Log in to mysql locally
      - Show Databases
      - Show Tables
      - Describe tables
      - Select data
      - Create a database
      - Create a table
      - Insert rows

## Day 05 ##  
    - Enable PHP Error Reporting
      - [enable-php-error-reporting](enable-php-error-reporting.md)
    - Connect to database in PHP

## Day 06 ##

## Day 07 ##
 - Back up database with ```mysqldump```  
 - Import database using ```mysql```  
 - Update ```Vagrant``` provisioners to backup and import database
 - Begin restructure of database tables
    - create navigation table
    - update content table
 - Update ```index.php``` and ```function-new.php``` to load new navigation

## Day 08 ##

 - Enable error checking without editing ```php.ini```
    - ```.htaccess``` file directives for error checking
      - ```php_flag display_startup_errors on```
      - ```php_flag display_errors on```  
    - PHP file directives for error checking (add to ```connect.php```)
      - ```ini_set('display_errors', 1);```  
      - ```ini_set('display_startup_errors', 1);```  
      - ```error_reporting(E_ALL);```  
 - Update tables to remove ```.php``` from filename field
 - Create file redirects
   - ```.htaccess``` redirects:  

    ```
    # Turn rewrite on  
    Options +FollowSymLinks  
    RewriteEngine On

    # Redirect requests to index.php  
    RewriteCond %{REQUEST_URI} !=index.php  
    RewriteCond %{REQUEST_URI} !.*\.png$ [NC]  
    RewriteCond %{REQUEST_URI} !.*\.jpg$ [NC]  
    RewriteCond %{REQUEST_URI} !.*\.css$ [NC]  
    RewriteCond %{REQUEST_URI} !.*\.gif$ [NC]  
    RewriteCond %{REQUEST_URI} !.*\.js$ [NC]  
    RewriteRule .* index.php
    ```  
   - ```$ sudo a2enmod rewrite```
   - ```sudo sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf```
   - ```sudo service apache2 restart```

- edit ```connect.php``` to include redirect code
   - ```ini_set('display_errors', 1);```
   - ```ini_set('display_startup_errors', 1);```
   - ```error_reporting(E_ALL);```  


 - Add code to grab page name from URL
```
        $uriSegments = explode("parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));  
        $thisPage = array_pop($uriSegments);  
        if($thisPage=="") {
          $thisPage="home";
        }  
        $thisPagename = $thisPage;
```
 - Updated ```makeNav()```
 - Updated ```makeContent()``` to loop through multiple content items


## Day 09 ##
  - Add comments to relevant files
  - Review new Vagranfile updates for enabling redirects, adding the following to the shell scripts to the APACHE2-RESTART section  
  ```
  echo "----------------APACHE2-RESTART--------"
  sudo a2enmod rewrite  
  sudo sed -i '/<Directory \\/var\\/www\\/>/,/<\\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf  
  sudo service apache2 restart  
  ```
 - Update ```.htaccess``` to allow php files
   - Comment this line
      - ```#RewriteCond %{REQUEST_URI} !=index.php```
   - And add this line after
      - ```RewriteCond %{REQUEST_URI} !.*\.php$ [NC]```  
 - Create a login link in nav function
 - Show how variables do not get passed from page to page
   - set $loggedIn
   - echo this in index.php
   - create login.php to echo
   - it fails
 - Set session variable in index first
 - Echo session variable in login
 - Change nav so that login link only shows when not "logged in" is true
 - Create ```secret.php``` which will display a special message when logged in but redirect back to index.php if not

  ```
  <?php
  session_start();  
  $loggedIn = $_SESSION['loggedin'];  

  if ( $loggedIn == "logged in" ) {  
    echo "Welcome to the secret page. K. That's it. Bye.";  
    } else {  
      header("Location: http://192.168.33.10/index");  
    }  
  ```

create users table (id, login, password)
add login form to login.php
verify log in

$str = "Hello";
echo md5($str);

if (md5($str) == "8b1a9953c4611296a827abf8c47804d7")
  {
  echo "<br>Hello world!";
  exit;
  }

## Day 10 ##
