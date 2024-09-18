<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
        return view('backend.pages.reservations.index', ['reservations' => $reservations]);
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('backend.pages.reservations.show', ['reservation' => $reservation]);
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('backend.pages.reservations.edit', ['reservation' => $reservation]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
         $validatedData = Validator::make($request->all(),[
          'name' => 'required|string|max:255',
          'email' => 'required|email|max:255',
          'phone' => 'required|string|max:20',
         'guest' => 'required|integer|min:1',
         'date' => 'required|date_format:Y-m-d',
          'time' => 'required|date_format:H:i',
          'message' => 'nullable|string|max:255',
          'status' => 'required',
         ]);

        //  if ($validatedData->fails()){
        //     dd($validatedData->errors());
        //  }
        //  dd($validatedData);
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'no_of_guest' => $request->guest,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
            'status' => $request->status,
        ]);

        return redirect()->route('backend.reservations.index')->with('success', 'Reservation updated successfully!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('backend.reservations.index')->with('success', 'Reservation deleted successfully!');
    }
    // Add the store method for creating new reservations
    public function store(Request $request)
    {
        // Validate and store reservation data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:10',
            'no_of_guest' => 'required|integer|min:1',
            'date' => 'required|date_format:d/m/Y',
            'time' => 'required|date_format:H:i',
            'message' => 'required|string|max:10',
        ]);
        //if($validator->fails()){
        // dd($validator->errors());
        //   }


        Reservation::create($request->all());

        return redirect()->route('backend.reservations.index')->with('success', 'Reservation created successfully!');
    }


}
