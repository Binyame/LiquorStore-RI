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
define( 'DB_NAME', 'rhodeislDBifwqz');

/** MySQL database username */
define( 'DB_USER', 'rhodeislDBifwqz');

/** MySQL database password */
define( 'DB_PASSWORD', 'tvYbnTH06H');

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
define( 'AUTH_KEY', 'fjT<$*myI{63$<XIIU7nyfqXe;+.<;+HT62A<fIXEu+it*6_];+#S9LH]6mXWip');
define( 'SECURE_AUTH_KEY', 's14!:hOYJR!kv@k8!}:zN0CF[coVcnU,r@$jvB>0}4!R8JN7nUcnU>y,<yEQ77U');
define( 'LOGGED_IN_KEY', 'HG~lo-h1~|_p-G:99#1dKWdJV|ow@k4G[|1~OVCG:4kRdoRc}z@>vF}84@[ZFJV8o');
define( 'NONCE_KEY', ';HPaHxepiPa]x*.qAL29K1hOWaGS_plta]5_#t+L1DO5CsZdoV_:-wdp9_:1~OZCN');
define( 'AUTH_SALT', 'LemPXbipSa_]t++~#pxDH]15;6*_PW9DHP2DppZh5_#s~S99#WhOWDxdp~o4|[4!V');
define( 'SECURE_AUTH_SALT', 'm;9##1~O5HD;LWaHO~lw~l5[1|ZO1hWdlS~#t-|sC:8C:dJVR8o-loZ:w~|!8FN0g');
define( 'LOGGED_IN_SALT', 'GZGwdolS_[w-|sC[1C[4gNZcFR!okwd-!:@NFQ7nUnYz@k0C|>4!NYFMYFvbnY3,^');
define( 'NONCE_SALT', '<]aLSDt+heLW]+*p9]5#1dOVGw_hta:~#tD:CN4oVdN!so-h5|[wKVGRCscgrY>0@');

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
