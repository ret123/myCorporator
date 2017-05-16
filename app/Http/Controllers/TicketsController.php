<?php

namespace App\Http\Controllers;
use App\Corporator;
use App\Ticket;
use App\Ward;
use App\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create($corporator_id) {
      $corporator=Corporator::where('id',$corporator_id)->firstOrFail();
      return view('tickets.create',compact('corporator'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'priority' => 'required',
            'message' => 'required',

        ]);
        $corporator=Corporator::where('id',$request->input('corporator_id'))->firstOrFail();
        $ticket= new Ticket([
          'title' => $request->input('title'),
          'user_id' => Auth::user()->id,
          'corporator_id' => $corporator->id,
          'ticket_id' => strtoupper('Pune-'.$corporator->party.'-'.$corporator->ward_id.$corporator->area->name.'-'.hexdec(uniqid())),
          'priority' => $request->input('priority'),
          'message' => $request->input('message'),
          'status' => 'Open',
        ]);
        $ticket->save();
        return redirect()->action('Corporators@show',[$corporator->id])->with("status" , "A ticket with ID: $ticket->ticket_id has been created.");
    }
}
