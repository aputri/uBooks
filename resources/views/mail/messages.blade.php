@extends('layouts.pretty')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">

                        @if(!empty($books))
                            @foreach($books as $b)
                                <hr/> <a href="{{URL::to('messages/' . $b->listingId) }}">{{ $b->name }} </a>
                                <hr/>
                            @endforeach
                        @else
                            <p>You have no messages at the moment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection