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
define( 'DB_NAME', 'commerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'O?6oO9d#N3WvA T/]@`|(Z?LZ! B<uT[IzTA`h|0H&ASrx9sBs+@]::M&eylV5M1' );
define( 'SECURE_AUTH_KEY',  'x!{GJuX|Tz<Rkyai-U^mCU^7*2~Vinh*Gw^6ROb^dBgt3+:Z8DI=W_&9u|R<G3& ' );
define( 'LOGGED_IN_KEY',    '/kuUZB,B:~9p)_>=;ELPOnZp;S0 nhdZEqgNEsWmK:FN?JqK.-I0#m#8$PzPfCO>' );
define( 'NONCE_KEY',        '|PKSPZcPx`u*kH78~nv+Xr=*ql8?,0rd_Vsd<a8 ;zmejZ4Yfy26nHxHtz?k:?QH' );
define( 'AUTH_SALT',        'x0YQ*>#2FC9J)`JMiFS_E=JaGe+`R{.wOc2m/Vei#}~Jw2epZ+(sOl+9=%uknE}g' );
define( 'SECURE_AUTH_SALT', ',wBSDs},M<l}UeKGnKmJ;lLinr?f*(<Qz)Cw!I/4z&fymP]%ZN67pfaHW>%_Xpa;' );
define( 'LOGGED_IN_SALT',   'BpDGC2y0(_S`BJeYBf3V<o0RVqUK_(t>a;##K/-Hzi:A`Xr<Bn$==3#uE/IITuyu' );
define( 'NONCE_SALT',       'OPRkySbF&w[:=]+YsNT1A*K|d%3mmkyiR.Y?)4SQ30zX2%oRjzGk!Ymu_gCZZ(?3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cm_';

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
