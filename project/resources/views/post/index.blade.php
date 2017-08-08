@extends("layout.main")

@section("content")
    <div class="col-sm-8 blog-main">
        <div>
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($slides as $slideC)
                    <li data-target="#carousel-example" data-slide-to="{{$slideC->id}}" class="@if($slideC->id == 1)active @endif"></li>
                    @endforeach
                </ol><!-- Wrapper for slides -->
                <div class="carousel-inner">
                   @foreach($slides as $slide)
                    <div class="item @if($slide->id == 1)active @endif">
                        <a href="{{$slide->link}}"><img src="{{$slide->url}}" style="width: 770px;height: 450px" alt="..." /></a>
                        <div class="carousel-caption">...</div>
                    </div>
                    @endforeach

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>        <div style="height: 20px;">
        </div>
        <div>
            @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="/user/{{$post->user->id}}">{{$post->user->name}}</a></p>

                <p>{!! str_limit($post->content, 100, '...') !!}</p>
                <p class="blog-post-meta">赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}</p>
            </div>
            @endforeach

             {{$posts->links()}}

        </div><!-- /.blog-main -->
    </div>
@endsection


