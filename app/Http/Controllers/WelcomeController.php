<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Mail\WelcomeMail1;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $reservation = Reservation::select("*");
                       
                        
        return view('frontend.reserv.view_reserv',compact('reservation'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
   public function sendEmail(Request $request)

{

    $reservation = Reservation::whereIn("id", $request->ids)->get();

    

    Mail::to($reservation)->send(new WelcomeMail($reservation));

  

    return response()->json(['success'=>'Send email successfully.']);

}



public function index1(Request $request)
{
    $reservation = Reservation::select("*");
                   
                    
    return view('frontend.reserv.view_reserv',compact('reservation'));
}

/**
 * Write code on Method
 *
 * @return response()
 */
public function sendEmail1(Request $request)

{

$reservation = Reservation::whereIn("id", $request->ids)->get();



Mail::to($reservation)->send(new WelcomeMail1($reservation));



return response()->json(['success'=>'Send email successfully.']);

}

}