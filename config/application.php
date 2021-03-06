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
    $dotenv->required([
        'DB_NAME',
        'DB_USER',
        'DB_PASSWORD',
        'DOMAIN_CURRENT_SITE',
        'WP_CACHE_KEY_SALT'
    ]);
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
 * DB Settings
 */
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = env('DB_PREFIX') ?: 'wp_';
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
if ( env('EMPTY_TRASH_DAYS') ) {
    define('EMPTY_TRASH_DAYS', env('EMPTY_TRASH_DAYS'));
}
define('FORCE_SSL_ADMIN', true);
if ( env('WP_DEFAULT_THEME') ) {
    define('WP_DEFAULT_THEME', env('WP_DEFAULT_THEME'));
}
if ( env('WP_POST_REVISIONS') ) {
    define('WP_POST_REVISIONS', env('WP_POST_REVISIONS'));
}
/**
 * Pressbooks Settings
 */
define('PB_PRINCE_COMMAND', '/usr/bin/prince');
define('PB_KINDLEGEN_COMMAND', '/opt/kindlegen/kindlegen');
define('PB_EPUBCHECK_COMMAND', '/usr/bin/java -jar /opt/epubcheck/epubcheck.jar' );
define('PB_XMLLINT_COMMAND', '/usr/bin/xmllint');
if ( env('PB_BOOK_THEME') ) {
    define('PB_BOOK_THEME', env('PB_BOOK_THEME'));
}
if ( env('PB_HIDE_COVER_PROMO') ) {
    define('PB_HIDE_COVER_PROMO', env('PB_HIDE_COVER_PROMO'));
}
if ( env('PB_PDF_PROFILE') ) {
    define('PB_PDF_PROFILE', env('PB_PDF_PROFILE'));
}
if ( env('PB_PDF_OUTPUT_INTENT') ) {
    define('PB_PDF_OUTPUT_INTENT', env('PB_PDF_OUTPUT_INTENT'));
}
if ( file_exists( $webroot_dir . '/wp-content/themes/private-themes.php' ) ) {
    require_once( $webroot_dir . '/wp-content/themes/private-themes.php' );
} else {
    $privatethemes = [];
}
$GLOBALS['PB_SECRET_SAUCE']['BOOK_THEMES'] = $privatethemes;
/**
 * Postmark API
 */
if ( env('POSTMARK_API_KEY') && env('POSTMARK_SENDER_ADDRESS') ) {
    define('POSTMARK_API_KEY', env('POSTMARK_API_KEY'));
    define('POSTMARK_SENDER_ADDRESS', env('POSTMARK_SENDER_ADDRESS'));
}
/**
 * Stripe API
 */
if (env('STRIPE_SK') && env('STRIPE_PK')) {
    define('STRIPE_SK', env('STRIPE_SK'));
    define('STRIPE_PK', env('STRIPE_PK'));
}
/**
 * WordPress.com API
 */
if (env('WPCOM_API_KEY')) {
    define('WPCOM_API_KEY', env('WPCOM_API_KEY'));
}
/**
 * WPMU DEV API
 */
if (env('WPMUDEV_APIKEY')) {
    define('WPMUDEV_APIKEY', env('WPMUDEV_APIKEY'));
}
/**
 * Memcached
 */
global $memcached_servers;
$memcached_servers = array(
    'default' => ['127.0.0.1:11211']
);
define('WP_CACHE', true);
define('WP_CACHE_KEY_SALT', env('WP_CACHE_KEY_SALT'));
/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir);
}
