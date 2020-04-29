<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function show($id){
        return User::find($id);
    }

    public function store(Request $request){
        $user = User::where(['email' => $request->email])->get();
        
        if($user){
            return response()->json(['error' => 'Mail address already registered'], 400);
        }
        
        $user = User::create($request->all());
        return $user;
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['error' => 'User not found'], 400);
        }

        $user->fill($request->all());

        if(!$user->save()){
            return response()->json(['error' => 'Error on processing'], 500);
        }

        return $user;
    }

    public function destroy($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['error' => 'User not found'], 400);
        }

        if(!$user->destroy()){
            return response()->json(['error' => 'Error on processing'], 500);
        }

        return response()->json(['deleted' => true, 'status' => 'Deleted successfully'], 200);
    }
}
