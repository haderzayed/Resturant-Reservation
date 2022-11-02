<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Support\Facades\Session;

class FrontendReservationController extends Controller
{
    public function stepOne(Request $request){
        $reservation=$request->session()->get('reservation');

        $min_date=Carbon::today();
        $max_date=Carbon::now()->addWeek();
        return view('front.reservations.step-one',compact('min_date','max_date','reservation') );
    }

    public function storeStepOne(Request $request){
          $validate=$request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required'],
            'phone'=>['required'],
            'guest_number'=>['required'],
            'date'=>['required','date', new DateBetween , new TimeBetween],
            // 'table_id'=>['required'],
          ]);

          if(empty($request->session()->get('reservation'))){
            $reservation=new Reservation();
            $reservation->fill($validate);
            $request->session()->pull('reservation', $reservation);
          }else{
            $reservation=$request->session()->get('reservation');
            $reservation->fill($validate);
            $request->session()->pull('reservation', $reservation);
          }
          session()->put('reservation',$reservation);
          return  redirect()->route('reservations.step.two');
    }

    public function stepTwo(Request $request){
        $reservation = $request->session()->get('reservation');
        $res_table_ids = Reservation::where('date',$reservation->date)->pluck('table_id');
        // $res_table_ids = Reservation::orderBy('date')->get()->filter(function ($value) use ($reservation) {
        //     return $value->date->format('Y-m-d') == $reservation->date->format('Y-m-d');
        // })->pluck('table_id');
        $tables = Table::whereStatus('Availabe')
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $res_table_ids)
            ->get();

        return view('front.reservations.step-two',compact('tables','reservation') );
    }

    public function storeStepTwo (Request $request){
        $validate=$request->validate([
          'table_id'=>['required'],
        ]);
        $reservation=$request->session()->get('reservation');
        $reservation->fill($validate);
        $reservation->save();
        $request->session()->forget('reservation');
        toastr()->success('Your Reservation Is Ready');
        return  redirect()->route('index');
  }

}
