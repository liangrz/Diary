apache
---
#### 安装   
在http://www.apache.org/dist/httpd/ 找合适自己的版本    
$ wget http://www.apache.org/dist/httpd/httpd-2.4.25.tar.gz  
$ tar -zxvf httpd-2.4.25.tar.gz  
$ cd httpd-2.4.25  
$ ./configure --prefix=/usr/local/apache --enable-module=so   
$ make && make install   
#### 如果你的系统十分干净，可能会遇到apr not found问题，参考本章问题集锦  
  
#### 配置默认Web站点
apache默认的Web站点目录是 '/usr/local/apache/htdocs'  
如果需要修改站点目录，可以在'/usr/local/apache/conf/httpd.conf'中  
寻找DocumentRoot "xxx"（:/DocumentRoot）,下一行是\<Directory "xxx"\>  
把里面的xxx改成你想要的目录（例如"/home/www"）  
重启，ok

httpd: Could not reliably determine the server's fully qualified domain name,using 172.xx.x.xx.Set the 'ServerName directive globally to suppress this message

mysql
--
$ yum install mysql mysql-server  
$ /etc/init.d/mysqld start  
 
php
--
$ yum install php php-devel  
restart apache   
$/etc/init.d/httpd restart  
此时可以在目录：/var/www/html/下建立一个PHP文件  
代码：  
<?php phpinfo(); ?>  
然后访问，有详细信息就代表安装完毕  
 
安装php的扩展  
yum install php-mysql php-gd php-imap php-ldap php-odbc php-pear php-xml php-xmlrpc  
安装完扩展之后需要再次重启apache    
/etc/init.d/httpd restart  
 
问题集锦
-- 
1、配置./configure ARP not found  
 

Test mysql
--
\<?php  
$con = mysql_connect("10.0.@.@@","@@","@@");  
if (!$con)  
	{  
		die('Could not connect: ' . mysql_error());  
	}   
   
mysql_select_db("mydb", $con);  
   
$result = mysql_query("SELECT * FROM sys_user");  
   
while($row = mysql_fetch_array($result))  
	{  
		echo $row['UserName'] . " " . $row['PassWord'] . " " . $row['id'];  
	}  
   
mysql_close($con);  
\?>
