@extends('layouts.app')

@section('title', $corporator->name)

@section('content')
<div class="container-fluid">
  <img src="/uploads/wards/{{$ward->id}}.png" alt="" class="img-responsive">
    <div class="row">

        <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                        @include('includes.flash')
                    </div>
                  </div>
                  <div class="row">
                    <div class="avatar col-md-4">
                      <img src="/uploads/corporators/{{$corporator->avatar}}" style="width:250px; height:300px">
                    </div>

                      <div class="col-md-8">

  <h3 style="margin:0 0 15px;"> {{ $corporator->name }} ({{ $corporator->party }})   <img src="/uploads/party/{{$corporator->party_image}}" style="width:90px; height:60px"></h3>

                        <div class="ticket-info">
                          <div class="row">
                            <div class="col-md-1">
                              <i class="material-icons">&#xE0BA;</i>
                            </div>
                            <div class="col-md-7" style="margin-top:10px">
                           <p>Ward No: {{ $ward-> id}}</p>
                             </div>
                        </div>
                        <div class="row">
                          <div class="col-md-1">
                          <i class="material-icons">&#xE55F;</i>
                          </div>
                          <div class="col-md-7" style="margin-top:10px">
                            <p> Ward: {{ $ward->name }}</p>
                           </div>
                      </div>
                      <div class="row">
                        <div class="col-md-1">
                      <i class="material-icons">&#xE55A;</i>
                        </div>
                        <div class="col-md-7" style="margin-top:10px">
                          <p>  Area: {{ $area->name }}</p>
                         </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                    <i class="material-icons" style="font-size:38px;">&#xE88A;</i>
                      </div>
                      <div class="col-md-7" style="margin-top:10px">
                        <p> Address: {{$corporator->address}}</p>
                       </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1">
                  <i class="material-icons">&#xE334;</i>
                    </div>
                    <div class="col-md-7" style="margin-top:10px">
                    <p> Duration: {{ $corporator->duration }}</p>
                     </div>
                </div>

                        </div>
                      </div>
                        <!--<div class="col-md-2">
                          <img src="/uploads/party/{{$corporator->party_image}}" style="width:120px; height:80px">
                        </div> -->

                  </div>
                  <div class="row">
                    <a href="{{url('new_ticket/'.$corporator->id)}}" class="btn btn-raised btn-info" style="margin-left:35px;">Place a request</a>
                  </div>
             </div> <!--col-md-8 ends here -->
             @if ($tickets->isEmpty())
                <div class="hide"></div>
             @else
              <div class="col-md-4">
                <div class=" panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Issue Raised</h3>
                  </div>
                <div class="panel-body">
                    <ul>
                      @foreach($tickets as $ticket)


                      <li>  <div class="chip">
                        <img src="/uploads/corporators/1-D.jpg" alt="Contact Person">
                        user name
                      </div><a href="{{url('ticket/'.$ticket->id)}}">{{$ticket->ticket_id}}</a></li>
                      @endforeach
                    </ul>
                </div>
              </div>

            </div> <!-- col-md-4 ends here -->
            @endif
         </div>
    </div>

@endsection
