# Slate

## Converting an existing network

1. Clone: `git clone git@github.com:pressbooks/slate.git /home/subdomain`
2. Install dependencies: `cd /home/subdomain && composer install`
3. Copy values from `/home/<subdomain>/wordpress/wp-config.php` into `/home/<subdomain>/.env.example`
4. Rename `.env.example` and swap `wp-config.php` files:

```
mv /home/subdomain/.env.example /home/subdomain/.env
mv /home/subdomain/wp-config.php.example /home/subdomain/wp-config.php
mv /home/subdomain/wordpress/wp-config.php /home/subdomain/wordpress/wp-config.php.old
```

## Setting up a new network

TODO.
