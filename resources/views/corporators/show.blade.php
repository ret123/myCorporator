@extends('layouts.app')

@section('title', $corporator->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                    <div class="row">


                    <div class="avatar col-md-3">
                      <img src="/uploads/corporators/{{$corporator->avatar}}" style="width:250px; height:300px">
                    </div>
                      <h3 style="margin:0 0 15px;"> {{ $corporator->name }} ({{ $corporator->party }})   <img src="/uploads/party/{{$corporator->party_image}}" style="width:90px; height:60px"></h3>
                      <div class="row">
                      <div class="col-md-6">

                          @include('includes.flash')

                        <div class="ticket-info">
                              <p> <i class="material-icons">&#xE0BA;</i> <span> Ward No: {{ $ward-> id}}</span></p>
                            <p><i class="material-icons">&#xE55F;</i> Ward: {{ $ward->name }}</p>
                            <p> <i class="material-icons">&#xE55A;</i> Area: {{ $area->name }}</p>
                            <p><i class="material-icons" style="font-size:28px;">&#xE88A;</i> Address: {{$corporator->address}}</p>
                        <p><span><i class="material-icons">&#xE334;</i></span>  Duration: {{ $corporator->duration }}</p>
                        </div>
                      </div>
                        <!--<div class="col-md-2">
                          <img src="/uploads/party/{{$corporator->party_image}}" style="width:120px; height:80px">
                        </div> -->
                    </div>
                  </div>
             </div>
        </div>
    </div>
  </div>
@endsection
