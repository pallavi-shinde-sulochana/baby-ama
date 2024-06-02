ALTER USER 'root'@'localhost' IDENTIFIED BY 'sugDB#222';


SET PASSWORD FOR root@'localhost' = PASSWORD('sugDB#222');

ALTER USER 'root'@'localhost' IDENTIFIED BY 'sugDB#222';

ALTER USER  'root'@'localhost' IDENTIFIED BY 'sugDB#222';
ALTER USER  'root'@'localhost' IDENTIFIED BY 'sugDB#222';

use mysql;
CREATE USER 'suguna'@'localhost' IDENTIFIED BY 'sugDB#222';
GRANT ALL ON *.* TO 'suguna'@'localhost';
flush privileges;

CREATE USER 'newuser1'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Password@123';
GRANT ALL ON *.* TO 'newuser1'@'localhost';

Problem 1
    - Installation request for phpoffice/phpspreadsheet 1.18.0 -> satisfiable by phpoffice/phpspreadsheet[1.18.0].
    - phpoffice/phpspreadsheet 1.18.0 requires ext-dom * -> the requested PHP extension dom is missing from your system.
  Problem 2
    - Installation request for spatie/laravel-backup 6.16.5 -> satisfiable by spatie/laravel-backup[6.16.5].
    - spatie/laravel-backup 6.16.5 requires ext-zip ^1.14.0 -> the requested PHP extension zip is missing from your system.
  Problem 3
    - Installation request for tijsverkoyen/css-to-inline-styles 2.2.3 -> satisfiable by tijsverkoyen/css-to-inline-styles[2.2.3].
    - tijsverkoyen/css-to-inline-styles 2.2.3 requires ext-dom * -> the requested PHP extension dom is missing from your system.
  Problem 4
    - Installation request for phar-io/manifest 2.0.1 -> satisfiable by phar-io/manifest[2.0.1].
    - phar-io/manifest 2.0.1 requires ext-dom * -> the requested PHP extension dom is missing from your system.
  Problem 5
    - Installation request for phpunit/php-code-coverage 9.2.6 -> satisfiable by phpunit/php-code-coverage[9.2.6].
    - phpunit/php-code-coverage 9.2.6 requires ext-dom * -> the requested PHP extension dom is missing from your system.
  Problem 6
    - Installation request for phpunit/phpunit 9.5.5 -> satisfiable by phpunit/phpunit[9.5.5].
    - phpunit/phpunit 9.5.5 requires ext-dom * -> the requested PHP extension dom is missing from your system.
  Problem 7
    - Installation request for theseer/tokenizer 1.2.0 -> satisfiable by theseer/tokenizer[1.2.0].
    - theseer/tokenizer 1.2.0 requires ext-dom * -> the requested PHP extension dom is missing from your system.
  Problem 8
    - tijsverkoyen/css-to-inline-styles 2.2.3 requires ext-dom * -> the requested PHP extension dom is missing from your system.
    - laravel/framework v8.47.0 requires tijsverkoyen/css-to-inline-styles ^2.2.2 -> satisfiable by tijsverkoyen/css-to-inline-styles[2.2.3].
    - Installation request for laravel/framework v8.47.0 -> satisfiable by laravel/framework[v8.47.0]

    sudo apt-get install php-gd
curl -sL https://deb.nodesource.com/setup_14.x | bash -


000-default.conf 
<VirtualHost *:80>
	# The ServerName directive sets the request scheme, hostname and port that
	# the server uses to identify itself. This is used when creating
	# redirection URLs. In the context of virtual hosts, the ServerName
	# specifies what hostname must appear in the request's Host: header to
	# match this virtual host. For the default virtual host (this file) this
	# value is not decisive as it is used as a last resort host regardless.
	# However, you must set it for any further virtual host explicitly.
	#ServerName www.example.com

	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/html

	# Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
	# error, crit, alert, emerg.
	# It is also possible to configure the loglevel for particular
	# modules, e.g.
	#LogLevel info ssl:warn

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined

	# For most configuration files from conf-available/, which are
	# enabled or disabled at a global level, it is possible to
	# include a line for only one particular virtual host. For example the
	# following line enables the CGI configuration for this host only
	# after it has been globally disabled with "a2disconf".
	#Include conf-available/serve-cgi-bin.conf
</VirtualHost>

