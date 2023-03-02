<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function block()
    {
        //
        
        $users=User::with('profiles')->where('role_id','=','3')
                                    ->where('status','=','inactive')
                                     ->latest()->get();
        return view('dashboard.doctor.block',compact('users'));

    }
    public function pending()
    {
        //
        
        $users=User::with('profiles')->where('role_id','=','3')
                                    ->where('status','=','pending')
                                     ->latest()->get();
        return view('dashboard.doctor.pending',compact('users'));

    }
    public function index()
    {
        //
        $users=User::with('profiles')->where('role_id','=','3')
                                    ->where('status','=','active')
                                     ->latest()->get();
        return view('dashboard.doctor.index',compact('users'));
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
