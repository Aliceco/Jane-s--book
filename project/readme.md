这个是laravel5.4写出来的

App/Admin/下的是后台
App/htpp/下是前台的

数据库的表在 /database/migrations/目录下面

Publi/目录下面就是 css和js（admn.js是后台的，ylaravel是前台的）

/resources/views/下面是视图
Admin是后台的视图（里面也有Layout）
Layout是公共的模版

上传图片之后是保存在
/storage/app/public/目录下面

你使用的时候记得（自己去数据库添加管理员（前台可以注册），后台不行）
操作步骤去到数据库的admin_user表：
密码：明文（'123456'）$2y$10$g.eKpjpN0Eg245FZqCzK0.ma/oQJCjVjrQ0R8Ogjlj2VlHzK5XQDq（你也可以直接复制这个）
用户名: test
