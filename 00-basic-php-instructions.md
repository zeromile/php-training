# Basic PHP/MySQL Install #
Once you have VirtualBox and Vagrant
running you can use the following
instructions to help you stand up a
basic PHP/MySQL virtual machine.

The following instructions are INSECURE...
which means you should not do this on a
production machine that is live on the
Internets. This is only for your local testing.
```
$ mkdir php-training folder
$ cd php-training
$ vagrant init ubuntu/xenial64
```
Edit the Vagrantfile
        1. set private network to 192.168.33.10
        2. config vm synced folder to:
```
".", "/vagrant", :group => "www-data", :mount_options => ['dmode=775', 'fmode=644']
```
Save and exit Vagrantfile
```
$ vagrant up
$ vagrant ssh
```
Check for and install updates
```
$ sudo apt-get update -y
$ sudo apt-get upgrade -y
```
Install apache2, set up linking for external folder
```
$ sudo apt-get install apache2
$ sudo rm -rf /var/www/html
$ sudo ln -fs /vagrant /var/www/html
```
Install MySQL (sets password as 'secret')
```
$ sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password secret'
$ sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password secret'
$ sudo apt-get -y install mysql-server
```
Install PHP
```
$ sudo apt-get install -y php7.0 libapache2-mod-php7.0 php7.0-curl php7.0-cli php7.0-dev php7.0-gd php7.0-intl php7.0-mcrypt php7.0-json php7.0-mysql php7.0-opcache php7.0-bcmath php7.0-mbstring php7.0-soap php7.0-xml php7.0-zip -y
```
Restart Apache, updates again, then exit
```
$ sudo service apache2 restart
$ sudo apt-get update -y
$ sudo apt-get upgrade -y
$ exit
```
Create index.php
```
$ touch index.php
```
Add some code! (using nano or your editor of preference)
```
$ nano index.php
```
Save and then test in your browser at 192.168.33.10

Now create a database to use in our class (password will be 'secret', when asked)
```
echo "create database testdb" | mysql -u root -p
```
