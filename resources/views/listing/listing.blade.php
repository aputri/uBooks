@extends('layouts.pretty')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="caption">
                            <img class="img-responsive" src="{{$listing->imageLink}}">
                            <h3 class="pull-right" style="color:#5bc6c5">${{ $listing->price }}</h3>
                            <h3><a href="#" style="color:#5bc6c5">{{ $listing->name}}</a></h3>
                            <p>
                                <strong>Edition: {{$listing->edition}}</strong>
                            <h4>Condition: {{ $listing->condition}}</h4>
                            </p>
                            <p>{{ $listing->description }}</p>
                            <img class="img-responsive" src="{{"../../storage/app/public/" . $listing->imagePath}}">
                            @if(Auth::User())
                                <div class="btn-toolbar">
                                    <button style="width:150px" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-md btn-block pull-right"><span class="glyphicon glyphicon-envelope"></span> Contact Seller</button>
                                    <button style="width:150px" data-toggle="modal" data-target="#myReportModal" class="btn btn-danger btn-md btn-block"><span class="glyphicon glyphicon-flag"></span> Report Listing</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <form method="post" action="{{ URL::to('/listing/contact/' . $listing->id ) }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Contact Seller</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">Fill out the fields to contact the seller of this book</div>
                        <div class="form-group">
                            <label class="control-label">Phone number (Optional)</label>
                            <input name="tel" class="form-control" type="tel"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input name="date" class="form-control" type="date"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Best Meeting Times</label>
                            <input name="meet" class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Preferred Location</label>
                            <input name="loc" class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Additional Message </label>
                            <textarea name="msg" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Contact</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="post" action="{{ URL::to('/listing/report/' . $listing->id ) }}">
        <div class="modal fade" id="myReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Report Listing</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">Please tell us why this is being reported</div>
                        <div class="form-group">
                            <label class="control-label">Reason</label>
                            <input name="reason" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Report</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop

