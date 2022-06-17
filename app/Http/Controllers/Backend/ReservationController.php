<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Database\Eloquent\Collection;

class ReservationController extends Controller
{

  
    public function index()
    {
     
        return view('frontend.reserv.reservation');
    }

    public function indexView()


    {

        $reservation = Reservation::get();
        return view('frontend.reserv.view_reserv',compact('reservation'));
    }

    public function ReservationStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        
        ], [
            'name.required' => 'Input NAME',
            'email.required' => 'Input EMAIL',
               ]);



        Reservation::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'people' => $request->people,
            'message' => $request->message,

        ]);


        return redirect()->route('reservation1');
    }

    public function ReservationDelete($id)
    {

        Reservation::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method 
}