配置git服务器
--
纯命令，不详细讲<br>
服务器上<br>
```
$ cd /root
$ mkdir test
$ git init
$ touch README.md
$ git add README.md
$ git commit -m 'f'
```
你的电脑
```
$ ssh-keygen  //如果没有私钥
$ cd ~/.ssh
$ vim id_rsa.pub //把上面的全部东西CTRL+Insert复制下来
```
服务器上
```
$ cd /root/.ssh
$ vim authorized_keys //Ctrl+Insert黏贴
```
你的电脑
```
$ git clone root@109.144.123.1:/root/test/.git //@后面为服务器id
```
End
