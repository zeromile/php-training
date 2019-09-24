# Enable PHP
In order to show errors in your php pages we have to enable that feature. In a production environment (when the site goes live) these should be disabled, but while we are developing our site it's helpful to know why our stuff is broke.

SSH into your running Vagrant box
```$ vagrant ssh```

Edit the ini file to enable ```error_reporting```. This is tricky..
 - ```$ sudo nano /etc/php/7.0/apache2/php.ini```
 - Search (CTRL-W) for ```error_reporting``` in the file...it will be the SECOND instance
 - Change the designation from ```Off``` to ```On```
 - Exit with save: ```CTRL-X```
 - Restart Apache:
   - ```$ sudo service apache2 restart```
