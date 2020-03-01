<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rhodeislDBbv2vy');

/** MySQL database username */
define( 'DB_USER', 'rhodeislDBbv2vy');

/** MySQL database password */
define( 'DB_PASSWORD', 'Gdj2DLXi1D');

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '15:K8swo!-~~w[_|ZOlphkdh-sw8CZNRRGdVZ:!|C18C4NGJ@s[}|!-@4[dgZskov');
define( 'SECURE_AUTH_KEY', 'A3QEI$q<{^<{*6A3imfy$uqum^.$MEIbTXbTXqimA;2PEEI6TXP*.+2{;2]EHAq');
define( 'LOGGED_IN_KEY', 'mi6{;LA<]*6A;imex+tqum*.+LEHaTXaTWpim6;2LDHD6AXLP.x+2#]2#DH5pti~_');
define( 'NONCE_KEY', 'TTLeXb{.<A26A26PHL*tx;.#<+*6]eiXtxmtxl_#*PSLeiaWaTmpi2];H9DH9DWOS');
define( 'AUTH_SALT', 'xPDaeWaSptl5:1OD1#:1#DG5ptl~_-w-t#]_SKOhadhZdwpsG58VKOOCGdSW[~59:');
define( 'SECURE_AUTH_SALT', '|0GJgVcgYrkoB0NRJJCZRz>UNkc0>B,@,$3fczrr$vJBYQYbUrj7{IBBF7UM^v{,');
define( 'LOGGED_IN_SALT', 'IfXUMQjbf<{I7BI6AXMQ.y$3<{{^7A3nbf$qy$q<{.TXPimfbTXqjm62MEILEH');
define( 'NONCE_SALT', 'uqA26PHLLAEbPT<+*6{x+q<]*TWLimaaeTqum6A2LPHLPHaeW#*_6;22#]H69ti*.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
