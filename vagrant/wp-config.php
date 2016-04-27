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
define('DB_NAME', 'vagrant');

/** MySQL database username */
define('DB_USER', 'vagrant');

/** MySQL database password */
define('DB_PASSWORD', 'vagrant');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

function url_origin( $s, $use_forwarded_host = false )
{
	$ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
	$sp       = strtolower( $s['SERVER_PROTOCOL'] );
	$protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
	$port     = $s['SERVER_PORT'];
	$port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
	$host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
	$host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;

	return $protocol . '://' . $host;
}

define('WP_CONTENT_DIR', __DIR__.'/../wp-content' );
define('WP_CONTENT_URL', url_origin( $_SERVER ) . '/wp-content');
define('WP_PLUGIN_DIR', __DIR__.'/../wp-content/plugins' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<@ Cu=LHjtz*?h v-c-gt}pC#)=pW}Q.|n>Kr/ZdzRda!c8`Y.Gq% [n]X#y<avG');
define('SECURE_AUTH_KEY',  'J:/&+/uZA_In-|H.^slFsOnQchyeAWA*/(QP,o4HAL|In]Qt|T5N-YId<>E,nyw)');
define('LOGGED_IN_KEY',    'T([I-D3,`f,F!^o%8R[!>EmxN- O!A42+dEp7|]U=+vD1b|>.A7{~1|`2xw{s@A%');
define('NONCE_KEY',        'id%`kz|5kt#fbpXjEPO4Z+shx6u|7IFf}&x.H&T|BH+.~pK%/@FlJyKhiiovMPXW');
define('AUTH_SALT',        'mFVZ=|*h)<70p:W]|Pt,w|P8!QtyZp(/!<+~ ^H^c<HacU@5J(3o.*i9`|49$.S)');
define('SECURE_AUTH_SALT', 'dRk-k %%LpH+E>T*J]ut$NDsR@!`h1Js[l!1d.fPL_)Gx0Wp&IiqQc=(G-fz2w+;');
define('LOGGED_IN_SALT',   '=~M% Sr&>[:f|B0[qUhcg /6Ns1l)0b2^XB8T^/&Hb> +,Dd3^@M0xn2p`BhS8X$');
define('NONCE_SALT',       'A`zsMAwwI{.9RX&fyRW4^PZ;5?o-rcj(1VWwzWh-t-pVBki_F3M;+%i+&Oa5sN !');

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
