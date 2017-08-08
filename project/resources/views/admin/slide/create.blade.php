@extends("admin.layout.main")
@section("content")
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-10 col-xs-6">
    <form class="form-horizontal" action="/admin/slide/addStatus" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">幻灯片描述</label>
            <div class="col-sm-10">
                <input class="form-control" name="describe" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">幻灯片</label>
            <div class="col-sm-2">
                <input class=" file-loading preview_input" type="file" value="用户名" style="width:150px" name="avatar">
                <img  class="preview_img" src="" alt="" class="img-rounded" style="border-radius:500px;">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章对应的链接</label>
            <div class="col-sm-10">
                <input class="form-control" name="link" type="text">
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
        </div>
    </form>
                @include('layout.error')
            </div>
        </div>
</section>
 <!-- /.content -->
@endsection