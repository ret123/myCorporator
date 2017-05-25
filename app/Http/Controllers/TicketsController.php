<?php

namespace App\Http\Controllers;
use App\Corporator;
use App\Ticket;
use App\Ward;
use App\Area;
use App\EndUser;
use App\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketsController extends Controller
{


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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);
        $end_user=EndUser::create([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'phone' => $request->input('phone'),
          'address'=> $request->input('address'),
          'pin' => str_random(5),
        ]);
        $corporator=Corporator::where('id',$request->input('corporator_id'))->firstOrFail();
        $ticket= new Ticket([
          'title' => $request->input('title'),
          'corporator_id' => $corporator->id,
          'ticket_id' => strtoupper('Pune-'.$corporator->party.'-'.$corporator->ward_id.$corporator->area->name.'-'.hexdec(uniqid())),
          'priority' => $request->input('priority'),
          'message' => $request->input('message'),
          'status' => 'Open',
        ]);

        $end_user->sendOTP();
            return view('tickets.verify', compact('ticket','end_user','corporator'));

      /*  } else {
        $end_user->delete();// delete token because it can't be sent
            return redirect('/new_ticket')->withErrors([
                "Unable to send verification code"
            ]);
        } */
      }

    public function verify(Request $request) {
      $corporator_id=$request->input('corporator_id');
      $pin = $request->input('code');
      if($pin==$request->pin) {
        $ticket= Ticket::create([
          'title' => $request->input('title'),
          'corporator_id' => $corporator_id,
          'end_user_id'=>$request->input('end_user_id'),
          'ticket_id' => $request->input('ticket_id'),
          'priority' => $request->input('priority'),
          'message' => $request->input('message'),
          'status' => $request->input('status'),
        ]);
            return redirect()->action('Corporators@show',[$corporator_id])->with("status" , "A ticket with ID: $ticket->ticket_id has been created.");
      } else {
          return redirect()->back()->with("status", "Invalid Otp try again");
      }
    }
}
