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
define( 'DB_NAME', 'ASe5t678s3_blog' );

/** MySQL database username */
define( 'DB_USER', 'ASe5t678s3_blo' );

/** MySQL database password */
define( 'DB_PASSWORD', 'HuMJQnnnqi' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'tzx(GTiu0dd+4I=9+,ZZvg-/C/tyygM#f~VOwr59<S87{^+3Jw6UU-vT#-lQ-+yf');
define('SECURE_AUTH_KEY',  '*GJ@tajG;z</ZCm+682ZE0rMm8tei!ZDkd#5%yOq+E<R.W:<|aCRQ0v=55Osd@Bp');
define('LOGGED_IN_KEY',    '>AmGBYM_R31ru@pFu0zPiG/}rdE~z,?KO)L>V el}hxxoapV1@NMx:$K8: 1$z)?');
define('NONCE_KEY',        'sW-EbU@fmj<NVb&;F0JN[&(}n~?mJ2-Vm7f9=]Z9l-jn(O>f;/y+EkKBcR]&u~H2');
define('AUTH_SALT',        '-H+]pAn+=_,MtwX~tK48!*QN(x 88,Au{Wr2*j8oTaThv5/l%9U%u89amMU|jJ(!');
define('SECURE_AUTH_SALT', '2!-iZbZ$VsD.F^mC+TCk<t-)n-+vI-9[]DVJpiRy#+p}GzS`;*w}+HJy=C@|[|9C');
define('LOGGED_IN_SALT',   ' lV /+)I%bBZ)p`%}Da1A#B)Pt1_~2V#A<;2L~Q5Nf1E1<wx9c FPx|N?}6.sCJ*');
define('NONCE_SALT',       '>7hl`,0a&@{j`gI!hm6&:=GHW7Xe!NI,t?<eNm|5VSrT!>EHCweIl,eXt{N@:!*2');

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
