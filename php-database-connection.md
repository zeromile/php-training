# Connecting to a Database using PHP #

This will be a walk-through showing you how to use php to connect to a database and select data from a table.

We need to start by making sure we have a database selected. We'll be using MySQL and PHP's MySQLi connector. There is another method called PDO (PHP Data Objects) which allows you to connect to 12 different database systems but we will start with the MySQLi for now.

SSH into your running php-training Vagrant box that we set up previously in Day 03. <br/>
```$ vagrant ssh```

Connect to the MySQL CLI  
```$ mysql -u root -p```

The password is ```secret```

You will be presented with the MySQLi CLI prompt:  
```mysql>```

Command reference:  
```SHOW DATABASES;``` - Show a list of all the DATABASES  
```SHOW TABLES in {DATABASENAME};``` - Show a list of tables in a particular DATABASE

```USE {DATABASENAME};``` - This chooses which database you want to use by default  
```SHOW TABLES;``` - Show a list of tables in the currently selected DATABASE  
```DESCRIBE {TABLENAME};``` - Show a list of the columns and column data types for the table name provided  
```SELECT * FROM {TABLENAME};``` - Selects all records and all columns from the table name provided  

```CREATE DATABASE {DATABASENAME};``` - Create a database  
```CREATE TABLE {TABLENAME} ({OPTIONS});``` -  Create a table on the chosen database (USE {DATABASENAME})  
```INSERT INTO {TABLENAME} ({COLUMNNAME},{COLUMNNAME},{COLUMNNAME}...)```  
```VALUES ({VALUE}, {VALUE}, {VALUE}...);``` - Create a record in the provided table  
