<?php

namespace App\Http\Controllers;
use App\Models\sensordata;
 
use Illuminate\Http\Request;
 
use DataTables;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
   
        if(auth()->user()->role_id==1 || auth()->user()->role_id==2)
        {
            return view('admin');
        }
        else if(auth()->user()->role_id==3)
        {
            return view('doctor');
        }
        else
        {
            $data = sensordata::orderBy('id','DESC')->get();
      
            return view('patient',compact('data'));
        }


      
     }
    
   
    public function allData(){
        $data = sensordata::orderBy('id','DESC')->get();
        return response()->json(['data'=>$data]);
    }

}
