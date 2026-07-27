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
define( 'DB_PASSWORD', '1db2345' );

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
define( 'AUTH_KEY',          'tw)^yehNw5H;+hmsHqFJF.f,WaK/{7yZ|~{gHg~[Z%mpqz+$kcv_aYXIr50z~g-(' );
define( 'SECURE_AUTH_KEY',   '~f|zzO^.^nc6[a:@,KgA6H8cc;!}R[tb;&aaAhu?b0h.v&xR2{_SjDL!.byOEf@p' );
define( 'LOGGED_IN_KEY',     'o3R,QOqAb2~be@ZJP,[M`iL*e4aYU{wqg?z$=djJgUdJ+f%gQPyB9E@Uy#P7Z}LH' );
define( 'NONCE_KEY',         'csQ{D>0e}bx.r_rJ9:OnOG=//AX)hc5!SxsM8u`;9tczO{7 _<KeZIZ{`g(2i4t-' );
define( 'AUTH_SALT',         '}SIf}H3_:THhwcR1J3aO)&c:MZd;<X/Q}YD3CXys>rlVx)enbdg4l[r6Y&uvA^sx' );
define( 'SECURE_AUTH_SALT',  'Q7T%-5uKE5VHRGY%oq0bL6jf=vS>t#p:jH;b?MltlQ7Qd(XNT!KjiwM@3tv^;;C+' );
define( 'LOGGED_IN_SALT',    'WD}Toz!I%_jRiX?#X4gfcJ`23k^{;!N^} =$,j??=8Qp`qU^!m] W*5=K)Bov{6e' );
define( 'NONCE_SALT',        'pBFOqV*c3d=,D7=-zjky]kcAy0M02ksP}1$VczOw8`LNM=zPixFrvi<W}v?_wL3H' );
define( 'WP_CACHE_KEY_SALT', '#HGRTu5>ElQ6V@Qu0vw4@#.$O=Q`N*m9*y_FLAU= 7T6XA.eEj9Q-?}iXL8)q*Z~' );


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
