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
define('DB_NAME', 'wplearn');

/** MySQL database username */
define('DB_USER', 'wplearn');

/** MySQL database password */
define('DB_PASSWORD', 'wplearn');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'eDVte&95<o%CcWVk];0{k+.Z%j _t9@I#0gQgogoh1X:n/?Z(BV%tF51rr=w-+dv');
define('SECURE_AUTH_KEY',  '^VW7qBU?=XUBs*t&RS-`aJ9`d,Vu+1:wpm0DD!V.!oDSrz 5R21N_0gD{{Tj`D}r');
define('LOGGED_IN_KEY',    'w bUguJ`.JFkavlbWe6T9fVXBL7[Ta?MJD o+RkUP+h:{NEp/UBX<%Y$nE8Y+z|h');
define('NONCE_KEY',        '55ji=i.P8[U{PjWbin<xEWG:yFi`po}/|qeT,W1K2i0IVO&Ad>jbY xo<PG5g29s');
define('AUTH_SALT',        '%Q~P#rrVCKIETA2~eF):w{dq!{?Fcx^r,q?#fO@$!F}@p{Z4.w5<RgH{Z3hajqx%');
define('SECURE_AUTH_SALT', 'D=&hrK(b)SL5VZrUs.SOk71HK=fQimnfcbWt[+zAV#9E3{=?Y%b0mY2NDHd.ao #');
define('LOGGED_IN_SALT',   '`?VoA4.(r]U%zi 2lDc^.#rFJ:4;Ox5bD~Y3vL|XD?,!n%lHdrw^zj2(T.a5CoB?');
define('NONCE_SALT',       '=_HBS56]C$Coec}kGgU=3=rsO3(`MviJmt%L4?,qJ>d?frLqp,Nr.$ntxK+}yBzQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
