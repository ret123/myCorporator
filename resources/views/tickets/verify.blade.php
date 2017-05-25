@extends('layouts.app');
@section('content')
<div class="container">
  <div id="send-pin">
    <h3>Enter pin</h3>
    <form class="form-horizontal" action="{{url('new_ticket/verify')}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="phone" value="{{ $end_user->phone }}">
        <input type="hidden" name="end_user_id" value="{{ $end_user->id }}">
        <input type="hidden" name="title" value="{{ $ticket->title}}">
        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}">
        <input type="hidden" name="message" value="{{ $ticket->message}}">
        <input type="hidden" name="priority" value="{{ $ticket->priority}}">
        <input type="hidden" name="status" value="{{ $ticket->status }}">
        <input type="hidden" name="code" value="{{ $end_user->pin}}">
        <input type="hidden" name="corporator_id" value="{{$corporator->id}}">


        <div class="form-group">
        <div class="col-md-6">
        <input id="pin" type="pin" class="form-control" name="pin">
        </div>
      </div>
        <div class="form-group">
          <div class="col-md-6">
              <button type="submit" class="btn btn-primary btn-raised">
                <i class="fa fa-btn fa-ticket"></i> Verify OTP
              </button>
          </div>
        </div>

    </form>
  </div>
</div>
