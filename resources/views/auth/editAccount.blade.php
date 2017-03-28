@extends("layouts.pretty")
@section("content")
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <div class = "panel">
                    <div class = "panel-body">
                        <div class = "col-md-6">
                            <form method = "post" action = "{{ URL::to('/profile/editInfo') }}">

                                <h2>Edit Profile </h2>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Name </label>
                                            <input class="form-control" type="text" name="name" value = " {{ $user->name }}" />
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email </label>
                                    <input class="form-control" type="email" autocomplete="off" required name="email" value = "{{ $user->email }}" />
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-md-12 content-right">
                                        <button class="btn btn-primary btn-block" type="submit">Save </button>
                                    </div>
                                </div>
                                @if(session('saveInfo'))
                                    <br>
                                    <div class = "alert alert-success">Saved new details</div>
                                @endif
                            </form>
                        </div>
                        <div class = "col-md-6">

                            <form method = "post" action = "{{URL::to('/profile/changePass') }}">
                                <h2>Change Password</h2><hr />
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Old Password </label>
                                            <input class="form-control" type="password" name="password" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input class="form-control" type="password" name="confirmpass" autocomplete="off" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 content-right">
                                        <button class="btn btn-primary btn-block" type="submit">Change Password </button>
                                    </div>
                                </div>
                                @if(session('savePass'))
                                    <br>
                                    <div class = "alert alert-success">Changed Password</div>
                                @endif
                                @if(session('failPass'))
                                    <br>
                                    <div class = "alert alert-danger">Old password is incorrect</div>
                                @endif
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
