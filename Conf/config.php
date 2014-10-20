<?php
return array(
	//'配置项'=>'配置值'
	'authkey' => 'fuckhack',
	'LANG_AUTO_DETECT' => FALSE, //关闭语言的自动检测，如果你是多语言可以开启
    'LANG_SWITCH_ON' => TRUE, //开启语言包功能，这个必须开启
    'DEFAULT_LANG' => 'zh-cn', //zh-cn文件夹名字 /lang/zh-cn/common.php
	'URL_MODEL' => 0,
	
    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => '112.124.46.98', // 服务器地址
    'DB_NAME'               => 'checkin',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => 'Gjh19910726',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => '',    // 数据库表前缀
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
	
	/*远程公共文件设置*/
	'S_JS' => 'http://static.lougacai.com/js/',
	'S_CSS' => 'http://static.lougacai.com/style/',
	'S_IMG' => 'http://static.lougacai.com/image/',
	'S_ADMINSTYLE' => 'http://static.lougacai.com/admin/',
	
	/*又拍云空间账号*/
	'IMGSPACE' => 'mobiledp',
	'IMGUSER' => 'yachtxiao',
	'IMGPWD' => 'guanjiahao',
	'IMGURL' => 'http://img.lougacai.com',
	
);
?>