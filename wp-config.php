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
define( 'DB_NAME', 'weather' );

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
define( 'AUTH_KEY',         '1{],tzg`>`R`H@l7I^@dx@G[CBICz:)|YkCwcHwIy0X({4eWK5Q>{bc(ZOZ7gy.d' );
define( 'SECURE_AUTH_KEY',  '0V:8b;!]yorVfvFNiG{=#`?nq^@=MAh`Rbe_^j^q==AI|il,V/?(2D/gxmbu)3,s' );
define( 'LOGGED_IN_KEY',    '5%D&#*r_4X@)v8*P2cDL*oA:(_hYuqUD;a%s!$N1kg)RFs7sP_Wh`8u1F/ZBor!l' );
define( 'NONCE_KEY',        '7T!v(HYlet*wr./%f+GLvilx)=B2VBq4yQl[E%8RQQ%|4g+zJ7s7NXmxe]hPJZHp' );
define( 'AUTH_SALT',        'c|k&lH*5<1zDnLO?-?b_)4[?4vM2{V!;j01eJU~d=yYVicsXkVmsp#6JO~TpLsLR' );
define( 'SECURE_AUTH_SALT', '2)+(f-16ER~F%MB},[oBsw!uBvEP{87&r >!HZ|&=A9Em=u?,Y?P{ye$rb,!~&.u' );
define( 'LOGGED_IN_SALT',   '9qKL00ECxTl7WiC]tFg&>ND[isci9uglQlvWH:-^*:|;@NPIhl#=r.rh_%6{*W3]' );
define( 'NONCE_SALT',       'U&%b0ZrcP,9=gV_59ZN16^A*[U4W|2B8u22iyVs?70ZsViPDOXsgvCW_4Pq%&=Oe' );

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
