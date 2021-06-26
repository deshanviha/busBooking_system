<?php

namespace App\Http\Controllers;

use App\Models\superAdmin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class userController extends Controller
{
    public function register(Request $request){
        $fields =$request->validate([

           'name'=>'required|string|',
           'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'

        ]);

//check user
        if('name' === "admin||Admin") {

            $user = User::create([

                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password'])

            ]);

            $token = $user->createToken('userToken')->plainTextToken;

        }else{

            $user = superAdmin::create([

                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password'])

            ]);

            $token = $user->createToken('adminToken')->plainTextToken;

        }

        $response = [
            'user' => $user,
            'token' => $token

        ];

        return response ($response, 201);

    }
//user logout
    public function logout(Request $request){

        auth()->user()->tokens()->delete();

        return[

            'message'=> 'log out'

        ];

    }




    public function login(Request $request){
        $fields =$request->validate([

            'email'=>'required|string',
            'password'=>'required|string'

        ]);

        //email checking
        $user = User::where('email', $fields['email'])->first();

        //password verification
        if(!$user || !Hash::check($fields['password'], $user->password)){

            return response([

                'message'=>"Wrong user name or password"
            ], 401);

        }

        $token = $user->createToken('bustoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token

        ];

        return response ($response, 201);

    }

    //change password

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id)
    {

        $fields=$request->validate([


            'password'=>'required|string|confirmed'

        ]);


        $user = User::find($id);
        $user -> update([

            'password'=> bcrypt($fields['password'])

        ]);

        return response([

           'message'=>"Password change successfully"
        ]);
    }

//password rest function
    public function reset() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }


}
