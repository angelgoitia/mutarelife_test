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
define( 'DB_NAME', 'wp_mutarelife' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'Q_n,!.sh,CU6gw+G2d}4^j>%8>0Y2 ywEa =J[ubHl1zbQ$m Wqd(DQzi]<^Hi~N' );
define( 'SECURE_AUTH_KEY',  '>q6BtKzF($NS*gyc$h+:Nnl{KT;B-n[m)))i08l.+pZx,[e4bjEBQi$jeMJ22y.?' );
define( 'LOGGED_IN_KEY',    '_,!EWI{bk]x!e0rrM{nN,zbhaE3f`7>Dkc_y1<9G0`Vt3{GKN0ch8g2c9)CGhtm5' );
define( 'NONCE_KEY',        'pbM~ sKj;3>fc)V`..{P :8(A)h&jN@XGq.(FKC)x&)S  Li9{gRdqS2cWe5jYmt' );
define( 'AUTH_SALT',        'vguozWwGXixPR_W]H^=t@$W=`J%jRf<qq2=1)^*`&tL(t|FF1W-2?6@C{Xj9.B82' );
define( 'SECURE_AUTH_SALT', ' W^[_&63+U!TvFP7,P?0VjnfgAaoE6j6&An1-^M{MeB<u!A2i%Gmy>DIE0k6a0%;' );
define( 'LOGGED_IN_SALT',   'ed!jp7j,r<w#/>7^pJI*eO[7%i>Fp9F>(_o}=ION:].SVb`ZXa`Y^Ya&?:)]pB`,' );
define( 'NONCE_SALT',       '(67^[KPpE;NxggWlUwex-v ?nVP*Ml;G6_d,a>CH*(@qF;)?-8djTS7tpDzgR-7O' );

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
