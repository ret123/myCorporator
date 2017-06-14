@extends('layouts.app')

@section('content')
<div class="container">
  <div id="send-pin">
    <div class="col-md-8 col-md-offset-2">


      @include('includes.flash')

<div class="panel panel-primary">
  <div class="panel-heading">
   <h3 class="panel-title">Dynamic Access Code Verfication</h3>
  </div>
<div class="panel-body">
  <form class="form-horizontal" role="form" action="{{url('new_ticket/verify')}}" method="post">
      {!! csrf_field() !!}
<div style="margin-top:40px;" class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
  <div class="row">
  <label style="margin-top:20px;" for="pin" class="col-md-2 control-label">Enter OTP</label>
  <div class="col-md-3">
      <input id="pin" type="pin" class="form-control" name="pin">
      @if ($errors->has('pin'))
          <span class="help-block">
              <strong>{{ $errors->first('pin') }}</strong>
          </span>
      @endif
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-2">
  <span>Dint receive?</span>
  <a href="{{url('new_ticket/resend')}}">Click here</a>
</div>
</div>
    <div class="form-group">
      <div class="col-md-2 col-md-offset-2">
          <button type="submit" class="btn btn-primary btn-raised">
            <i class="fa fa-btn fa-ticket"></i> Verify OTP
          </button>
      </div>
    </div>


</div>
  </form>
  </div>
</div>
</div>
</div>
</div>
@endsection
<!--<script type="text/javascript">
  var countDown = new Date().getTime()+60000;
  var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDown - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML =  seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "OTP Expired";
  }
}, 1000);

</script> -->
