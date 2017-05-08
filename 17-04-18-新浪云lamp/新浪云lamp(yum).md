apache
---
#### 安装   
$ yum install httpd    
一般yum安装后的文件在/etc目录下,如果找不到可以$ find / -name httpd.conf查找文件位置    
    
$ vim /etc/httpd/conf/httpd.conf    
把Listen 80换成Listen 5050 //可以用:/Listen查找
登录这个应用的新浪云应用域名看看是否apache的测试页面

#### 配置默认Web站点
yum安装apache默认的Web站点目录是 '/var/www'  
如果需要修改站点目录，可以在'httpd.conf'中  
寻找DocumentRoot "xxx"（:/DocumentRoot）,下一行是\<Directory "xxx"\>  
把里面的xxx改成你想要的目录（例如"/home/www"）  
重启，ok

mysql
--
centos7 yum没有mysql-server,so     
添加mysql到库     
下载 https://dev.mysql.com/downloads/repo/yum/
例如下载的是mysql57-community-release-el7-{version-number}.noarch.rpm   
$ sudo yum localinstall mysql57-community-release-el7-{version-number}.noarch.rpm
检查是否添加成功    
$ yum repolist enabled | grep "mysql.*-community.*"    
如果出现一列表，应该成功了    
安装    
$ yum install mysql-community-server
测试    
$ service mysqld start
//Starting mysqld:[ OK ]     
$ service mysqld status    
//mysqld (pid 3066) is running.    
出现斜杠内容就代表成功    
参考https://dev.mysql.com/doc/refman/5.7/en/linux-installation-yum-repo.html
 
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
