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

#### 测试
输入你的网址，看看是否出现test123

mysql
--
#### 为什么要这么搞
centos7 yum没有mysql-server,so       
#### 添加mysql到库       
##### 下载 
https://dev.mysql.com/downloads/repo/yum/       
例如下载的是mysql57-community-release-el7-{version-number}.noarch.rpm      
$ sudo yum localinstall mysql57-community-release-el7-{version-number}.noarch.rpm       
##### 检查是否添加成功    
$ yum repolist enabled | grep "mysql.*-community.*"        
如果出现一列表，应该成功了    
#### 安装    
$ yum install mysql-community-server    
#### 测试    
$ service mysqld start    
//Starting mysqld:[ OK ]       
$ service mysqld status       
//mysqld (pid 3066) is running.       
出现斜杠内容就代表成功      
#### 最后密码      
安装mysql的时候，系统随机创了一个密码，我们需要这个密码来开启mysql       
##### 查找     
$ grep 'temporary password' /var/log/mysqld.log    
A temporary password is generated for root@localhost: _ZTqgGhKe6as        
_ZTqgGhKe6as就是密码     
##### 登录
$ mysql -uroot -p     
mysql>_ZTqgGhKe6as    
mysql> ALTER USER 'root'@'localhost' IDENTIFIED BY 'MyNewPass4!';    
ok        
这里提示一下，安装这个mysql自带了一个validate_password插件，用来检查密码是否满足一个大写字母，小写字母，一个数字，一个特殊字符以上四项，且至少8位密码，所以你设置新密码的时候会可能说你的密码不满足要求。按以上要求修改就可以了

##### 参考
https://dev.mysql.com/doc/refman/5.7/en/linux-installation-yum-repo.html
    
php
--
$ yum install php php-devel  
$ httpd restart  //restart apache    
此时可以在目录：/var/www/html/下建立一个PHP文件     
代码：    
\<?php phpinfo(); ?>  
然后访问，有详细信息就代表安装完毕     
 
#### 安装php的扩展  
yum install php-mysql php-gd php-imap php-ldap php-odbc php-pear php-xml php-xmlrpc      
安装完扩展之后需要再次重启apache       
/etc/init.d/httpd restart      

//问题集锦
//-- 
//1、配置./configure ARP not found
