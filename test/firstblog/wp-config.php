<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'firstblog');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'IDDAPcYb');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'h-Q &`4<F9Sb<Jy|LQ4>Ij#nUH$I+4#PsHow<-%8++?B`*W|R*Yw6+4zuu;B:p$;');
define('SECURE_AUTH_KEY',  '!,Yw0[@^8 4d)-/,:+bJNeLzp64_1U|/f~%Ax/c-ZMnbx`XS[78ndh!W|W+x<H38');
define('LOGGED_IN_KEY',    '#nV-t|~M86`#T?(qdSN:1?(p2};_ Nx./E8rzv3s-2TNqi5y S`)QcSAOuZQd^?a');
define('NONCE_KEY',        'WiZ|25U46$#wY4Cn7I3l.e%GTk>-m0IVrYbGnRV]=pluC-q` V+`4g)T;OI,{DP3');
define('AUTH_SALT',        'sm?0sUR#7Y<~~{Q<voR]Dw`J({-M0{t%/ -|#sdjM+(Z~nX]Mj|{3o^)Q^yv^n0Q');
define('SECURE_AUTH_SALT', '~t5q?)Ar,zlX6PXZC#1|:@g:RZLWN6<[||fX&lO?3%wn7s<Du,,O~|p~0S?$R@$@');
define('LOGGED_IN_SALT',   'yko2>e1V$bV?[Hfh`:nCA;~:AieTqMl1+EZyPAJR<D4F+Da=D<}`cM-l> N<|*8!');
define('NONCE_SALT',       '9|z/ZV6tf9WsHw%/-tdEZD*zfo9lhg?Vl2VX-Oep^b7tq?kLZ4&#tIgt0yO]w>-e');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
