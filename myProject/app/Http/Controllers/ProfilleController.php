<?php

namespace App\Http\Controllers;

use App\Models\ENT;
use App\Models\School_certeficate;
use App\Models\udastak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilleController extends Controller
{
    //

    public function getProfile()
    {
        $student = DB::table('users')->where('id', Auth::id())->first();
        $udastak = DB::table('udastaks')->where('user_id', Auth::id())->first();
        $sch_cer = DB::table('school_certeficates')->where('user_id', Auth::id())->first();
        $ents = DB::table('e_n_t_s')->where('user_id', Auth::id())->first();

            return view('profile')
                ->with('user', auth()->user())
                ->with(compact('student'))
                ->with(compact('udastak'))
                ->with(compact('sch_cer'))
                ->with(compact('ents'));


    }

    public function postFullNameGenderPhoto(Request $request)
    {
        if ($request->input('gender')=="M"){
            $gender =true;
        }
        else{
            $gender = false;
        }
        $image =$request->file('file');
        $imageName =time().'.'.$image->extension();
        $image->move(public_path('img'),$imageName);
        DB::table('users')
            ->where('id', $request -> input('id'))
            ->update(array('full_name' =>$request -> input('full_name'),
                    'gender'=>$gender,
                    'photo' =>$imageName
                )
            );
        return redirect()->route('profile');
    }

    public function postUdastak(Request $request){
        $udastak = DB::table('udastaks')->where('user_id', Auth::id())->first();
        $image =$request->file('file');
        $imageName =time().'.'.$image->extension();
        $image->move(public_path('img'),$imageName);
        if($udastak){
            DB::table('udastaks')
                ->where('user_id', Auth::id())
                ->update(array('iin' =>$request -> input('iin'),
                        'birth_date' =>$request -> input('birth_date'),
                        'by_whom' =>$request -> input('by_whom'),
                        'pdf_udastak' =>$imageName,
                        'nationality'=> $request -> input('nationality')
                    )
                );
        }
        else{
            udastak::create([
                    'iin' =>$request -> input('iin'),
                    'birth_date' =>$request -> input('birth_date'),
                    'by_whom' =>$request -> input('by_whom'),
                    'pdf_udastak' =>$imageName,
                    'nationality'=> $request -> input('nationality'),
                    'user_id'=>Auth::id()
                ]
            );
        }
        return  redirect()->route('profile');


    }
    public function postSchCer(Request  $request){
        $school_certeficates = DB::table('school_certeficates')->where('user_id', Auth::id())->first();
        $image =$request->file('file');
        $imageName =time().'.'.$image->extension();
        $image->move(public_path('img'),$imageName);
        if($school_certeficates){
            DB::table('school_certeficates')
                ->where('user_id', Auth::id())
                ->update(array('avarage_point' =>$request -> input('avarage_point'),
                        'type' =>$request -> input('type'),
                        'school_name' =>$request -> input('school_name'),
                        'graduation_year' =>$request -> input('graduation_year'),
                        'region' =>$request -> input('region'),
                        'pdf_sch_cer' =>$imageName,
                        'user_id'=>Auth::id()

                    )
                );
        }
        else{
            School_certeficate::create([
                    'avarage_point' =>$request -> input('avarage_point'),
                        'type' =>$request -> input('type'),
                        'school_name' =>$request -> input('school_name'),
                        'graduation_year' =>$request -> input('graduation_year'),
                        'region' =>$request -> input('region'),
                        'pdf_sch_cer' =>$imageName,
                        'user_id'=>Auth::id()

                ]
            );
        }
        return  redirect()->route('profile');
    }

    public function postENTCer(Request $request){
        $total =$request -> input('reading') +$request -> input('math')+$request -> input('history')+$request -> input('subject_1_point')+$request -> input('subject_2_point');


        $e_n_t_s = DB::table('e_n_t_s')->where('user_id', Auth::id())->first();
        $image =$request->file('file');
        $imageName =time().'.'.$image->extension();
        $image->move(public_path('img'),$imageName);
        if($e_n_t_s){
            DB::table('e_n_t_s')
                ->where('user_id', Auth::id())
                ->update(array('reading' =>$request -> input('reading'),
                        'math' =>$request -> input('math'),
                        'history' =>$request -> input('history'),
                        'subject_1_name' =>$request -> input('subject_1_name'),
                        'subject_2_name' =>$request -> input('subject_2_name'),
                        'subject_1_point' =>$request -> input('subject_1_point'),
                        'subject_2_point' =>$request -> input('subject_2_point'),
                        'total' =>$total,
                        'tjk' =>$request -> input('tjk'),
                        'language' =>$request -> input('language'),
                        'pdf_ent' =>$imageName,
                        'user_id'=>Auth::id()

                    )
                );
        }
        else{
           ENT::create([
                   'reading' =>$request -> input('reading'),
                   'math' =>$request -> input('math'),
                   'history' =>$request -> input('history'),
                   'subject_1_name' =>$request -> input('subject_1_name'),
                   'subject_2_name' =>$request -> input('subject_2_name'),
                   'subject_1_point' =>$request -> input('subject_1_point'),
                   'subject_2_point' =>$request -> input('subject_2_point'),
                   'total' =>$total,
                   'tjk' =>$request -> input('tjk'),
                   'language' =>$request -> input('language'),
                   'pdf_ent' =>$imageName,
                   'user_id'=>Auth::id()

                ]
            );
        }
        return  redirect()->route('profile');

    }
}
