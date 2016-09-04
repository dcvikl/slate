# Slate

## Converting an existing network

1. Initialize empty repository: `cd /home/<subdomain> && git init`
2. Add remote: `git remote add origin https://github.com/pressbooks/slate.git`
3. Fetch and checkout: `git fetch && git checkout -t origin/master`
4. Install dependencies: `composer install`
5. Copy values from `/home/<subdomain>/wordpress/wp-config.php` into `/home/<subdomain>/.env.example`, and copy the multisite configuration block (see first step [here](https://codex.wordpress.org/Create_A_Network#Step_4:_Enabling_the_Network)) from `/home/<subdomain>/wordpress/wp-config.php` into `/home/<subdomain>/wp-config.php.example`.
6. Rename `.env.example` and swap `wp-config.php` files:

```
mv /home/<subdomain>/.env.example /home/<subdomain>/.env
mv /home/<subdomain>/wp-config.php.example /home/<subdomain>/wp-config.php
mv /home/<subdomain>/wordpress/wp-config.php /home/<subdomain>/wordpress/wp-config.php.old
```

## Setting up a new network

TODO.
