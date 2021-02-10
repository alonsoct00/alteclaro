<?php
define( 'WP_CACHE', true );
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
//define( 'DB_NAME', 'bdd_alteclaro' );

define( 'DB_NAME', 'alteclar_testdbb' );


/** MySQL database username */
//define( 'DB_USER', 'dbadmin_alteclaro' );
define( 'DB_USER', 'alteclar_testqa' );

/** MySQL database password */
//define( 'DB_PASSWORD', 'dbpsswd-Alt3cl4R0' );
define( 'DB_PASSWORD', 'QQkgbku2Uw3Q' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
//define( 'DB_HOST', '127.0.0.1:3306' );

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
define( 'AUTH_KEY',         'UD^DM3R!M<AO(,,!)u(#dCgE8!JV^;6mccF;#!H=ujXq(wlxO_i(d?kA#j0>N+6w' );
define( 'SECURE_AUTH_KEY',  'GDmir@5W%`4m.^@t%{f8E_Q u@8.l9<ff#`u2,+Tkxh$QEx)M_WIoj-4chy4N;1~' );
define( 'LOGGED_IN_KEY',    ' ;N&<.9,/{.4=0`O=gHo6j@|0Csi~nHes8[rs_~x%GKz*3%zF(2yx,!+E0D@FL{Z' );
define( 'NONCE_KEY',        'pQbZ: u{OoKa^KYJ9;sZ )Og0ig4)q$>GE(`id$d~xU~/A|k$IH)M5|rTzJ0m%$>' );
define( 'AUTH_SALT',        '%_v.p8*L|y#3hFi+t$Y 5;erRW}y*MNUk0jX>8-S)+WAn@j<GkpC&on0;KK_uus%' );
define( 'SECURE_AUTH_SALT', '|Aoqg,fH46JAp*A#8W>wgA]$g7%L6,xreCb3nZyViS*{,&vqCcrye *,A5yT/qiG' );
define( 'LOGGED_IN_SALT',   '[(%y~>fW:y,?VVJIQt|J24+o)Q,u~ $c[,|[*VmkuEuldf^f- `_174xuE[:y|T7' );
define( 'NONCE_SALT',       'Zwi~{!:aN}a=rU-qWDg483<l{T2n;MZ&2ed<VAm$>TqwqRsCY{i zr_B0!|HT-P!' );

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
