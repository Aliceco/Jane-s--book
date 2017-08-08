@extends("admin.layout.main")
@section("content")
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">专题列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/topics/create" >增加专题</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>专题名称</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($topic as $topics)
                                <tr>
                                    <td>{{$topics->id}}</td>
                                    <td>{{$topics->name}}</td>
                                    <td>
                                        <button type="button" delete-value="{{$topics->name}}" class="btn btn-default resource-delete" topic_id="{{$topics->id}}" delete-url="/admin/topics/{{$topics->id}}" >删除</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody></table>
                        </div>
                        {{$topic->links()}}
                    </div>
                </div>
            </div>
        </section>
@endsection

