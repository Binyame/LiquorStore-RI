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
define( 'DB_NAME', 'rhodeislDBe060s');

/** MySQL database username */
define( 'DB_USER', 'rhodeislDBe060s');

/** MySQL database password */
define( 'DB_PASSWORD', 'TtbMGAldUD');

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
define( 'AUTH_KEY', 'WxcNJ|so80}cZR!@NGCsOK-wd85!dZ9[pVS_-w,^yIEyj3,^UFvrB7gcU,^nJF}r');
define( 'SECURE_AUTH_KEY', 'z4okd80[ZRKC~-skG8|hdVO[_oKC5:sldVUB3unjb7>^QIB$vnjF7>YQI,$zrMF');
define( 'LOGGED_IN_KEY', 'q;iX<*yPIA2uib6<$-shC5:!dVO|~wpG91[hZO[_-SKD5wldW1]~aOH9-thD5;_');
define( 'NONCE_KEY', 'X.TLA2uib6.+XME*ymf6<|-slC5:ldV:|~sOG5wphW1[~aSK9-tSK#-tlH5;peW');
define( 'AUTH_SALT', 'RzNC4}kcV0[@vRJ8zskZ4:!dVNG@wog81[I6<jbP{.$qME6qfX3{^yUME$unf7');
define( 'SECURE_AUTH_SALT', 'vCvkc8}|@ZNG!zskC4:kdVNibTL<*uPIA2ujbT<$XQIA$qjb7<^XQI^yrjE3{nf');
define( 'LOGGED_IN_SALT', 'N!0|}8Gksz!w@|JRZky*{PXfmXfmy6EMTEMX$.{3,7Ejqy^r$,IQXjUbjr7EM7F');
define( 'NONCE_SALT', ';m+#x.]Paipamt2AHTELX+.]6<;6Emu+my*<PXePbiq6I3AIQy*<8GOV~|:lw~#[');

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
