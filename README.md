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

Challenge: Create a 3 page website (```about.php```, ```index.php```, ```contact.php```) whose navigation and page content is fed by arrays; use functions to access the arrays and echo the content. You will need:  ```content.php```, ```functions.php```, and ```nav.php``` files.

## Day 03 ##

 - Make a backup of your Vagrant file
    ```$ mv Vagrantfile Vagrantfile.log```
 - Download [Vagrantfile] from the repo to your local ```php-training``` folder (or copy-paste to an empty ```Vagrantfile``` - click on file, view "raw", then file/save) 
 - Create a basic form on the ```contact.php``` page
 - Use $_POST/$_GET to pull data into the index.php
 - Use "Null Coalescing" ```??``` operators to set default value of variable from $_POST

## Day 04 ##
 - Databases (what are they? how do they even work?)
    - Work with MySQL
    - Create a database
    - Create a table
    - Insert rows
