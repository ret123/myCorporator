@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
        <div class="container-fluid">
        <div class="col-md-12">
          <div class="panel panel-primary">
              <div class="panel-heading">
                    {{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                      <div class="col-md-5">
                      <div class="row">
                        <i class="material-icons prefix ">account_circle</i>
                    <span class="new-font">Issue raised by:</span><span class="old-font"> {{ $end_user->name }}</span>
                      </div>
                      <div class="row">
                        <i class="material-icons prefix ">place</i>
                        <span class="new-font">Address:</span><span class="old-font"> {{ $end_user->address }}</span>
                      </div>
                        <div class="row">
                        <i class="material-icons prefix ">phone</i>
                        <span class="new-font">Contact number:</span> <span class="old-font"> +{{ $end_user->phone }}</span>
                      </div>
                      <div class="row">
                        <i class="material-icons prefix ">priority_high</i>
                        <span class="new-font">Priority:</span><span class="old-font">  {{ $ticket->priority }}</span>
                      </div>
                      <div class="row">
                        <i class="material-icons prefix ">report_problem</i>
                        <span class="new-font">Issue:</span><span class="old-font">  {{ $ticket->message }}</span>
                      </div>
                      <div class="row">
                          <i class="material-icons prefix ">security</i>

                        @if ($ticket->status === 'Open')
                          <span class="new-font">  Status:</span><span class="label label-success">{{ $ticket->status }}</span>
                        @else
                          <span class="new-font">  Status:</span> <span class="label label-danger">{{ $ticket->status }}</span>
                        @endif

                      </div>

                            <div class="row">
                          <i class="material-icons prefix ">query_builder</i>
                          <span class="new-font">Created:</span><span class="old-font">  {{ $ticket->created_at->diffForHumans() }}</span>
                        </div>
                              @if(Auth::check())
                              @if($user->id == $corporator->user_id && $ticket->status !== 'Closed')
                              <form action="{{ url('admin/close_ticket/'.$ticket->id) }}" method="POST">
                                  {!! csrf_field() !!}
                                  <button type="submit" class="btn btn-danger btn-raised col-md-4 col-offset-3">Close</button>
                              </form>

                                  <a href="{{ url('admin/assign_ticket/'.$ticket->id)}}" class="btn btn-info btn-raised col-md-6">Manage issue</a>
                              @endif
                              @endif


                    </div>


                  <div class="col-md-3">
                    <div class="row">

                      <div class="avatar col-md-4">

                        <img src="/uploads/corporators/{{$corporator->avatar}}" style="width:250px; height:300px">
                      </div>

                  </div>
                    <h4 style="margin:10 0 15px;" class="old-font"> {{ $corporator->name }} ({{ $corporator->party }}) </h4>
                </div>
                  <div class="col-md-4"> <!--ticket status at corporator side -->
                    @if($worker !== 'null')
                    <div class="row">

                      <div class="row">
                        <i class="material-icons prefix ">account_circle</i>
                       <span class="new-font">Issue assigned to: </span><span class="old-font"> {{ $worker->name }}</span>
                      </div>
                      <div class="row">
                      <i class="material-icons prefix ">phone</i>
                      <span class="new-font">Contact number:</span> <span class="old-font"> +{{ $worker->phone }}</span>
                    </div>
                    <div class="row">
                      <i class="material-icons prefix ">priority_high</i>
                      <span class="new-font">Priority set by corporator:</span><span class="old-font">  {{ $worker->priority }}</span>
                    </div>
                    <div class="row">
                        <i class="material-icons prefix ">security</i>

                      @if ($ticket->status === 'progress')
                        <span class="new-font">  Status at Corporators end:</span><span class="label label-primary">{{ $worker->status }}</span>
                      @endif
                      @if ($ticket->status === 'hold')
                      <span class="new-font">  Status at Corporators end:</span> <span class="label label-warning">{{ $worker->status }}</span>
                      @endif
                      @if ($ticket->status === 'notapplicable')
                      <span class="new-font">  Status at Corporators end:</span> <span class="label label-info">{{ $worker->status }}</span>
                      @endif
                      @if ($ticket->status === 'resolved')
                      <span class="new-font">   Status at Corporators end:</span> <span class="label label-success">{{ $worker->status }}</span>
                      @endif
                      @if ($ticket->status === 'closed')
                      <span class="new-font">   Status at Corporators end:</span> <span class="label label-danger">{{ $worker->status }}</span>
                      @endif

                    </div>
                      <div class="row">
                        <i class="material-icons prefix ">report_problem</i>
                        <span class="new-font">Message from Corporators end:</span><span class="old-font">  {{ $worker->reply }}</span>
                      </div>

                    </div>

                    @endif

                  </div>
                  <hr>
                </div> <!--end of ticket-info -->

            </div>
        </div>
    </div>
  </div>
@endsection
