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
define( 'DB_NAME', 'wp_kbharkiv' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'b66uY4GVAg8Ij#%T;S:Q61wEQp@lD0T4~{-)lHhqwQOohG9Cs+71yZ.w7npW.q.r' );
define( 'SECURE_AUTH_KEY',  'l4^[a;.Fotc8x@L>6b0H7w(*YDl[cJ-:a<xOc*W??}Vzhnf3yn[;GM?XAyGc_IL&' );
define( 'LOGGED_IN_KEY',    '+IygXf&nf/?YWC(HdTg,f4*v _SvTCKwjn`nR{HyRJd_sx$M{|Si2.6rK|t*^Sp]' );
define( 'NONCE_KEY',        '|6HK0[Ffe+sP&ZFl?tA{ScJX:Zv%5V}9!4q@{_Y:LdJ7{EAn_iquWhrdfp|*;6`[' );
define( 'AUTH_SALT',        ']>s<3^?T[v52}fJOv@+ h)1a2R&Fh;Rb &[~UJ5z0+Q`z>hvf_{dPT %q,}/Xg|5' );
define( 'SECURE_AUTH_SALT', 'R^Qf^wq!cvO|0^EL[MctEc/Ex=wvfk}4c=7zlLD,AdYE!v}=!1hc{1lQ3m%;RwBP' );
define( 'LOGGED_IN_SALT',   'j3uFcyNu3-@Emeg`Q;X`AwB~)C6QY{_:`gW`4c3EG;!pi?ALP)Z2,_nE@/c+Wk;r' );
define( 'NONCE_SALT',       '(USy*y(N&Y>~HR4Ao+@>LWw0o11g }&^buW$uk&OndIY)rf+^#[NMcz%sCKBF7xC' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
