@extends('layouts.pretty')
@section('content')

	<h1>{{ $listing->name}}</h1>
	<h2>${{ $listing->price }}</h2>
	<strong>{{ $listing->edition }} Edition</strong>
	<p>{{ $listing->description }}</p>
	<p>{{ $listing->condition}}</p>

@stop

