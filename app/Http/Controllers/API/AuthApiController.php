<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Lecturer;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            "name"=>"required|max:55",
            "email" =>"required|max:55",
            "imei"=>"required",
            "password"=>"required"
        ]);
        $user = User::create([
            'name'=> $validatedData['name'],
            'email'=> $validatedData['email'],
            'imei'=>$validatedData['imei'],
            'password'=> Hash::make($validatedData['password'])
        ]);

        if ($request->state == "student") {
            $user->student()->create([
                'nim'=>$request->nim
            ]);
        } else {
            $user->lecturer()->create([
                'nip'=>$request->nip
            ]);
        }

        $token = $user->createToken('authToken')->accessToken;

        $response = [
            'status'=>true,
            'data'=>[
                'token'=> $token,
                'user'=> $user,
            ],
            'message'=>'Berhasil regitrasi pengguna'
        ];
        return response()->json($response,200);

    }

    function login(Request $request)
    {
        $validatedLogin = $request->validate([
            "password"=>"required"
        ]);

        if ($request->nim) {
            $student = Student::where('nim',$request->nim)->first();

            if ($student && Hash::check($validatedLogin['password'], $student->user->password)) {
                auth()->loginUsingId($student->user_id);
            }else{
                return response(['message'=>'Invalid Credential'],404);
            }
        } else {
            $lecturer = Lecturer::where('nip',$request->nip)->first();
            if ($lecturer && Hash::check($validatedLogin['password'], $lecturer->user->password)) {
                auth()->loginUsingId($lecturer->user_id);
            }else{
                return response(['message'=>'Invalid Credential'],404);
            }
        }
        $success['token'] = auth()->user()->createToken('authToken')->accessToken;
        $response = [
            'user'=> auth()->user(),
            'success'=> $success,
            'message'=>'Berhasil mengambil data'
        ];
        return response()->json($response,200);
    }
}
