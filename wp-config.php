<?php
// define('AUTOMATIC_UPDATER_DISABLED', true);
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'live_bpssu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '$ytp?I9DpSsKNKyiG%}yn%EnGSKZR7!b7Wj2Uz3QFJgbC;xhzCJe>2W6)1Kd_vi#' );
define( 'SECURE_AUTH_KEY',  '/h]eZpWu9P6[;+= ~PGQ+Bz&rZ,cg1awYdkBu0gL~dxLzma|@MZ_#X>Jh5UZpj>c' );
define( 'LOGGED_IN_KEY',    'N.B(w$ZLG^@U@NgoMKG&:I?23y08Fn8Z`Dqg|J0!hDf(0,VZ/X{TDMzhGuejDNgL' );
define( 'NONCE_KEY',        '/o.V1-4=1-=r:krnn-iB0<n|1%2YuK-4Z]|LJo2QyU.s)fJ}9&C5GxjZ/ed}J_[@' );
define( 'AUTH_SALT',        ',XkliYFW6?L`2;gR jb:)6jw}XO`k3Y*Lc9Niq+ESRe$$ K+8{?E3l|6nItHoiXE' );
define( 'SECURE_AUTH_SALT', 'K*:, z^,oI&|_wYSjC%fsH)twpZ;PdN m}5 LH2A_}-E)@@[=1:>P!nT%P9d#I.-' );
define( 'LOGGED_IN_SALT',   'm F(.a!3Dr<3%{RAy9JHBM?;|>Gqgp6-PJXww:s5P#skSKxgaT*.f9Is@n;,vS8.' );
define( 'NONCE_SALT',       ' K`Nap %xI}H4R0Q.:j}htFrP:ryWC-U[^15W{EEb7;*%#RDeH=uy2ImWgr^|Ve9' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
// define('DISALLOW_FILE_EDIT', true);
// define('DISALLOW_FILE_MODS', true);