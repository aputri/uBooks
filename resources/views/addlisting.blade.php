@extends('layout')
@section('content')
    <script src="{{URL::to('js/bundle.js')}}" type="text/javascript"></script>
    <!-- temp -->
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/addstyle.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <button >Add a Listing</button>
        <div id="main">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">x</span>
                    <h1>Add a Listing</h1>
                    <form action="done" method="get">
                        <label>ISBN: </label><br>
                        <input id="isbn" name="isbn" type="text">
                        <br>
                        <input id="auto" type="button" value="add by isbn">
                        <br>
                        <label>Title: </label><br>
                        <input class="fillField" id="title" name="title" type="text">
                        <br>
                        <label>Author:</label><br>
                        <input class="fillField" id="author" type="text">
                        <br>
                        <label>Description:</label><br>
                        <textarea maxlength="500" class="fillField" id="desc"></textarea>
                        <br>
                        <label>Edition</label><br>
                        <input id="ed" name="edition" type="text">
                        <br>
                        <label>Publish Date:</label><br>
                        <input class="fillField" id="pubDate" type="text">
                        <br>
                        <label>Price:</label><br>
                        <input id="price" type="text">
                        <br>
                        <label>Image:</label><br>
                        <img id="thumbnail" src="">
                        <input type="submit" value="Post Now">

                    </form>
                </div>
            </div>
    </div>
@stop