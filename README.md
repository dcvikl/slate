# Slate

1. `git clone git@github.com:pressbooks/slate.git /home/subdomain`
2. `cd /home/subdomain && composer install`
3. Copy values from `/home/<subdomain>/wordpress/wp-config.php` into `/home/<subdomain>/.env.example`.
4. `mv /home/subdomain/.env.example /home/subdomain/.env`
5. `mv /home/subdomain/wp-config.php.example /home/subdomain/wp-config.php && mv /home/subdomain/wordpress/wp-config.php /home/subdomain/wordpress/wp-config.php.old`
