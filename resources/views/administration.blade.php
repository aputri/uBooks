@extends('layout')

@section('content')
	<table>
		<tr>
			<th>
				ID
			</th>
			<th>
				User
			</th>
			<th>
				Email
			</th>
			<th>
				Admin
			<th>
				Ban Forever
			</th>
			<th>
				Edit
			</th>
		</tr>
		 @foreach ($users as $user)
        <tr>
        	<td>
        	{{ $user->id }}
            </td>
            <td>
            {{ $user->name }}
            </a></td>
            <td>
            {{ $user->email }}
            </td>
            <td>
            {{ $user->id }}
            </td>
            <td>
            	<a href="/administration/{{ $user->id }}" class="rowlink">
            		Yes
            	</a>
            </td>
            <td>
            	<a href="/administration/ban/{{ $user->id }}" class="rowlink">
            		Yes
            	</a>
        </tr>
    	@endforeach
    </table>

@stop