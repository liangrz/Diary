<?php
#php-mysql-此处没有i
#format
$link = @mysql_connect(string $ip,string $uname,string $pwd);//因为是老方法需要加@
$rs = mysql_select_db(string $database,$link);
mysql_set_charset(string $charset);//字符编码，可以是别的
$d_sql = "drop table if exists table_name";
$c_sql = "create table if not exists table_name(id int(5))";
$i_sql = "insert into `table` ";
if(!mysql_query($d_sql)||
	!mysql_query($c_sql)||
	!mysql_query($i_sql)){
		echo 'falied';
}

$s_sql = "select * from table order by id desc";
$result = mysql_query($s_sql);//$result为结果集、
while( $tmp = mysql_fetch_array($result , MYSQL_ASSOC )){
	$value = $tmp['name']
}
?>
<?php
/mysql_fetch_array(resource $result [,int $result_type]);
//result_type: MYSQL_BOTH  同时产生关联和数字数组（默认）
//				MYSQL_ASSOC  关联数组
//				MYSQL_NUM  数字数组
?>
<?php
//instance
$link = @mysql_connect('localhost','root','');
$rs = mysql_select_db('test',$link);
mysql_set_charset('uft8');
$d_sql = "drop table if exists lyb";
$c_sql = "create table if not exists lyb (
	id int(11) not null auto_increment comment 'id',
	phone varchar(15) not null comment '电话号码',
	content varchar(200) not null comment '留言内容',
	create_time int not null comment '创建时间',
	primary key(id)
	)engine = 'MyISAM' default character set utf8" ;

if(!mysql_query($d_sql)||
	!mysql_query($c_sql)){
		echo 'falied';
}
if($_POST){
	$time = time();
	$i_sql = "INSERT INTO `test`.`lyb` ( `phone`, `content`, `create_time`) VALUES ( '{$_POST['phone']}', '{$_POST['content']}', {$time})";
	if(mysql_query($i_sql)){
		echo 'falied';
	}
}

$s_sql = "select * from lyb order by id desc";
$result = mysql_query($s_sql);
while( $tmp = mysql_fetch_array($result , MYSQL_ASSOC)){
	foreach($tmp as $k=>$v){
		echo "{$k} is {$v}";
	}
}
//插入的字符串需要在外加引号，声名他们是字符串
?>
