<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CategoryController extends Controller
{
    public function index($id){
//        dd($id);
        $items['items'] = DB::table('items')
            ->join('category','items.item_cat','=','category.id')
            ->where('category.id',$id)
            ->where('items.owner','!=',Auth::user()->id)
            -> get(
                [   'items.id',
                    'items.item_title',
                    'items.item_desc',
                    'items.item_cat',
                    'items.item_pred',
                    'items.image_url',
                    'items.owner',
                    ]
            )-> toArray();


//        $items['catName'] = DB::table('category')->where('id',$id)->first()->catName;

        return view('item.search-item')->with($items);
    }

    public function clicked(Request $request){
        DB::table('category')->where('id',$request->id)->increment('clicked');
        return $request->id.' +1';
    }
}
