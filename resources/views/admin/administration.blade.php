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
            </th>
            <th>
                Status
			<th>
				Delete
			</th>
			<th>
				Ban
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
            @if($user->admin)
                Yes
            @endif
            </td>
            <td>
            @if($user->banned)
                Banned
            @endif
            </td>
            <td>
            	<a href="/administration/{{ $user->id }}">
            		Yes
            	</a>
            </td>
            <td>
                <a href="/administration/ban/{{ $user->id }}">
                    Yes
                </a>
            </td>
        </tr>
    	@endforeach
    </table>

@stop