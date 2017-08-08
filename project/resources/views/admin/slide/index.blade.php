@extends("admin.layout.main")
@section("content")
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">幻灯片列表</h3>
                    </div>
                    <a type="button" class="btn " href="/admin/slide/create">增加幻灯片</a>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>幻灯片</th>
                                <th>幻灯片描述</th>
                                <th>文章对应的链接</th>
                                <th>操作</th>
                            </tr>
                               @foreach($slide as $slides)
                                <tr>
                                    <td>{{$slides->id}}.</td>
                                    <td><img src="{{$slides->url}}" style="width: 350px;height: 250px" alt=""></td>
                                    <td>{{$slides->describe}}</td>
                                    <td>{{$slides->link}}</td>
                                    <td>
                                        <a type="button"  class="btn btn-default"   href="/admin/slide/{{$slides->id}}/update" >修改</a>
                                        <button type="button" delete-value="{{$slides->describe}}" class="btn  btn-default slide-delete" slide-id="{{$slides->id}}" post-action-status="-1" >删除</button>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody></table>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
