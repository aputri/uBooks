
@extends('layout')

@section('content')

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




    <table>
        <tr>
        <th>Title</th>
        <th>Edition</th>
        <th>Condition</th>
        <th>Price</th>
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
        </tr>
    @endforeach
    </table>
@stop