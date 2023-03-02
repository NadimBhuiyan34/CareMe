<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\DoctorProfile;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctor_profile(Request $request)
    {
        //
  //
  $email=$request->user_id;
  $user_id=User::where('email','=',$email)->value('id');

    if($file=$request->file('picture')){
        $filename=date('dmY').time().'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/doctor_profile'),$filename);
    }



        DoctorProfile::create([
            'user_id'=>$user_id,
            'mobile'=>$request->mobile,
            'hqualification'=>$request->hqualification,
            'specility'=>$request->specility,
            'collage'=>$request->collage,
            'about'=>$request->about,
            'image'=>$filename??'profile.png',
        ]
       );
       return redirect()->route('doctors.index')->withMessage('Successfully submitted');
       
    }
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $email=$request->user_id;
      $user_id=User::where('email','=',$email)->value('id');

        if($file=$request->file('picture')){
            $filename=date('dmY').time().'.'.$file->getClientOriginalExtension();
            $file->move(storage_path('app/public/profile'),$filename);
        }
     
        Profile::create([
            'user_id'=>$user_id??$request->user_id,
            'mobile'=>$request->mobile,
            'datebirth'=>$request->date,
            'gender'=>$request->gender,
            'married'=>$request->married,
            'city'=>$request->city,
            'upazila'=>$request->upazila,
            'union'=>$request->union,
            'postcode'=>$request->postcode,
            'village'=>$request->village,
            'house'=>$request->house,
            'profession'=>$request->profession,
            'bio'=>$request->bio,
            'image'=>$filename??'profile.png',
        ]
       );
      
       return redirect()->back()->withMessage('Successfully submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(auth()->user()->role_id==3)
        {
            $profiles_doctors=DoctorProfile::where('user_id','=',$id)->get();
            if( $profiles_doctors->isEmpty())
            {
                return view('dashboard.profile.doctor_profile');
            }
            else
            {
                return view('dashboard.profile.index_doctor',compact('profiles_doctors')); 
            }
        }
        else{
            $profiles=Profile::where('user_id','=',$id)->get();
            if($profiles->isEmpty())
            {
                return view('dashboard.profile.update');
            }
            else
            {
                return view('dashboard.profile.index',compact('profiles'));
            }
        }
     
        
       
        
    // return view('profile', ['image' => $image]);
        // if($profiles->isEmpty() || $profiles_doctors->isEmpty())
        // {
        //     if(auth()->user()->role_id==3)
        //     {
        //         return view('dashboard.profile.doctor_profile');
        //     }
        //     else
        //     {
        //         return view('dashboard.profile.update');
        //     }
            
        // }
        // else{
        //     if(auth()->user()->role_id==3)
        //     {
        //         return view('dashboard.profile.index_doctor',compact('profiles_doctors')); 
        //     }
        //     else
        //     {
        //         return view('dashboard.profile.index',compact('profiles'));
        //     }
      
        // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
