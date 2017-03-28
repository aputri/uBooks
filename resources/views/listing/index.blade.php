@extends('layouts.pretty')
@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            @if(session('success'))
                <div class = "alert alert-success">Order has been placed</div>
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
                <a href = "{{URL::to('create')}}"><button>Create New Listing</button></a>
                <br>
            @endif
            <br>
            <table class = "col-md-12 table-striped">
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
@stop