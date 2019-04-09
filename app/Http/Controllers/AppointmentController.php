<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
    	return view('appointment.setAppointment');
    }

    public function setAppointment(Request $request){

//        $request->validate([
//            'location' => 'required',
//            'date' => 'required|date|after:today',
//
//        ]);


        DB::table('appointments')->insert([
            'owner' => '',
            'buyer' => '',
            'owner_item' => '',
            'buyer_item' => '',
            'location' => '',
            'status' => 'PENDING',
            'date' => '',
            'time' => '',
        ]);

        dd('DONE');
    }

    public function upd(){
        
    }
    public function show(){
    	return view('appointment.myAppointment');
    }
}
