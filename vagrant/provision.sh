#!/bin/sh

date > /etc/vagrant_provisioned_at
service mysqld restart

/usr/bin/mysql -u root -e "DROP DATABASE IF EXISTS vagrant;"
mysqladmin -u root create vagrant
/usr/bin/mysql -u root -e "GRANT ALL PRIVILEGES ON * . * TO 'vagrant'@'%' IDENTIFIED BY 'vagrant';"
/usr/bin/mysql -u root -e "GRANT ALL PRIVILEGES ON * . * TO 'vagrant'@'localhost' IDENTIFIED BY 'vagrant';"

cp /vagrant/vagrant/httpd-start.conf /etc/init/httpd.conf -f
cp /vagrant/vagrant/httpd.conf /etc/httpd/conf/httpd.conf -f
cp /vagrant/vagrant/php.ini /etc/php.ini -f
cp /vagrant/vagrant/xdebug.ini /etc/php.d/xdebug.ini -f

## Add listeners to ensure the apache service is started after vagrant shares are mounted
cp "/vagrant/vagrant/mount.rules" "/etc/udev/rules.d/50-vagrant-mount.rules" -f

service httpd restart

cd /vagrant
