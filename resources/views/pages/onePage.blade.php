@extends('master')

@section('test_content')

    <span><a href="../table">Back to ages List</a></span><br>



<br>
@foreach($notes as $notex)
<div class="row list-group-item page-title-list">
    <div class="col-xs-8">
        {{$notex->text}}
    </div>
    <div class="col-xs-4">
        <a class="btn btn-danger pull-right" href="/table/{{$notex->id}}/note-del">Delete</a>
        <a class="btn btn-default pull-right" href="../notes/{{$notex->id}}/edit">Edit</a>
    </div>
</div>

@endforeach

    <div class="row list-group-item">
        <form method="POST" action="{{$page->id}}/receiveNote">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="newNote" value="{{ old('newNote') }}"  class="form-control" placeholder="Add Note . . .">
                <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Add</button>
                </span>
            </div>
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