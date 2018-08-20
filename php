-------------------migration------------------
安装源：	yum install epel-release -y 或 rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
安装源：	rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

注意：php高版本的yum源地址，有两部分，其中一部分是epel-release，另外一部分来自webtatic。如果跳过epel-release的话，安装webtatic的时候，会有错误爆出。

清理旧版本：	yum -y remove php*


安装PHP：	yum -y install php72w php72w-cli php72w-fpm php72w-common php72w-devel php72w-mysql 



--------------Configuration with Nginx---------

安全性配置：
		sudo vi /etc/php.ini
		cgi.fix_pathinfo=0   #移除注释并设置值为0

php-fpm配置：
		sudo vi /etc/php-fpm.d/www.conf
		listen = /var/run/php-fpm/php-fpm.sock #更改listen
		listen.owner = nobody	#去掉注释,用nobody提示没权限，改成nginx可用，风险未知
		listen.group = nobody	#去掉注释
		user = nginx		#更改为nginx
		group = nginx		#更改为nginx

运行PHP：	sudo systemctl start php-fpm  #systemctl stop php-fpm.service
开机启动：	sudo systemctl enable php-fpm

