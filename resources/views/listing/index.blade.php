@extends('layouts.pretty')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">Order has been placed</div>
                @endif
                <b>uBooks: books for u</b><br>
                <form action="{{action('ListingController@showCategoryOnly')}}">
                    <select name="categories">
                        <option value="0">All Subjects</option>
                        <option value="1">Biology</option>
                        <option value="2">Business</option>
                        <option value="3">Computer Science</option>
                        <option value="4">Education</option>
                        <option value="5">English</option>
                        <option value="6">Engineering</option>
                        <option value="7">Human Kinetics</option>
                        <option value="8">Mathematics</option>
                        <option value="9">Physics</option>
                    </select>
                    <button type="submit">Submit</button>
                </form>

                @if(Auth::User())
                    <br>
                    <a>
                        <button id="add">Create New Listing</button>
                    </a>
                    <br>
                @endif
                <br>
                <table class="col-md-12 table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Edition</th>
                        <th>Condition</th>
                        <th>Price</th>
                        <th>Retail Price</th>
                    </tr>
                    @foreach ($booklistings as $listing)
                        <tr>
                            <td><a href="listing/{{ $listing->id }}" class="rowlink">
                                    {{ $listing->name }}
                                </a></td>
                            <td>
                                {{ $listing->edition }}
                            </td>
                            <td>
                                {{ $listing->condition }}
                            </td>
                            <td>
                                {{ $listing->price }}
                            </td>
                            <td>
                                @if($listing->retailPrice==-1)
                                    N/A
                                @else
                                    {{ $listing->retailPrice }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <script src="{{URL::to('js/bundle.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/addstyle.css')}}">
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">x</span>
            <h1>Add a Listing</h1>

            {{ Form::open(['method' => 'post', 'url' => 'done', 'files'=>'true'])}}
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
            {{ Form::hidden('imageLink',null, ['id'=>'imageLink', 'class'=>'fillField'])}}
            {{ Form::file('image', null ) }}
            <br><br>
            <input type="submit" value="Post Now">

            {{ Form::close() }}
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