<b>{{ $data["buyerName"] }} is interested in purchasing {{ $listing->name }}</b><br/><br><br>
@if(!empty($data["tel"]))
    <b>Phone Number: </b> {{ $data["tel"] }} <br><br>
@endif
@if(!empty($data["loc"]))
    <b>Preferred Location: </b> {{ $data["loc"] }} <br><br>
@endif
@if(!empty($data["dat"]))
    <b>Date:</b> {{ $data["dat"] }} <br><br>
@endif
@if(!empty($data["time"]))
    <b>Time:</b> {{ $data["time"] }} <br><br>
@endif
@if(!empty($data["msg"]))
    <b>Message:</b>  {{ $data["msg"] }} <br><br>
@endif
<a href = "http://localhost/ubooks/public">
<button>
    Go to uBooks to accept offer!
</button></a>