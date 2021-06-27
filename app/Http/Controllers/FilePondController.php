<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class FilePondController extends Controller
{
    public function process(Request $request)
    {
        // dd($request->file('filepond')->getClientOriginalName());

        //*filepath and file name should be maybe user_id then property_id then maybe time, should also use mimetype as extension...also change test
        $locationID = date('Y-m-d H:i:s').'_'.Str::random(5);

        $path = $request->file('filepond')
                    ->storeAs('filepond/tmp/'.$locationID, $request->file('filepond')->getClientOriginalName(), 'public' );
        // dd($path);
        return $locationID;
    }
}
