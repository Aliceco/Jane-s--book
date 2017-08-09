先把数据库配置好（把SQL文件弄好）
后台管理员：
admin  123456
前台用户：
1633004849@qq.com  123456
搜索功能需要你开启（elasticsearch-rtf-master目录里面的bin里面的elasticsearch.bat）挂在后台
不然有些ajax交互功能你是用不了的
开启队列 (使用通知)
php artisan queue:work
等于你要开启两个后台进程（elasticsearch.bat，php artisan queue:work）
运行建议使用（php artisan serve）运行
