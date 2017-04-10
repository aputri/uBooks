@extends('layouts.pretty')
@section('title', 'My Listings')
@section('content')

<div class = "col-md-12">
    <div class = "panel">
        <div class = "panel-body">
            @if(session('delete'))
                <div class = "alert alert-success">Listing marked as sold!</div>
            @endif
            <table class = "col-md-12 table table-striped">
                <thead>
                <th>Listing Title</th>
                <th>Actions</th>
                </thead>
            <tbody>
            @foreach($listings as $listing)
                <tr>
                    <td>
                        <a href = "{{ URL::to('/listing/' . $listing->id ) }}"> {{ $listing->name  }}</a>
                    </td>
                    <td>
                        <a href = " {{ URL::to('/editListing/' . $listing->id ) }}" class = "btn btn-primary"><span class = "fa fa-edit"></span> Edit</a>
                        <a href = " {{ URL::to('/deleteListing/' . $listing->id ) }}" class = "btn btn-success"><span class = "fa fa-check"></span> Mark as Sold</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection