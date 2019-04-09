<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{
    public function show(){
        return view('item.upload-image');
    }

    public function post(Request $request){
        $im = $request->file('item');
        $g = file_get_contents($im);
        $base64Image = base64_encode($g);

        $data = array (
            'requests' =>
                array (
                    0 =>
                        array (
                            'image' =>
                                array (
                                    'content' => $base64Image,
                                ),
                            'features' =>
                                array (
                                    0 =>
                                        array (
                                            'type' => 'LABEL_DETECTION',
                                        ),
                                ),
                        ),
                ),
        );


        $filename = time().'-'.rand(1000,1000000).'.'.$im->getClientOriginalExtension();
        $im->move(public_path('images'), $filename);


        $r = Curl::to('https://vision.googleapis.com/v1/images:annotate?key=AIzaSyAzNhjeL7N3CVGUe7zAHLw6t3hEEIODYRc')
            ->withData(json_encode($data))
            ->withContentType('application/json')
            ->post();


//        echo '<img src="data:image/jpg;base64,'. $base64Image .'" />';

        $result = json_decode($r,true);
        $guess = '';

        if(isset($result['responses'])){
            foreach($result['responses'][0]['labelAnnotations'] as $ret){
                if($ret['score'] > 0.70){
                    $guess .= $ret['description'].',';
                }
            }

            $x = explode(',',$guess);
            $item['predictions'] = $x;
            unset($x[count($x) - 1]);

            $item['imgUrl'] = $filename;
            $cat['categories'] = DB::table('category')->get()->toArray();

            return view('item.post-item')->with($item)->with($cat);

        }else{

            return dd($result);
        }

    }
    public function save(Request $request){
        DB::table('items')->insert([
            'item_title' => $request->itemName,
            'item_desc' => $request->itemDesc,
            'item_cat' => $request->item_cat,
            'item_pred' => $request->itemPeriod,
            'image_url' => $request->img,
            'owner' => Auth::user()->id,
            'clicked' => 0,
            'onTrade' => 0,
        ]);

        Session::flash('msg','Item Post Successfully');

        return redirect('my-item');
    }

    public function myitem(){
        $r = DB::table('items')->where('owner',Auth::user()->id)->orderBy('id','DESC')->get();

        $ret['items'] = json_decode($r,true);

        return view('item.my-item')->with($ret);


    }
    public function showItem($id){
        $r['item'] = DB::table('items')
            ->join('category','items.item_cat','=','category.id')
            ->join('users','items.owner','=','users.id')
//            ->where('items.owner','!=',Auth::user()->id)
            ->where('items.id',$id)
            -> first(
                [   'items.id',
                    'items.item_title',
                    'items.item_desc',
                    'items.item_cat',
                    'items.item_pred',
                    'items.image_url',
                    'items.owner',
                    'items.onTrade',
                    'category.catName',
                    'users.name',
                    'users.id as userID',
                ]
            );



        return view('item.item-display')->with($r);

    }

    public function searchItem(){

        $search = Input::get ('search');
        $items['items'] = DB::table('items')
            ->orWhere('item_desc','LIKE','%'.$search.'%')
            ->orWhere('item_title','LIKE','%'.$search.'%')
            -> get()
            -> toArray();

        return view('item.search-item')->with($items);
    
    }

    public function tradeItem($id){
        return view('item.trade-item');
    }

    public function clicked(Request $request){
        $d =DB::table('items')->where('id',$request->id)->increment('clicked');
        return $request->id.' +1';
    }

}
