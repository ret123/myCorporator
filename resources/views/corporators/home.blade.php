@extends('layouts.app')
@section('title', 'Welcome To myCorporator')

@section('content')


<div class="row">
  <div class="container">

    <div class="col-md-6 col-md-offset-1">



    <div class="panel panel-default">
      @foreach ($wards as $ward)
      <div class="panel-heading">
        <h4>Ward No. {{ $ward->id }} - {{ $ward->name }}</h4>
      </div>

      <div class="panel-body">

        <table class="table">
            <thead>
              <tr>
                <th class="col-md-3">Area</th>
                <th class="col-md-4">Corporator Name</th>
                <th class="col-md-3">Party</th>
              </tr>
            </thead>
            <tbody>
              @foreach($areas as $area)
                <tr>
                  @foreach($corporators as $corporator)
                  @if($ward->id === $corporator->ward_id && $area->id === $corporator->area_id)
                  <td class="col-md-3">

                    {{ $area->name }}
                  </td>
                  <td class="col-md-4">
                     <a href="{{ url('corporators/'. $corporator->id) }}">
                                    {{ $corporator-> name }}  </a> </td>

                 <td class="col-md-3"> {{ $corporator->party }} </td>
                @endif
              @endforeach
                </tr>
                @endforeach
            </tbody>


        </table>


      </div>




      @endforeach
  {{ $wards->render() }}
    </div>

  </div>
    <div class="col-md-4">
        <h4>Search corporator by name to raise any issue or query!!</h4>
      <corporator></corporator>
    </div>
  </div>
</div>

@endsection
