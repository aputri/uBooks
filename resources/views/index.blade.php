@extends('layout')


@section('content')

    <b>uBooks: books for u</b>
    <table>
        <tr>
        <th>Title</th>
        <th>Edition</th>
        <th>Condition</th>
        <th>Price</th>
        </tr>
   @foreach ($booklistings as $listing)
        <tr>
            <td><a href="/{{ $listing->id }}" class="rowlink">
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