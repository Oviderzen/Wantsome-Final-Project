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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpadmin' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define('AUTH_KEY',         'q[Y7 ;KMhjKh `,(+?doNh;L+++SvN11,`;(.0&f%cQCYy3P?/Six6| G@pkz!F+');
define('SECURE_AUTH_KEY',  '&82T_5-^P%1[,Y%5 XU|_]}YH6<WWu[nY{W&{XY$i|];T%<6K(-sl@[HS<@#+OhB');
define('LOGGED_IN_KEY',    '2.||X}=Y!I0W/1&z+n=t?NId4%>Yej!>cs|me_[C+/OLV#H_}w} )P3%AEi|maYM');
define('NONCE_KEY',        'Ql1+549nm+LC=Pu,Bg&CUsZkxX0-s@#guGBjw,mYzrXZ${t}L;?h^PRmL)-TBgH^');
define('AUTH_SALT',        'ab^&vNAcJd=GY1U_`[9}Dk9q?68|UZu2I{{:duU0tEg*(hQD{nk%9>NjTflqn-%v');
define('SECURE_AUTH_SALT', '&i*%AYOz#u(F&t~E-s?+A/h2jHqBoMzejkVZA]_1hLeaNU%(H+v3w.,)S`CH:@k8');
define('LOGGED_IN_SALT',   'E7fv7buMJ.?#y=JW&~4r(U}_1^|C`veb+|4H1D~=xlitdl+4yY|xD.-2+7<I|-+i');
define('NONCE_SALT',       'Sw8lDjAk/Hl*#%J_M%d|6({*s8ssVogB<>V$tl`y^N7,_}=+Bu,0IB*!gJ-N3vAn');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
