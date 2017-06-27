@extends('layouts.app')

@section('title', $ticket->title)

@section('content')

        <div class="col-md-10 col-md-offset-1">
          <div class="well">
          <div class="panel panel-custom">
              <div class="panel-heading">
                Issue No: #{{ $ticket->ticket_id }}
              </div>
              <div class="panel-body">
                  @include('includes.flash')

                  <div class="row">
                      <div class="col-md-6">

                        <span class="new-font">Issue raised by:</span><span class="old-font"> {{ $end_user->name }}</span>
                     </div>
                    <div class="col-md-6">

                      <span class="new-font">Contact number:</span> <span class="old-font"> +{{ $end_user->phone }}</span>
                    </div>
                </div>
                  <div class="row">
                      <div class="col-md-6">

                        <span class="new-font">Priority:</span><span class="old-font">  {{ $ticket->priority }}</span>
                     </div>
                    <div class="col-md-6">

                            <span class="new-font">Issue:</span><span class="old-font">  {{ $ticket->message }}</span>
                    </div>
                </div>
              </div>
            </div> <!--panel ends here -->
            <form  method="POST" action="{{url('admin/assign_ticket/')}}" >
                {!! csrf_field() !!}
                <input type="hidden" name="corporator_id" value="{{$corporator->id}}">
                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                  <legend style="text-align:center;color:#00bfa5">Manage Issue</legend>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} label-floating">
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
                        <p class="help-block">Name of the person who will cordinate with the complainant.</p>
                      @endif
                    </div>
                  </div>
                </div> <!--col-xs-6 ends here -->
                <div class="col-xs-6">
                <div class=" form-group {{ $errors->has('mobile') ? ' has-error' : '' }} label-floating">
                  <div class="col-xs-1">
                    <i class="material-icons prefix ">phone</i>
                  </div>
                    <div class="col-xs-11">
                    <label for="mobile" class="col-md-6 control-label" style="margin-left:100px">Mobile No</label>
                    <div class="row">
                    <div class="col-md-3 col-xs-2">
                        <input id="code" type="text" class="form-control" name="code" value="91" readonly>
                    </div>
                      <div class="col-md-9 col-xs-6">
                      <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">


                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @else
                        <p class="help-block">Kindly enter your 10 digits mobile number</p>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div> <!--first row ends here -->
          <div class="row" >
                <div class="col-xs-6">
                  <div class=" form-group {{ $errors->has('status') ? ' has-error' : '' }} label-floating">
                   <div class="col-xs-1">
                      <i class="material-icons prefix ">security</i>
                    </div>
                    <div class="col-xs-11">
                      <label for="status" class=" control-label">Select Status</label>
                          <select id="status" type="" class="form-control" name="status">
                              <option value=""></option>
                              <option value="progress">Work in Progress</option>
                              <option value="hold">On Hold</option>
                              <option value="notapplicable">Not Under Jurisdiction</option>
                                <option value="resolved">Resolved</option>
                              <option value="closed">Closed</option>
                          </select>
                          @if ($errors->has('status'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @else
                          <p class="help-block">Kindly select the status of the issue</p>
                          @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group {{ $errors->has('priority') ? ' has-error' : '' }} label-floating">
                  <div class="col-xs-1">
                    <i class="material-icons prefix ">priority_high</i>
                  </div>
                  <div class="col-xs-11">
                    <label for="priority" class=" control-label">Priority</label>
                        <select id="priority"  class="form-control" name="priority">
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
            </div>
          </div> <!--second row ends here -->
              <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }} label-floating">
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
                        <p class="help-block">Kindly reply to the complainant regarding the issue.</p>
                        @endif
                 </div>
                </div>
             </div><!-- end of col-6 -->
          </div><!-- end of the row -->
          <div class="row"  style="margin-top:10px;">
            <center>
              <div class="col-xs-12 ">

                  <button type="submit" class="btn btn-primary btn-raised">
                      <i class="fa fa-btn fa-ticket"></i> Submit
                  </button>
              </div>
            </center>
        </div>
            </form>
          </div>
        </div>
@endsection
