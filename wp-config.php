<?php
/**
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Setting MySQL ** //
/** Database Name MySQL */

define('DB_NAME', 'vnmzdj5z6abu1nu5');

/** Database Username */
define('DB_USER', 'c4c9l4ib2rsg43z0');

/** Database Password */
define('DB_PASSWORD', 'qycrjch75atqt93v');

/** Database Hostname */
define('DB_HOST', 'h1use0ulyws4lqr1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DB_PORT', '3306');
	
/** Database Charset */
define('DB_CHARSET', 'utf8');

/** Database Collate */
define('DB_COLLATE', '');

/**#@+
 * Secret-Key Service
 *
 * Using
 * {@Link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's`3Ci}QiWLsgm^@9gz++-teV;+0FcvfL.Zg|@+N~4Qfm.==>mglP2#;oS]@9jKSk');
define('SECURE_AUTH_KEY',  'u;LivYc+MLN[+wGPK>Oh.9sngf+,Q(]B-WRi7#46dPE}Y00d2Kn*$4[iZ#}U]32f');
define('LOGGED_IN_KEY',    'VJ0v~$~8FJev^@mzIo~fE;J%*^be~]|Oqt|Q+o|!?-6=P/U9`7$6gEz<_8.+0/3|');
define('NONCE_KEY',        '[Is%$pwv}**ssur;DCr!R3r3T[AJZQ%|<tl[YO-c?g5ZVJXa,C4LTSahg>7lc}r|');
define('AUTH_SALT',        '^ksU~>/Q.i:`&--xeBp}M;mvF)8+Mg395o%tE,!(kS>>+VqNs!FFG)&o|m+01I$A');
define('SECURE_AUTH_SALT', ')`g*9=NCN1[L(q]=mbY,C.u}`^|:~<4;-x%5hnVp9Af*QLQG@~+:PR1P5cbS$AG>');
define('LOGGED_IN_SALT',   ',5|E_GSel5& =0D7OD55h74}zc*+Q%w|2cI)n_+,/WoQh:4DzFoHP]Ap_*G}Vbq.');
define('NONCE_SALT',       '+(ZMCARV>i@rC0@~*h)!cTjy@vp}8I,$/Ls8|5T|VnrXn5<M)/wGyOJT5?a6j*NN');

define('JWT_AUTH_SECRET_KEY', 'xiEDGfBC>bq)BBsliphGd/`(YS7lr!#SVZT6EOw)|-YM_kOoSHgY&h..z`rB^}=3');

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
require_once(ABSPATH . 'wp-custom-api.php');