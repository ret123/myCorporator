@extends('layouts.app')

@section('title', 'Raise an issue')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <!--  <div class="panel panel-default">
                <div class="panel-heading">Raise an issue or complaint</div>

                <div class="panel-body"> -->
                    @include('includes.flash')
                    <div class="well bs-component">
                    <form class="form-horizontal"  method="POST" action="{{ url('new_ticket') }}">
                        {!! csrf_field() !!}
                          <legend style="text-align:center;color:#00bfa5">Raise an issue or complaint</legend>
                        <input type="hidden" name="corporator_id" value="{{ $corporator->id }}">
                        <div class="form-group {{ $errors->has('corporator') ? ' has-error' : '' }} label-floating">
                            <label for="corporator" class="control-label " style="font-size:20px;color:#90a4ae"><b>{{$corporator->name}}</b></label>
                        </div>
                        <div class=" row form-group {{ $errors->has('title') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons ">subject</i>
                          </div>
                          <div class="col-xs-11">
                            <label for="title" class="control-label">Subject</label>
                                <input id="title" type="text" class="form-control " name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                  @else
                                  <p class="help-block">Kindly enter the subject of your concern</p>
                                 @endif
                            </div>
                          </div>
                        <div class="row form-group {{ $errors->has('name') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons prefix ">account_circle</i>
                          </div>
                          <div class="col-xs-11">
                            <label for="name" class="control-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @else
                              <p class="help-block">Kindly enter your full name</p>
                            @endif
                          </div>
                        </div>

                        <div class=" row form-group {{ $errors->has('phone') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons prefix ">phone</i>
                          </div>
                            <div class="col-xs-11">
                            <label for="phone" class="col-md-2 control-label" style="margin-left:21px">Mobile No</label>
                            <div class="row">
                            <div class="col-md-1 col-xs-2">
                                <input id="code" type="text" class="form-control" name="code" value="91" readonly>
                            </div>
                              <div class="col-md-4 col-xs-6">
                              <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">


                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @else
                                <p class="help-block">Kindly enter your 10 digits mobile number</p>
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>

                        <div class=" row form-group {{ $errors->has('email') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons prefix ">email</i>
                          </div>
                          <div class="col-xs-11">
                            <label for="email" class="control-label">Email ID</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @else
                                  <p class="help-block">Kindly enter your email address</p>
                                @endif
                          </div>
                        </div>

                        <div class=" row form-group {{ $errors->has('address') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons prefix ">place</i>
                          </div>
                            <div class="col-xs-11">
                            <label for="address" class="control-label">Address</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @else
                                  <p class="help-block">Kindly enter your detail adress</p>
                                @endif
                          </div>
                        </div>


                        <div class=" row form-group {{ $errors->has('priority') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons prefix ">priority_high</i>
                          </div>
                          <div class="col-xs-11">
                            <label for="priority" class=" control-label">Priority</label>
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value=""></option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @else
                                <p class="help-block">Kindly select the priority according to the seriousness of the issue</p>
                                @endif
                          </div>
                        </div>

                        <div class=" row form-group {{ $errors->has('message') ? ' has-error' : '' }} label-floating">
                          <div class="col-xs-1">
                            <i class="material-icons prefix ">message</i>
                          </div>
                          <div class="col-xs-11">
                            <label for="message" class="control-label">Message</label>
                            <textarea rows="4" id="message" class="form-control" name="message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @else
                                <p class="help-block">Kindly enter the issue your facing</p>
                                @endif
                         </div>
                        </div>

                        <div class="form-group">
                          <center>
                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary btn-raised">
                                    <i class="fa fa-btn fa-ticket"></i> Submit
                                </button>
                            </div>
                          </center>
                        </div>

                    </form>
                  </div>
        </div>
    </div>
  </div>
@endsection
