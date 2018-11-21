<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ItemController extends Controller
{
    public function show(){
        return view('item.post-item');
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


        $r = Curl::to('https://vision.googleapis.com/v1/images:annotate?key=AIzaSyAzNhjeL7N3CVGUe7zAHLw6t3hEEIODYRc')
            ->withData(json_encode($data))
            ->withContentType('application/json')
            ->post();

        echo '<img src="data:image/jpg;base64,'. $base64Image .'" />';

        $result = json_decode($r,true);
        $guess = '';

        if(isset($result['responses'])){
            foreach($result['responses'][0]['labelAnnotations'] as $ret){
                if($ret['score'] > 0.80){
                    $guess .= $ret['description'].',';
                }
            }

            $x = explode(',',$guess);
            unset($x[count($x) - 1]);

            dd($x);

        }else{
            dd($result);
        }

    }

}
