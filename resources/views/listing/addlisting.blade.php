@extends('layouts.pretty')
@section('content')
    <script src="{{URL::to('js/bundle.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/addstyle.css')}}">
    <button id="add">Add a Listing</button>
    <div id="main">
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">x</span>
                <h1>Add a Listing</h1>

                {{ Form::open(['method' => 'get', 'url' => 'done'])}}
                {{ Form::label('isbn', 'ISBN:')}}
                {{ Form::text('isbn')}}

                <input id="auto" type="button" value="add by isbn">
                <br>
                {{ Form::label('title', 'Title:')}}
                {{ Form::text('title', null, ['class'=>'fillField'])}}
                {{ Form::label('author', 'Author:')}}
                {{ Form::text('author', null,['class'=>'fillField'])}}

                {{ Form::label('description', 'Description:')}}<br>
                {{ Form::textarea('description',null, ['class'=>'fillField']) }}
                <br>
                {{ Form::label('edition', 'Edition:')}}<br>
                {{ Form::text('edition',null, ['class'=>'fillField']) }}
                <br>
                {{ Form::label('price', 'Set a price:')}}
                {{ Form::text('price', null,['placeholder'=>'$'])}}
                {{ Form::label('condition', 'Condition of the book:')}}
                {{ Form::text('condition', null,['placeholder'=>'Ex: Good'])}}
                {{ Form::hidden('volumeId', null, ['id'=>'volume']) }}
                <br>
                <label>Image:</label><br>
                <img id="thumbnail" src="">
                <br><br>
                <input type="submit" value="Post Now">

                {{ Form::close() }}
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop