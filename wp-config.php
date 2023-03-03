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
define( 'DB_NAME', 'wp' );

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
define( 'AUTH_KEY',         'HI$R=yY0O5>}Yxt!3 DgkD>_X(|; ~*F4~@zC(/l.h~l[k!dYfKIdlA;Tv`#Yc<y' );
define( 'SECURE_AUTH_KEY',  ',R30#~6l&N7=4:NH=>X!d7_u4V7oHoKf[/0/Yy<jiA$3T3`>tHQ%05I0O[F6!Sg(' );
define( 'LOGGED_IN_KEY',    'Mf(3{i?(uCK9FW*?smKJ=$* tG~Lqwk?z4Jo^F:)YO|p%(o#-NeplNG r4^*tseP' );
define( 'NONCE_KEY',        'POd0D(*z9.|unxG4w<vG.rGE^BY.[BA[NK[>2S~~nq6To0.;r])Az@iy_.z JY4g' );
define( 'AUTH_SALT',        'N*KC~~^Hq$G{Z0Jh]*,bmJ*BE?nl&pX!-/^oSBu}Fvae(}~*@qCR]N^:gH7P2IMh' );
define( 'SECURE_AUTH_SALT', '?]>q+$9![wko,;b6?QLLax7;+s=:gxD1;Kbav<6|va}.p/P>Q&d}$gK*fq|50uE:' );
define( 'LOGGED_IN_SALT',   'W_EDXT`+rb[ORIQ817ry|:6XpUpK2bg_#&314#cPpsu~+N6+<%v2FBgd>}zdX{C<' );
define( 'NONCE_SALT',       '(D~&!=CbJ1HX+PTiNQM.x{4OPDi@DY-&PH0cab4&jth_A>sjKGK.Ca%n~$}4F![[' );

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
