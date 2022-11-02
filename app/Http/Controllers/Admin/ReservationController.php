<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $table_name=$request->table_name;
//  dd($table_name);
        if( $request->has('name') ||
            $request->has('phone')||
            $request->has('table_name')||
            $request->has('date')   ){
            $date=Carbon::parse($request->date)->format( 'Y-m-d' );

            $reservations=Reservation::where ('phone','LIKE', "%$request->phone%")
                           ->whereHas('table', function ($query) use ($table_name) {
                                 $query->where('name','LIKE',"%$table_name%");})
                           ->whereDate('date',$date)
                           ->latest()->paginate(10);
        }else{
            $reservations=Reservation::latest()->paginate(10);
        }

        return view('admin.reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables=Table::whereStatus('Availabe')->get();
        $min_date=Carbon::today();
        $max_date=Carbon::now()->addWeek();
        return view('admin.reservation.create',compact('tables','min_date','max_date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $table=Table::findOrFail( $request->table_id);
        if($request->guest_number > $table->guest_number){
           return back()->withErrors( 'please choose the table base on guests' );
        }
        $request_date=Carbon::parse($request->date);
        foreach( $table->reservations as $reservation){
            if($reservation->date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->withErrors( 'This table is reseved for this date' );
            }
        }
        $reservation=Reservation::create($request->all());

        toastr()->success('Reservation Created Sucessfully');
        return redirect()->route('admin.reservations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation  $reservation)
    {
        $tables=Table::whereStatus('Availabe')->get();
        return view('admin.reservation.edite',compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, Reservation  $reservation)
    {
        $table=Table::findOrFail( $request->table_id);
        if($request->guest_number > $table->guest_number){
           return back()->withErrors( 'please choose the table base on guests' );
        }
        $request_date=Carbon::parse($request->date);
        $reservations=$table->reservations()->where('id','!=',$reservation->id)->get();
        foreach( $reservations as $reservation){
            if($reservation->date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->withErrors( 'This table is reseved for this date' );
            }
        }
        $reservation->update($request->all());

         toastr()->success('Reservation Updated Sucessfully');
         return redirect()->route('admin.reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation  $reservation)
    {
        $reservation->delete();
        toastr()->success('Reservation deleted Sucessfully');
        return redirect()->route('admin.reservations.index');
    }
}
