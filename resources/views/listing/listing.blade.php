@extends('layouts.app')
@section('content')
<div class = "container">
	<div class = "row">
		<div class = "col-md-12">
			<div class = "panel">
				<div class = "panel-body">
					<div class="caption">
						<h3 class="pull-right" style="color:#5bc6c5">${{ $listing->price }}</h3>
						<h3><a href="#" style="color:#5bc6c5">{{ $listing->name}}</a></h3>
						<p>
						<strong>
							@if($listing->edition == 1)
								{{$listing->edition}}st
							@elseif($listing->edition == 2)
								{{$listing->edition}}nd
							@elseif($listing->edition == 3)
								{{$listing->edition}}rd
							@else
								{{$listing->edition}}th
							@endif
							Edition</strong>
						<h4>Condition: {{ $listing->condition}}</h4>
						</p>
						<p>{{ $listing->description }}</p>
						@if(Auth::User())
						<div align="right">
							<div style="width:150px">
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-md btn-block"><span class="glyphicon glyphicon-envelope"></span> Contact Seller</button>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<form method = "post" action = "{{ URL::to('/listing/contact/' . $listing->id ) }}">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Contact Seller</h4>
			</div>
			<div class="modal-body">
				<div class = "alert alert-info">Fill out the fields to contact the seller of this book</div>
				<div class="form-group">
					<label class="control-label">Phone number (Optional)</label>
					<input name = "tel" class="form-control" type="tel"/>
				</div>
				<div class="form-group">
					<label class="control-label">Date</label>
					<input name = "date" class="form-control" type="date" />
				</div>
				<div class="form-group">
					<label class="control-label">Best Meeting Times</label>
					<input name = "meet" class="form-control" type="text" />
				</div>
				<div class="form-group">
					<label class="control-label">Preferred Location</label>
					<input name = "loc" class="form-control" type="text" />
				</div>
				<div class="form-group">
					<label class="control-label">Additional Message </label>
					<textarea name = "msg" class="form-control" rows="5"></textarea>
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

@stop

