@extends('layout')
@section('content')
<script src="{{URL::to('js/bundle.js')}}" type="text/javascript"></script>
<!-- temp -->
<link rel="stylesheet" type="text/css" href="{{URL::to('css/addstyle.css')}}">

<button type="button">Add a Listing</button>
<div id="popup">
    <div id="main">
        <h1>Add a Listing</h1>
        <form>
            <input id="auto" type="button" value="add by isbn">
            <br>
            <label>Title:</label><br>
            <input class="fillField" id="title" type="text">
            <br>
            <label>Author:</label><br>
            <input class="fillField" id="author" type="text">
            <br>
            <label>Description:</label><br>
            <textarea maxlength="500" class="fillField" id="desc"></textarea>
            <br>
            <label>Publish Date:</label><br>
            <input class="fillField" id="pubDate" type="text">
            <br>
            <label>Price:</label><br>
            <input id="price" type="text">
            <br>
            <label>Image:</label><br>
            <img id="thumbnail" src="">
        </form>

    </div>
</div>
@stop