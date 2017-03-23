@extends('layouts.app')

@section('content')

    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <div class = "panel">
                    <div class = "panel-body">
                        @foreach($messages as $m)
                            <hr/>
                            <p><b>{{ $m->name }} says</b>: {{ $m->message }}</p>
                            <hr />
                        @endforeach
                        <form method = "post" action = "{{ URL::to('/messages/' . Request::segment(2) . '/add') }}" >
                            <div class="form-group">
                                <label class="control-label">Message </label>
                                <textarea name = "msg" class="form-control" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection