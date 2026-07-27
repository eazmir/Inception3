<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_db' );

/** Database username */
define( 'DB_USER', 'eazmir' );

/** Database password */
define( 'DB_PASSWORD', 'lx01' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '$s>?sBgZK$bT,[m%4cr.3OA&C7ueH< mDHtE,bAsWD?ZUW_WPW_Q{9Iw&VY}&[59' );
define( 'SECURE_AUTH_KEY',   'Wuvt-aI8iO,|S2! pkhh9cf*T1sq*o5D<{0u066ZUGuD|3Ve?C`iV pcZP~G5RXj' );
define( 'LOGGED_IN_KEY',     'PVJO;eM !<2-G#CX+7q;)&I_D]qwVQi.z$I jc?{oUU0cs:Acl`U{ ^6Ws[~ZHh|' );
define( 'NONCE_KEY',         't!ICPO7Loed&z5HSFGljduie{om)9;D;:<<EYz7$faLG>_|Ci,VUP*E6yR{(B?0c' );
define( 'AUTH_SALT',         'WHf&T/@+P5cDg~k6RKu$&2EV(:6dihym=Y,RIdS?{S#z#9|7]uoCI ViPst=`S!b' );
define( 'SECURE_AUTH_SALT',  '2ZwfJb7(m_{>u_kI.~#[&FHma2 Z-Mk7rh.Xj8z^Uk+xg #^Fd@}r=bL3!.4IXMC' );
define( 'LOGGED_IN_SALT',    '7v3Deeh! m0vjy.}~O#JL8?0C|!qc>8Y Tx[UP *`t-</8PD3_03jgptRX<vwtaE' );
define( 'NONCE_SALT',        'u^M%-TbVCyG=O a]EUXURw[J(=xzHFsKMb-1o%Qeb?T8>s+{C0O4?8P2F[qZ Qa*' );
define( 'WP_CACHE_KEY_SALT', 'Y_uD/f+QWbWCd?&!vFG9YzIE1qgoy6)<@H,H+-q=-^[sDQsf5DD6=,O.W*;lU5GO' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
