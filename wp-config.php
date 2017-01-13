<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
switch ($_SERVER['HTTP_HOST']) {
	case '':
	case '':
	case '':
		define('DB_NAME', '');
		define('DB_USER', '');
		define('DB_PASSWORD', '');
		break;	
	case '':
	case '':
		define('DB_NAME', '');
		define('DB_USER', '');
		define('DB_PASSWORD', '');
		break;
	case '':
	case '':
		define('DB_NAME', '');
		define('DB_USER', '');
		define('DB_PASSWORD', '');
		break;
	default:
		define('DB_NAME', '');
		define('DB_USER', '');
		define('DB_PASSWORD', '');
}
/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'z+Gb_$VA6uN}q1Aq[:0DPDZT;9|1d1!E50E KM.$`aTDfW<e5$itP~<*xFO[s~R9');
define('SECURE_AUTH_KEY',  'BqXR%&n5i$!=zYS{-42kf?*w?G>~7/sJQlTFw8u>{S}sfwP61d&%`wkuk5^FtJlS');
define('LOGGED_IN_KEY',    'f^<;hmE6fy/=N?s?uNR#CM#$i|fCOp}e7a^a-0+=b%hU40q6ByU^,<^,LEQLmix*');
define('NONCE_KEY',        'rL8{0Fb#+8MZ+! 7Aa)/>+|,|FHoodXVod)$aUMG2[Gg)?{+lsw`jx%b,NC+Z/.?');
define('AUTH_SALT',        'ADP4Z_]<au&;Au<*2apPt_S (ZJT=cEEPf|_}}^6Ky7GUIECI5s3@q+S6ig:MeE#');
define('SECURE_AUTH_SALT', 'x?k:DW,Q%Az]$,=/Ww|h<s#ZZ6Ng.8+j-N[@3,SVehzHgG#h%d(U$7U22d,|Z `c');
define('LOGGED_IN_SALT',   'RDP~FpC~|.G98R|#~JSgbl+@y%.sNKHx9!&D>-hX0))IzE#ZjvNH->3<PuhcW;pj');
define('NONCE_SALT',       '(A$H|[qEKT$_1-W}DbC5[ob(g}_IbY~@.V=e=!baS,zA-]z,x/ XH:CDeoS{|<gJ');

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