<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $token = $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $user['token'] = $token;
        return response()->json($user, 200);
    }

    public function login(Request $request)
    {
        
        if ($request->email != null) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $token = $user->createToken('LaravelSanctumAuth')->plainTextToken;
                
                $user['token'] = $token;

                $updateUser = User::where('email', $request->email)->first();
                $updateUser->remember_token = $request->fcmToken;
                $updateUser->save();
                
                return response()->json($user, 200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }     
        }else{
            $user = User::where('phone', $request->phone)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $user->remember_token = $request->fcmToken;
            $user->save();
                
            $token = $user->createToken('LaravelSanctumAuth')->plainTextToken;
            $user['token'] = $token;
            return response()->json($user, 200);
        }
    
    }
    public function logout(Request $request)
    { 
      $user = User::where('email', $request->email)->first();
      $user->remember_token = null;
      $user->save();
    }

    public function userDetails()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function setFcm($request)
    {
        $user = User::where('id', $request->id)->first();
        $user->remember_token = $request->fcmToken;
        $user->save();
    }
    public function changePass(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if(Hash::check($request->old, $user->password) && $request->pass == $request->confirm){
            $user = User::where('id', $request->id)->first();
            $user->password = Hash::make($request->pass);
            $user->save();
            return 1;
        }else{
            return 0;
        }
    }
    public function changeProfile(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $user = User::where('id', $request->id)->first();
        $user->imageUrl = $imageName;        
        $user->save();        
        return $user;
    }
}
