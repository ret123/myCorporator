<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corporator;
use App\Ward;
use App\Area;
use App\Ticket;

class Corporators extends Controller
{
    public function home() {
       $corporators =Corporator::all();
       $wards=Ward::paginate(5);
       $areas=Area::all();

       return view('corporators.home',compact('corporators','wards','areas'));
    }

    public function show($corporator_id) {
      $corporator=Corporator::where('id',$corporator_id)->firstOrFail();
      $ward=$corporator->ward;
      $area=$corporator->area;
      $tickets=$corporator->tickets;
      return view('corporators.show',compact('corporator','ward','area','tickets'));

    }

    public function search(Request $request) {
      $search = $request->search;
      $corporators =Corporator::with('ward','area')->where('name','LIKE',"%$search%")->paginate(4);
      return response()->json([
        'model' => $corporators
      ]);
    }

}
