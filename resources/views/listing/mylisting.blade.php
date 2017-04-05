@extends('layouts.pretty')
@section('content')

<div class = "col-md-12">
    <div class = "panel">
        <div class = "panel-body">
            @if(session('delete'))
                <div class = "alert alert-danger">Listing Deleted</div>
            @endif
            <table class = "col-md-12 table-striped">
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
                        <a class = "btn btn-primary"><span class = "fa fa-edit"></span> Edit</a>
                        <a href = " {{ URL::to('/deleteListing/' . $listing->id ) }}" class = "btn btn-danger"><span class = "fa fa-trash"></span> Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection