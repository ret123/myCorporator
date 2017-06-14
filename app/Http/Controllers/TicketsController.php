<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Requests\PinFormRequest;
use Session;
use App\Corporator;
use App\Ticket;
use App\Ward;
use App\Area;
use App\EndUser;
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
          'phone' => $request->input('code').$request->input('phone'),
          'address'=> $request->input('address'),
          'pin' =>  mt_rand(100000,999999), //str_random(5),
          'otp_count' => 1,
        ]);
        $updated=$end_user->updated_at;
        Session::put('updated',$updated);
        $corporator=Corporator::where('id',$request->input('corporator_id'))->firstOrFail();

        Session::put('phone',$end_user->phone);
        Session::put('pin', $end_user->pin);
        Session::put('end_user_id',$end_user->id);
        Session::put('corporator_id', $corporator->id);
        $ticket= new Ticket([
          'title' => $request->input('title'),
          'corporator_id' => $corporator->id,
          'ticket_id' => strtoupper('Pune-'.$corporator->party.'-'.$corporator->ward_id.$corporator->area->name.'-'.hexdec(uniqid())),
          'priority' => $request->input('priority'),
          'message' => $request->input('message'),
          'status' => 'Open',
        ]);
        Session::put('title', $ticket->title);
        Session::put('ticket_id', $ticket->ticket_id);
        Session::put('priority', $ticket->priority);
        Session::put('message', $ticket->message);
        Session::put('status', $ticket->status);

        //$end_user->sendOTP();
        //return view('tickets.verify');

       return redirect()->route('tickets.verify')->with("msg", "An Otp has been send to your phone no."); //->with('ticket',$ticket)
                          //                  ->with('end_user',$end_user);
                                          //  ->with('corporator',$corporator);


      /*  } else {
        $end_user->delete();// delete token because it can't be sent
            return redirect('/new_ticket')->withErrors([
                "Unable to send verification code"
            ]);
        } */
      } //functino store ends here


    public function verify(PinFormRequest $request) {
        $id =Session::get('end_user_id');
        $corporator_id=Session::get('corporator_id');
        if(EndUser::where('id', '=', $id)->exists()) {
        $phone=Session::get('phone');
        $pin=Session::get('pin');
        $time=Session::get('updated');
        $expire=$time->addMinute(1);
        $length= $time->diffInSeconds($time->copy()->addSeconds(60));
        $end_user = EndUser::where('pin',$pin)->firstOrFail();
          //if(strtotime($time->copy()->addSeconds(60)) - strtotime($time) <=0) {
          if(strtotime($expire) <= strtotime(Carbon::now())) {
              $end_user->delete();
            return redirect()->action('Corporators@show',[$corporator_id])->with("err", "Otp time expired. Try again!");

          }
          elseif ($pin==$request->pin) {
            # code...
          $ticket= Ticket::create([
          'title' => Session::get('title'),
          //'end_user_id' => Session::get('end_user_id'), //$request->input('title'),
          'corporator_id' => $corporator_id,
          'ticket_id' => Session::get('ticket_id'),  //$request->input('ticket_id'),
          'priority' =>Session::get('priority'), //$request->input('priority'),
          'message' => Session::get('message'), //$request->input('message'),
          'status' => Session::get('status'),
           //$request->input('status'),
        ]);
            $end_user->verified = "1";
            $end_user->save();
            Session::flush();
            return redirect()->action('Corporators@show',[$corporator_id])->with("msg" , "A ticket with ID: $ticket->ticket_id has been created.");

      } else {

          $end_user->delete();
          return redirect()->action('Corporators@show',[$corporator_id])->with("err", "Invalid Otp try again");
      }
    } else {

      return redirect()->action('Corporators@home')->with("err", "Session expired. Try again.");
     }
   } //functino verfify ends here

    public function resendOtp() {
    $id = Session::get('end_user_id');
    $corporator_id=Session::get('corporator_id');
    if(EndUser::where('id', '=', $id)->exists()) {
    $end_user=EndUser::where([
        ['phone', '=', Session::get('phone')],
        ['verified', '=' , 0],
        ['id', '=', $id],
      ])->first();
      $count=$end_user->otp_count;
      if($end_user->otp_count<=1) {
      $end_user->update(['pin' => mt_rand(100000,999999)]);
      Session::put('pin',$end_user->pin);
      //$end_user->sendOTP();
      $end_user->otp_count=$count+1;
      $end_user->save();
      return redirect()->route('tickets.verify')->with("msg", "An Otp has been resend to your phone no.");
    } else {
      $end_user->delete();

      return redirect()->action('Corporators@show',[$corporator_id])->with("err", "Number of allowed otp exceed. Try again after few minutes");
     }

   } else {
    return redirect()->action('Corporators@home')->with("err", "Session expired.Try again later.");
  }
} //function resendOtp ends here

 public function showTicket($id) {
   $ticket=Ticket::where('id',$id)->firstOrFail();
 }

} //end of controller
