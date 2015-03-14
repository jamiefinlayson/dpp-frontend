<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

$host = $_SERVER['SERVER_NAME'] ;
 
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
echo ($host);
if ($host=='dpp-local') {
 
    define('WP_ENV', 'development');

    define('DB_NAME', 'mydb-dev');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_HOST', 'localhost');
} 

else if ($_SERVER['REMOTE_ADDR']=='dpp-dev.co.uk'){
    define('WP_ENV', 'production');

    define('DB_NAME', 'dppdevco_prod');
    define('DB_USER', 'dppdevco_prod');
    define('DB_PASSWORD', '._?B#f$LTKVT');
    define('DB_HOST', 'localhost');
}

else {
    define('WP_ENV', 'live');

    define('DB_NAME', 'dpp_dev');
    define('DB_USER', 'username');
    define('DB_PASSWORD', 'password');
    define('DB_HOST', 'localhost');
}

 
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/wordpress/');

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
define('WP_CONTENT_DIR', realpath(ABSPATH . '../wp-content/'));
define('WP_CONTENT_URL', WP_HOME . '/wp-content');
define('UPLOADS', '../uploads');

/* That's all, stop editing! Happy blogging. */

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');