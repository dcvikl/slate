<?php
/** @var string Directory containing all of the site's files */
$root_dir = dirname(__DIR__);
/** @var string Document Root */
$webroot_dir = $root_dir . '/wordpress';
/**
 * Expose global env() function from oscarotero/env
 */
Env::init();
/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL', 'DOMAIN_CURRENT_SITE']);
}
/**
 * Set up our global environment constant and load its config first
 * Default: development
 */
define('WP_ENV', env('WP_ENV') ?: 'development');
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if (file_exists($env_config)) {
    require_once $env_config;
}
/**
 * URLs
 */
define('WP_HOME', env('WP_HOME'));
define('WP_SITEURL', env('WP_SITEURL'));
/**
 * DB settings
 */
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = env('DB_PREFIX') ?: 'pb_';
/**
 * Authentication Unique Keys and Salts
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));
/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', env('DISABLE_WP_CRON') ?: false);
define('DISALLOW_FILE_EDIT', true);
define('FORCE_SSL_ADMIN', true);
define('WP_DEFAULT_THEME', 'pressbooks-book');
/**
 * Pressbooks
 */
define('PB_PRINCE_COMMAND', '/usr/bin/prince');
define('PB_KINDLEGEN_COMMAND', '/opt/kindlegen/kindlegen');
define('PB_EPUBCHECK_COMMAND', '/usr/bin/java -jar /opt/epubcheck-3.0.1/epubcheck-3.0.1.jar' );
define('PB_XMLLINT_COMMAND', '/usr/bin/xmllint');
/**
 * Postmark
 */
if ( env('POSTMARK_API_KEY') && env('POSTMARK_SENDER_ADDRESS') ) {
    define('POSTMARK_API_KEY', env('POSTMARK_API_KEY'));
    define('POSTMARK_SENDER_ADDRESS', env('POSTMARK_SENDER_ADDRESS'));
}
/**
 * Stripe
 */
if ( env('STRIPE_SK') && env('STRIPE_PK') ) {
    $GLOBALS['PB_SECRET_SAUCE']['STRIPE_SK'] = env('STRIPE_SK');
    $GLOBALS['PB_SECRET_SAUCE']['STRIPE_PK'] = env('STRIPE_PK');
}
/**
 * Memcached
 */
global $memcached_servers;
$memcached_servers = array(
    'default' => array(
        '127.0.0.1:11211',
    )
);
define( 'WP_CACHE', true );
define( 'WP_CACHE_KEY_SALT', env('WP_CACHE_KEY_SALT') );
/**
 * Multisite
 */
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', env('DOMAIN_CURRENT_SITE') );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );/* That's all, stop editing! Happy blogging. */
/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir);
}
