<?php

namespace App\Http\Controllers;

use App\Models\udastak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    //

    public function viewUdastak($id)
    {
        $data = DB::table('udastaks')->where('id', $id)->first();
        return view('doc')->with( compact('data')) ;

    }

    public function dowloadUdastak($file){
        return response()->download('img/'.$file);
    }
}
