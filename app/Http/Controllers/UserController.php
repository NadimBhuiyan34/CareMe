<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function block()
    {
        //
        
        $users=User::with('profiles')->where('role_id','=','4')
                                    ->where('status','=','inactive')
                                     ->latest()->get();
        return view('dashboard.user.block',compact('users'));

    }
    public function pending()
    {
        //
        
        $users=User::with('profiles')->where('role_id','=','4')
                                    ->where('status','=','pending')
                                     ->latest()->get();
        return view('dashboard.user.pending',compact('users'));

    }
    public function index()
    {
        //
        
        $users=User::with('profiles')->where('role_id','=','4')
                                     ->where('status','=','active')
                                    ->latest()->get();
        return view('dashboard.user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.user.register');

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
         // Validate the user input
         $user_id=auth()->user()->id;
           
         if($user_id==1)
         {
             $status="active";
         }
         else
         {
            $status="pending";
         }
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);

        // Create a new user object and hash the password
        $user = new User();
        $email= $validatedData['email'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role_id = $validatedData['role'];
        $user->status = $status;
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
    if($request->role==3)
    {
        return view('dashboard.doctor.profile_doctor')->with('success', 'User account register.')->with('email', $email);
    }
    else
    {
        return view('dashboard.user.profile_user')->with('success', 'User account register.')->with('email', $email);
    }
   


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
        $user_update = User::findOrFail($id);
        $user_update->update([
            'Name' => $request->name??$user_update->name,
            'email' => $request->email??$user_update->email,
            'status' => $request->status??$user_update->status,
            'role_id' => $request->role_id ??$user_update->role_id
        ]);
        if($request->status=="active")
        {
            return redirect()->back()->withMessage('Account Active'); 
        }
        else
        {
            return redirect()->back()->withMessage('Account Block');
        }
        
            
        
        
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
