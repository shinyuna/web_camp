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
define('DB_NAME', 'web20170626');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'MYPASSWORD123');

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
define('AUTH_KEY',         'C?F=VrOVWp0.L~9S[K,ntWNQ#~>=[I}nRCGx$T&`9[s]L-?sL49oB%Q3`Q|G,+oM');
define('SECURE_AUTH_KEY',  ')Y4dg9{/l5i5.d)z<PXV6=|IJOeYyp8=`_r&M;g}_OJeAR~ $((;<Y]4N+GbXNO&');
define('LOGGED_IN_KEY',    '&WvCmYyn<q6wy@k51EmyJP,2;vjG^!C!#1?MMa/tY3iXZd5sQ#-`7X{/`e6loZyd');
define('NONCE_KEY',        'aj+Ou?TMsgt]k&t1K|y6qz4T}Y+H^G;yZQy31$+gr(E-E;E)H[Zg_48.)+fffqL ');
define('AUTH_SALT',        '*#KxZYubmLt7R;8M;jAg7ts`=jvxjxPGBBrae(}1j@%8}78Ui?R$]FxjU>y4+T:n');
define('SECURE_AUTH_SALT', 'rR(sm;D;k;%Mc*3ax,3,!!c)Md]Jl6%qOAYcun7?V{Mz&{.x9yOk|6{u]a?c/E0G');
define('LOGGED_IN_SALT',   '5v>6Gc[2%Kt5BPcCz4l]T}t6&oh30&]c5R+b!B;w?tQG##9(L@wtR;4-@oR{!yi|');
define('NONCE_SALT',       'TJVHR8$K/qg+bo}QL&0J{6#P>%|2RlU}n!.Z=v+z EA@j!~b}Z&0(,bBhn?PiBPh');

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
