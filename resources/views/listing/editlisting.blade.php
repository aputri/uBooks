@extends('layouts.pretty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="caption">
                            <form action = "{{ URL::to('/edit/' . collect(request()->segments())->last()) }}" method = "post">
                                <img src="{{$listing->imageLink}}">
                                <h3 class="pull-right" style="color:#5bc6c5">$<input type = "text" name = "price" value = "{{ $listing->price }}"></h3>
                                <h3><input name = "name" style = "width: 100%;" type = "text" value = "{{ $listing->name}}"></h3>
                                <p>
                                    <strong>Edition: <input name = "edition" type = "text" value = "{{$listing->edition}}"></strong>
                                <h4>Condition: <input name = "condition" type = "text" value = "{{ $listing->condition}}"></h4>
                                </p>
                                <p><textarea style = "width: 100%;" rows = "10" name = "description">{{ $listing->description }}</textarea></p>
                                @if(Auth::User())
                                    <div class="btn-toolbar">
                                        <button class = "btn-sm btn-primary pull-right">Edit Listing</button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

