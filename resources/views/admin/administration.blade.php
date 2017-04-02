@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12 panel">
                <table class = "table-striped col-md-12">
                    <tr>
                        <th> ID </th>
                        <th> User </th>
                        <th> Email </th>
                        <th>  Admin  </th>
                        <th> Status </th>
                        <th> Delete </th>
                        <th> Ban </th>
                        <th> Change Password </th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{ $user->id }}  </td>
                            <td> {{ $user->name }}  </td>
                            <td> {{ $user->email }}  </td>
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
                                <a href="{{URL::to('/administration/'. $user->id ) }}">
                                    Yes
                                </a>
                            </td>
                            <td>
                                <a href="{{URL::to('/administration/ban/' . $user->id ) }}">
                                    Yes
                                </a>
                            </td>
                            <td>
                                <form method = "post" action = "{{URL::to('/administration/changePass/' . $user->id) }}">
                                    <input type = "password" name = "password" />
                                    <input type = "submit" value = "Change Password">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class = "container">
        <div class = "row">
            <div class = "col-md-12 panel">
                <table class = "table-striped col-md-12">
                    <tr>
                        <th> ID </th>
                        <th> Times Reported </th>
                        <th> Reason </th>
                        <th> Delete </th>
                        <th> View Post</th>
                    </tr>
                    @foreach ($reports as $report)
                        <tr align="center">
                            <td> {{ $report->listingId }}  </td>
                            <td> {{ $report->reported }}  </td>
                            <td> {{ $report->reason }}  </td>
                            <td>
                                <a href="{{URL::to('/administration/deletePost/'. $report->listingId ) }}">
                                   Yes
                                </a>
                            </td>
                            <td>
                                <a href="{{URL::to('./listing/' . $report->listingId)}}">
                                    View
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop