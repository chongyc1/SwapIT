<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AppointmentController extends Controller
{
    public function index($params){
        $g = explode('&',$params);
        $data['dataList'] = [
            'owner' => $g[0],
            'buyer' => $g[1],
            'itemID' => $g[2],
        ];

        $item['item'] = DB::table('items')
            ->where('id',$g[2])
            ->first();

        $item['itemList'] = DB::table('items')
            ->where('owner',Auth::user()->id)
            ->where('onTrade',0)
            ->get()
            ->toArray();


//        dd($item);
//
//        dd($g);
    	return view('appointment.setAppointment')->with($data)->with($item);
    }

    public function setAppointment(Request $request){

//        dd($request);
        DB::table('appointments')->insert([
            'owner' => $request->ownerID,
            'buyer' => Auth::user()->id,
            'owner_item' => $request->itemID,
            'buyer_item' => $request->buyer_item_id,
            'location' => $request->location,
            'status' => 'PENDING',
            'date' => $request->date,
            'time' => $request->time,
        ]);

        DB::table('items')->where('id',$request->buyer_item_id)->where('id',$request->itemID)->update(['onTrade' => 1]);

        return redirect('myAppointment');
//        dd('DONE');
    }

    public function upd(){
        
    }


    public function show(){

        $list['buyer'] = DB::table('appointments')
            ->join('items','appointments.buyer_item','items.id')
            ->join('users','appointments.buyer','users.id')
            ->orderBy('appointments.id','DESC')
            ->get([
                'users.id as buyerID',
                'users.name as buyerName',
                'appointments.status as status',
                'items.id as buyerItemID',
                'items.item_title as buyerItemName',
                'items.image_url as buyerItemURL',
            ]);


        $list['owner'] = DB::table('appointments')
            ->join('items','appointments.owner_item','items.id')
            ->join('users','appointments.owner','users.id')
            ->orderBy('appointments.id','DESC')
            ->get([
                'users.id as ownerID',
                'users.name as ownerName',
                'appointments.status as status',
                'items.id as ownerItemID',
                'items.item_title as ownerItemName',
                'items.image_url as ownerItemURL',
                'appointments.id as appID',
                'appointments.date as date',
                'appointments.time as time',
                'appointments.location as location',
            ]);

        $check = DB::table('appointments')
            ->orWhere('buyer',Auth::user()->id)
            ->orWhere('owner',Auth::user()->id)
            ->orderBy('id','DESC')
            ->get();

        $cList = json_decode($check,true);

        $appIDArray = [];

       foreach ($cList as $c){
           array_push($appIDArray,$c['id']);

       }


       $o = json_decode($list['owner'],true);
       $b = json_decode($list['buyer'],true);

       $item['app_list'] = [];

       $count = count($o);

       for ($i = 0; $i<$count;$i ++){
            if(in_array($o[$i]['appID'],$appIDArray)){
                $new = [
                    "ownerID" => $o[$i]['ownerID'],
                    "ownerName" =>  $o[$i]['ownerName'],
                    "status" => $o[$i]['status'],
                    "ownerItemID" =>  $o[$i]['ownerItemID'],
                    "ownerItemName" =>  $o[$i]['ownerItemName'],
                    "ownerItemURL" => $o[$i]['ownerItemURL'],
                    "buyerID" => $b[$i]['buyerID'],
                    "buyerName" => $b[$i]['buyerName'],
                    "buyerItemID" => $b[$i]['buyerItemID'],
                    "buyerItemName" => $b[$i]['buyerItemName'],
                    "buyerItemURL" => $b[$i]['buyerItemURL'],
                    "appID" => $o[$i]['appID'],
                    "date" => $o[$i]['date'],
                    "time" => $o[$i]['time'],
                    "location" => $o[$i]['location'],
                ];
                array_push($item['app_list'],$new);

            }

       }

    	return view('appointment.myAppointment')->with($item);
    }

    public function showDetails(Request $request){
        $ret['users'] = DB::table('users')->where('id',$request->userID)->first();
        $ret['app'] = DB::table('appointments')->where('id',$request->appID)->first();
        $ret['item'] = DB::table('items')
            ->join('category','items.item_cat','=','category.id')
            ->where('items.id',$request->itemID)
            -> first(
                [   'items.id',
                    'items.item_title',
                    'items.item_desc',
                    'items.item_cat',
                    'items.item_pred',
                    'items.image_url',
                    'items.owner',
                    'category.catName',
                ]
            );
        $ret['type'] = $request->type;

        return response($ret);
    }

    public function updStatus(Request $request){
        $appID = $request->appID;
        $status = $request->status == 'A' ? 'APPROVED' : 'DECLINED';
        DB::table('appointments')->where('id',$appID)->update(['status' => $status]);
        return response($status);
    }
}
