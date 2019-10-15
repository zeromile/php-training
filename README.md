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

## Day 10 ##
Today we will continue adding to our login system.
 - Add and commit your changes
  ```
      $ git add .  
      $ git commit -m "beginning of day 10"
  ```   
 - Create and checkout day10 branch  
  ```
  $ git checkout -b day10
  ```
  OR  
  ```
  $ git branch day10
  $ git checkout day10
  ```
 - Remove these files: ```contact.php```, ```content.php```, ```nav.php```, ```about.php```  
 - remove these two lines from top of ```connect.php```  
 ```
 //$loggedIn = "not logged in";
 $_SESSION["loggedin"] = "not logged in";
```
 - Add logout link in ```function-new.php```  
 ```
 if ($loggedIn == "not logged in"){
   echo "<li><a href='login.php'>Log In</a></li>";
 } else {
   echo "<li><a href='logout.php'>Log Out</a></li>";
 }
 ```
 - Create ```logout.php```
   - ```$ touch logout.php```  
   - Add this code to ```logout.php```  
 ```
 session_start();
 $_SESSION = array();
 session_destroy();
 header("Location: http://192.168.33.10/index");
 ```
 - Update line 5 ```index.php```
 ```
 $loggedIn = $_SESSION['loggedin'] ?? "not logged in";
 ```
 - Revise ```login.php```  
 ```
 session_start();
 require_once('connect.php');

 if (!empty($_POST)){
   // if not logged in then check if login was submitted
   $userName = $_POST["username"];
   $passWord = $_POST["password"];
   $sql = "SELECT username, password, realname FROM test.users WHERE username = '$userName' LIMIT 1";

   $result = $conn->query($sql);
   $row = $result->fetch_assoc();

   if ($userName == $row["username"] &&
     md5($passWord) == $row["password"])
     {
       $_SESSION["loggedin"] = "logged in";
       $loggedIn = $_SESSION["loggedin"];
     } else {
       echo "Try again";
       $loggedIn = $_SESSION["loggedin"] ?? "not logged in";
     }
 } else {
   $loggedIn = $_SESSION["loggedin"] ?? "not logged in";
 }

 if ($loggedIn == "logged in") {
   // if "logged in" then redirect to index
   header("Location: http://192.168.33.10/index");
 } else {
   // if not logged in show login form
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
   </head>
   <body>
     <h1>Login Page</h1>
     <form action="login.php" method="post">
       Username: <input type="text" name="username"> </br>
       Password: <input type="password" name="password"> </br>
       <input type="submit" value="login">
     </form>
   </body>
   </html>
 <?php }
```
 - Create ```users``` table (id, login, password)
 - Verify log in using the MD5 Hash function in PHP

## Day 11 ##
 - Challenge: Add code to your site that will show the user's "realname" when they are logged in to the site
 - Solution: Two lines, yo:
   - Add the ```$_SESSION["realname"]``` line to the following code in ```login.php```
 ```
  if ($userName == $row["username"] &&
   md5($passWord) == $row["password"])
   {
     $_SESSION["loggedin"] = "logged in";  
     $_SESSION["realname"] = $row["realname"]; // add this line
```
  - Add the ```$_SESSION["realname"]``` line to the followiung code in ```function-new.php```
 ```
 if ($loggedIn == "not logged in"){
   echo "<li><a href='login.php'>Log In</a></li>";
 } else {
   echo "<li><a href='logout.php'>Log Out</a></li>";
   echo "<p> Howdy " . $_SESSION["realname"] . "</p>"; //add this line
 }
 echo "</ul>";
```

## Day 12 ##
 - Challenge: Add CSS to your php-training project that does the following:
   - Horizontal navigation w/ background colors:
      - ```#BF3F7F``` when logged in
      - ```#7FBF3F``` when logged out
   - Styles applied to ```<h>``` and ```<p>``` tags (that, at the very least, change the default typefaces)

## Day 13 - Part 1: CSS Challenge Solution##
 - Video at [CSS Challenge Solution](https://youtu.be/XTf1NzeU_UY)
 - Change name of ```function-new.php``` to ```functions.php```  
 - Change the reference to ```functions.php``` in ```index.php```  
 - Add ```<?php echo $_SERVER['PHP_SELF']; ?>``` in the action portion of the form in ```login.php```  
 - Solution to CSS Challenge: Sharing is caring
    - Create ```main.css```
    - Add this css:
    ```
    h1, h2, h3, p, a {
    font-family: sans-serif;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    li a:hover {
      background-color: #111;
    }

    section {
      padding: 0 30px 0 30px;
    }
    ```
 - In ```index.php``` a
   - Add the link to the ```main.css``` file in the head section with:
   ```
   <link rel="stylesheet" href="main.css">
   ```
   - Add the ```$thisPageName``` variable into the ```makeNav()``` function call  
     ```
     makeNav($conn, $loggedIn, $thisPagename);  
     ```  
 - In ```functions.php```:  
    - Add the ```$thisPagename``` variable into the ```makeNav()``` function parameters to receive the page name  
    ```
    function makeNav($conn, $loggedIn, $thisPagename){
    ```  
    - Change the background color of the nav by revising the ```makeNav()``` function block to swap a class based on the logged in status of ```$loggedIn``` and echoing out the class in the opening ```<ul>```
      ```
      if($loggedIn == "logged in"){
        $loggedInClass = "class='loggedin'";
      } else {
        $loggedInClass = "class='notloggedin'";
      }
      echo "<ul " . $loggedInClass . ">";
      ```
    - Add an active class to the navigation link by revising the ```makeNav()``` function block to check if the supplied page name is equal to the active page name and setting the echo'd variable ```$active```.  
    ```
    while ( $row = $result->fetch_assoc() ) {
      if ( $thisPagename == $row['pagename']) {
          $active = "class='active'";
        } else {
          $active = "";
        }
      echo "<li " . $active . "><a href='" . $row['pagename'] . "'>" .$row['pagetitle']. "</a></li>";
      }
    ```
 - In ```main.css``` add the following classes  
    ```
    .active {
      background-color: #4CAF50;
    }
    .loggedin {
      background-color: #BF3F7F;
    }
    .notloggedin {
      background-color: #7FBF3F;
    }
    ```

## Day 13 - Part 2: Intro to Classes ##
A class is a created object that is a collection of variables and functions (in a class they are referred to as properties and methods). The advantage of putting your functions and variables into a class is that because a class is scoped to the instantiating object your methods and properties will be protected and also available to each other within the class.
 - Create a new file named ```class.php```
 - In the ```class.php``` file create the class construct named ```Square```:  
 ```
 <?php
 class MyClass
 {

 }
 ```
 - Now let's add a property:
 ```
 class MyClass
 {
   /*
    Create the variable, sets the default
    value, and makes the variable available
    to the other class member's methods &
    properties
   */
   public $myname = 'Jason';
 }
 ```
 - Notice that we have added the word ```public``` in front of our variable declaration. This allows the variable to be accessed from outside of the instantiated class, which means it can be used in our general program and not just inside the class.
 - There are two other variable visibility keywords: ```protected``` and ```private```, which can also be applied to methods. They set the "scope" of the class member they are applied to.
  - ```public``` - member will be available everywhere (must still be called by associating it with the class)
  - ```protected``` - member will be available only inside the class itself and inheriting and parent classes
  - ```private``` - member will be available only within the class that defines the member  
 - We can see this in action by using the php cli  
  - ```$ vagrant ssh``` into your running Vagrant box
  - ```$ cd /vagrant``` // change into your vagrant folder
  - ```$ php -a```  // start the php CLI  
 - Type each of the following lines into the CLI (at the ```php >``` prompt)
   - Load the ```class.php``` file that contains our ```MyClass``` class  
    - ```php > require('class.php');```
   - Instantiate the class in a new variable
    - ```php > $myClass = new MyClass();```  
   - Echo out the ```$myname``` variable  
    - ```php > echo $myClass->myname;```

 - Now lets add a method:  
  ```
  ...
  public $myname = 'Jason';  
  public function printHello()  
  {  
    return $this->myname;  
  }  
  ...
  ```  
 - Notice that there is a new keyword called ```return```. A return will cease execution of the function where the return is called and send any elements after it, in the same statement, back to wherever the function was called from. ```return``` Is not a function/method but a "language construct"
 - Call the function named ```printHello()``` and echo it's output  
  - ```php > echo $myClass->printHello();```
