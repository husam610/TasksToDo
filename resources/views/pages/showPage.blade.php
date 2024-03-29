@extends('master')

@section('test_content')

    <span><b>Pages List</b></span>r
<br>
@foreach ($varPage as $tp)
    <a href="table/{{$tp->id}}">
        <div style="height:75px" class="row list-group-item page-title-list">
            <div class="col-xs-8">
                @if($tp->url)
                    <img style="width:50px" class="img-circle" src="up_load/{{$tp->url}}" >
                @endif
                {{ $tp->title }}
            </div>
            <div class="col-xs-4">
                <div><a href="{{ $tp->id }}/del" class="btn btn-danger pull-right">Delete</a> </div>
            </div>
        </div>
    </a>
@endforeach


    <div class="row list-group-item">
        <form method="POST" action="receivePage" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group">                
                <input type="text" name="title" value="{{ old('title')}}" class="form-control" placeholder="Add Page . . .">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Add</button>
                </span>
            </div>
            <br>
            <label for="imag">add image</label>
            <input id="imag" type="file" name="url">
        </form>
    </div>
    @if(count($errors))
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif

@stop