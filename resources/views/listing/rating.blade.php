@extends('layouts.pretty')

@section('content')

@if(Auth::User()->id == $buyer)
<div class = "container">
    <h3>Rate your experience for purchasing {{ $listing->name }}</h3>
    <form action = "{{ URL::to('/rating/' . collect(request()->segments())->last() . '/addrating') }}" method = "post">
        Rate your experience
        <select name = "rate">
            <option value = "1">1</option>
            <option value = "2">2</option>
            <option value = "3">3</option>
            <option value = "4">4</option>
            <option value = "5">5</option>
        </select>
        <input type = "submit" value = "Rate">
    </form>
</div>
@else

    You are not the user who bought this book.

@endif

@endsection
