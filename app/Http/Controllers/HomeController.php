<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item['items'] = DB::table('items')->orderBy('clicked','DESC')->limit(6)->get()->toArray();
        $cat['categories'] = DB::table('category')->get()->toArray();
//        dd($item);
        return view('home')
            ->with($item)
            ->with($cat);

    }
}
