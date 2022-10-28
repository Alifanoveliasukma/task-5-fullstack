<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        //validasi
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        //input data user ke database
        $user = User::create($input);
        //membuat token
        
        $success['token'] =  $user->createToken('Personal Access Token')->accessToken;
        $success['name']  = $user->name;
 
        return redirect('/');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'password' => 'required',
        ]);
         
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $user = Auth::user();
            $success['name']  = $user->name;
            $tokenResult =  $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if($request->remember_me){
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
            $token->save();
 
            return response()->json([
                'name'=>$user,
                'access_token'=>$tokenResult->accessToken,
                'token_type' => 'Bearer', 
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(['massage'=>'sucessfully logout'],200);
    }
    
}
