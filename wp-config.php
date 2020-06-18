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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'gT6,GyE:4MV@mt1 jV9E11Uqn~fAeSy4!H|:bDZNqvJ.hW,t@2uv37 MleU)-%3<' );
define( 'SECURE_AUTH_KEY',  '?-2L?B&kH9t0[/u`jb}LU:(Y{et[P1Yilqj0^kg}.FnlK*xW2e;7h85x.2S}&h}y' );
define( 'LOGGED_IN_KEY',    'p+![+s#vUH$1kz,6Tk$=n,Bvj?[G~<0<*EV=@i6t|dm (;m!b~{/?,eJH1Pg@:s:' );
define( 'NONCE_KEY',        'O&Pj7,r,p2;q!r$CDP2dduz` 5R#]&B)hjrB$9or7R,Wvlo_SK)KqAkH+|A)9mU|' );
define( 'AUTH_SALT',        'knS}iNRZu64q=Wn$[z]YAU0GY;{GT %(EfdhaukJ^^j6cX%BcL#&:r0}McVA8cT~' );
define( 'SECURE_AUTH_SALT', '&t.`lb]j,gf3_:i Egs8~4)Pt#?=Ae;{I*;= Sez:_>XLgBMHV6VNH0HC1gPZR_8' );
define( 'LOGGED_IN_SALT',   'SH^3?><tKNG:$5yF2ED,fb<4qe6gsON[}f]5Vm#u%D/!_eW(gx&0:=JGHQgvtN#d' );
define( 'NONCE_SALT',       'JN/hFoTR3T/t3I6A14?pGO90<|JbFhWS?; cr]QCfCH!-:3T_*.eoV`%+v:_$tV[' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
