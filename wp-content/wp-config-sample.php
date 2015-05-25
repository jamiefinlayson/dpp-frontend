<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dpp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
 

/*  
define('DB_USER', 'dpp');
 
define('DB_PASSWORD', 'i2LpOFGvzFDFWLaQBpis');
 
define('DB_HOST', 'db.eu-west-1.dpp-v3.c4ops.co.uk');
*/

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WK4S|^S(Hd `-[?+gI:&_=a5RM?msjs9kcrF9}B|~@V.ax?Ho]PXv[Boq+Gn+(c1');
define('SECURE_AUTH_KEY',  '/-;au^7&fD30wK=$p{3=J{NCU+5u uhy%LxvD/k;-2PMEkznX7bWwuau2X89FWJ%');
define('LOGGED_IN_KEY',    '+1%NbxzTVEme~AG|lk|c@HKP>x+FU|)8-XF6--doC-!HL|_@k,/7^|p_^$kWs!W@');
define('NONCE_KEY',        'Ml[EkA*nD~b{D`UiF,k%z1YN0~&pm,>hABO1Y(bG`fo5ZoXg)GHOD(+u+ 7Z|bht');
define('AUTH_SALT',        'Rlu,:-A++vlF!S({m`Ho+%+7<#%[sG+fq`z^Ucrz;K |low;K^gE%bYuw`p%GBu]');
define('SECURE_AUTH_SALT', 'BQp}p~UIfgt=ar04T)<NCcgLaxc*oJm#+20)[S3)`x 7D57*^I9Q&+tj>]IK{rcL');
define('LOGGED_IN_SALT',   'aB~yZ?!GC:na`fgk~2+Y<&Z#q7}~f<H}N]8y@PjF$_O98d-b],uUR;tS8U-%7-i-');
define('NONCE_SALT',       '<ER#(Ay,=}/4|cCdoo()df2M>Ti>x[Is]G/1&r+iytASVD4h|3 8ikr=e?yM-C;e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

