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
define('DB_NAME', 'youparty_com_ve');

/** MySQL database username */
define('DB_USER', 'youpartycomve');

/** MySQL database password */
define('DB_PASSWORD', 'GJdc4VuK');

/** MySQL hostname */
define('DB_HOST', 'mysql.youparty.com.ve');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oh8Aog^gBa7ND:9tPz2~yd_~7:7dYBQ$EHI+o(bFavhu:ycS:ES@c:9k;/~b4Nyw');
define('SECURE_AUTH_KEY',  'L/x#KYs&;2GQ*+R"VxCWLc/NG^F!|Ptv7@He3;aZ)ruEo9N:)s!Q)IxYe&(*Gl2&');
define('LOGGED_IN_KEY',    'qWmDU#VOcBriE7vkw?TC#35Sc3e!IaA7DP%6SH7In6(;Y~dd2^#1U5Azv$$&*H+D');
define('NONCE_KEY',        'GXT&G3j*2GyIn~exQv$7d*U$_Y@$#bt(7BmTyRUfeOcbOuf4&2SU)`MQa|yqHn`#');
define('AUTH_SALT',        '*p*_l+)foxnaC@QD$S2hjPlb2h5t(3l#t5#o!Q%_oX^u5(W4$M):j01HRhOWuY|M');
define('SECURE_AUTH_SALT', 'nziMjOP9hLh%k/|/+teTtL_~;09aKknSmQTAIn;b;MD(7)U8A+Acz"?qyV1J08ZB');
define('LOGGED_IN_SALT',   'O?$kqG?5(`(pD!A?VtC54rdsf`^S5cmyrft0bFiG*YrmJLUZ#Yin@ABhj"XE25bG');
define('NONCE_SALT',       'c^VrBWpe5X&8:(V_;X7)9qe?Rhr0JI"n16WLOVO4oZnIs;1M$1(`br9Ai~dxUVU$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_23jzxc_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

