@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $errer)
            <li>{{$errer}}</li>
        @endforeach
    </div>
@endif