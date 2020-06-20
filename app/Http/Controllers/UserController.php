<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    //

    //
    public function index(){
        $users= User::paginate(10);
        return view('backend.user_management.user_index',compact('users'));
    }

    public function create(){
        return view('backend.user_management.user_create');
    }
    public function update($user_id){
        $user=User::find($user_id);
        return view('backend.user_management.user_create',compact('user'));
    }
    public function store(Request $request){

        $user=User::create([
            'name'=>$request->name,
           // 'username'=>$request->username,
            'email'=>$request->email,
            'typeId'=>$request->role,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('user.index');
    }

    public function updateStore(Request $request,$user_id){
        $user=User::find($user_id);
        $user->update([
            'name'=>$request->name,
            //'username'=>$request->username,
            'email'=>$request->email,
            'typeId'=>$request->role,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('user.index');
    }


    public function delete($user_id){
        $user=User::find($user_id);
        $user->delete();

        return redirect()->back()->with('success', 'user berhasil dihapus');

    }
}

