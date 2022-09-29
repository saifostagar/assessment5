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
define( 'DB_NAME', 'assessment5' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'Admin@123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '0K?[R8#&c7>RSZL/Ds-DQ7[I0>G+lL3-]?[f?Q< W+-C@o-*TJP$+9j1#ol=*/pv');
define('SECURE_AUTH_KEY',  '!cHAfaDA0|;&p3zzx(YvCH*p?XiW-7V{.;{kKjX(OYG&B ,zI;[~1:}|kL|< c}$');
define('LOGGED_IN_KEY',    '~pe%!;Ap{(?Ec|gO+B0w92-FueZ;/@&p+S0n#g-Q_R.);/U,!.D1CsLEaR-hlLO>');
define('NONCE_KEY',        'TtAO<;xH8%liELrHu-rY~F-eEJ@T;_E,1-7h!r2OI 9;$[$UMN:dA!Z0=pbC0dhL');
define('AUTH_SALT',        'w+]Zz4e(D}&b%W^V1)#-bnJ%j>/&!i]#r[N^}2eUbC&VM-4R6?=hA:PF0,C}p]G_');
define('SECURE_AUTH_SALT', '>5J3<yV<+eV/K98%g+-d!eq)wm~8id$~n@UZu1Fc7]rA}Yn3@376{f=y?6mzZIp-');
define('LOGGED_IN_SALT',   'nzZMl<-vGL`JcrA!PW&VvS*5nRG.K:>E&={hJwIvF[<r/sK7==zbeGCtyrx?<9N8');
define('NONCE_SALT',       '/5ZA+fgoZ6:re/Gf-;OZ_Db^=}I+j>TW/VNcX#e7k|2hV.|+cVE7#-Wc2V)#m+54');
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
define( 'FS_METHOD', 'direct' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
define( 'UPLOADS', 'wp-content/uploads' );
require_once ABSPATH . 'wp-settings.php';
