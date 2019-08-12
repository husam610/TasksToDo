@extends('master')

@section('test_content')

    <span>Edit Note</span><br>


        <div class="row list-group-item">
            <form method="POST" action="update">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" value="{{$note-> text}}" name="editNote" class="form-control">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Edit</button>
                    <a class="btn btn-danger" href="../../table/{{$note->page_id}}">cansel</a>
                    </span>
                </div>
            </form>
        </div>
@stop