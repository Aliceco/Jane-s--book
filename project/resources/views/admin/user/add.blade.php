@extends("admin.layout.main")
@section("content")
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">添加用户</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="/admin/users/store" method="POST">
                               {{csrf_field()}}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">用户名</label>
                                        <input type="text" value="{{old('name')}}" class="form-control" placeholder="输入用户名" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">密码</label>
                                        <input type="password" value="{{old('password')}}" class="form-control" placeholder="输入密码" name="password">
                                        <label for="exampleInputPassword1">确认密码</label>
                                        <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" id="inputPassword" class="form-control" placeholder="请再次输入密码" required>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    @include("admin.layout.error")
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
