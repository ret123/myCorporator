@extends('layouts.app')

@section('title', $corporator->name)

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $corporator->name }}
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>{{ $corporator->party }}</p>
                        <p>Ward: {{ $ward->name }}</p>
                        <p>Area: {{ $area->name }}</p>
                        <p>Duration: {{ $corporator->duration }}</p>
                    </div>

                    <hr>


            </div>
        </div>
    </div>
@endsection
