@extends('layouts.pretty')
@section('title', 'All Listings')
@section('content')
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">Order has been placed</div>
        @endif
        @if(session('reported'))
            <div class="alert alert-success">Listing has been reported</div>
        @endif
        @if(Auth::User())
            <button class="bottom20 btn btn-info" id="add">
                <span class="fa fa-plus"></span>&nbsp;&nbsp;Create New Listing
            </button>
            <br>
        @endif
        <table class="col-md-12 table table-striped">
            <tr>
                <th>
                    @if (Route::getCurrentRoute()->getActionName() == 'App\Http\Controllers\SearchController@search')
                        @if ($sortby == 'name' && $order == 'asc')
                            {{ link_to_action('SearchController@search', 'Title &darr;', array( 'sortby' => 'name', 'order' => 'desc', 'searchReq' => $search), array('style' => 'color: black; text-decoration: none; ')) }}
                        @else
                            {{ link_to_action('SearchController@search','Title &uarr;', array('sortby' => 'name','order' => 'asc', 'searchReq' => $search), array('style' => 'color: black; text-decoration: none; ')) }}
                        @endif
                    @else
                        @if ($sortby == 'name' && $order == 'asc')
                            {{ link_to_action('ListingController@index', 'Title &darr;', array( 'sortby' => 'name', 'order' => 'desc'), array('style' => 'color: black; text-decoration: none; ')) }}
                        @else
                            {{ link_to_action('ListingController@index', 'Title &uarr;', array('sortby' => 'name','order' => 'asc'), array('style' => 'color: black; text-decoration: none; ')) }}
                        @endif
                    @endif

                </th>
                <th>Edition</th>
                <th>Condition</th>
                <th>
                    @if (Route::getCurrentRoute()->getActionName() == 'App\Http\Controllers\SearchController@search')
                        @if ($sortby == 'price' && $order == 'asc')
                            {{ link_to_action('SearchController@search', 'Price &darr;', array( 'sortby' => 'price', 'order' => 'desc', 'searchReq' => $search), array('style' => 'color: black; text-decoration: none; ')) }}
                        @else
                            {{ link_to_action('SearchController@search','Price &uarr;', array('sortby' => 'price','order' => 'asc', 'searchReq' => $search), array('style' => 'color: black; text-decoration: none; ')) }}
                        @endif
                    @else
                        @if ($sortby == 'price' && $order == 'asc')
                            {{ link_to_action('ListingController@index', 'Price &darr;', array( 'sortby' => 'price', 'order' => 'desc'), array('style' => 'color: black; text-decoration: none; ')) }}
                        @else
                            {{ link_to_action('ListingController@index','Price &uarr;', array('sortby' => 'price','order' => 'asc'), array('style' => 'color: black; text-decoration: none; ')) }}
                        @endif
                    @endif

                </th>
                <th>
                    @if (Route::getCurrentRoute()->getActionName() == 'App\Http\Controllers\SearchController@search')
                        @if ($sortby == 'created_at' && $order == 'asc')
                            {{ link_to_action('SearchController@search', 'Date &darr;', array( 'sortby' => 'created_at', 'order' => 'desc', 'searchReq' => $search), array('style' => 'color: black; text-decoration: none; ')) }}
                        @else
                            {{ link_to_action('SearchController@search','Date &uarr;', array('sortby' => 'created_at','order' => 'asc', 'searchReq' => $search), array('style' => 'color: black; text-decoration: none; ')) }}
                        @endif
                    @else
                        @if ($sortby == 'created_at' && $order == 'asc')
                            {{ link_to_action('ListingController@index', 'Date &darr;', array( 'sortby' => 'created_at', 'order' => 'desc'), array('style' => 'color: black; text-decoration: none; ')) }}
                        @else
                            {{ link_to_action('ListingController@index','Date &uarr;', array('sortby' => 'created_at','order' => 'asc'), array('style' => 'color: black; text-decoration: none; ')) }}
                        @endif
                    @endif
                </th>
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
                        @if($listing->del > 0)
                            <span style= "color:red; font-weight:bold">SOLD</span>
                        @else
                            {{ $listing->price }}
                        @endif
                    </td>
                    <td>
                        @if($listing->created_at == NULL)
                            N/A
                        @elseif(Carbon\Carbon::now()->diffinDays($listing->created_at) > 1)
                            {{ Carbon\Carbon::now()->diffinDays($listing->created_at) }} days ago
                        @elseif(Carbon\Carbon::now()->diffinDays($listing->created_at) == 1)
                            Yesterday
                        @else
                            Today
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <script src="{{URL::to('js/bundle.js')}}" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::to('css/addstyle.css')}}">
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">x</span>
            <h1>Add a Listing</h1>

            {{ Form::open(['method' => 'post', 'url' => 'store', 'files'=>'true', 'id' => 'listing'])}}
            {{ Form::label('isbn', 'ISBN:')}}
            {{ Form::text('isbn',null, ['data-toggle'=>'tooltip', 'data-placement'=>"right", 'title'=>"Click add by isbn to automatically fill out most of the fields"])}}

            <input id="auto" type="button" value="add by isbn">
            <br>
            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null, ['class'=>'fillField'])}}
            {{ Form::label('author', 'Author:')}}
            {{ Form::text('author', null,['class'=>'fillField'])}}
            {{ Form::label('subjects', 'Subject:') }}

            {{ Form::select('subjects', $subjects, null) }}<br>
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
            {{ Form::label('course', "What course was this textbook for?") }}
            {{ Form::text('courseInfo', null, ['placeholder'=>'Ex: COSC310'] ) }}
            <br>
            <input class="btn-success pull-right" type="submit" value="Post Now">

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
