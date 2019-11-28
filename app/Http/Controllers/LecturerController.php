<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return  view('lecturer.index',compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|max:55",
            "email" =>"required|max:55",
            "password"=>"required"
        ]);
        $avatar='';
        if ($request->file('avatar')) {
            $avatar = $request->file('avatar')->store('avatars','public');
        }


        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'avatar'=>$avatar,

        ]);

        $user->lecturer()->create([
            'nip'=>$request->nip
        ]);

        return redirect()->route('lecturer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturer.edit',compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            "name"=>"required|max:55",
            "email" =>"required|max:55|unique:users,email,".$lecturer->user->id,
            "nip"=>"required"
        ]);
        $avatar = $request->file('avatar');
        if ($request->file('avatar')) {
            if ($lecturer->user->avatar && file_exists(storage_path('app/public/'.$lecturer->user->avatar))) {
                Storage::delete('public/'.$lecturer->user->avatar);
            }
            $file = $request->file('avatar')->store('avatars','public');
            $avatar = $file;
        }

        $lecturer->update([
            'nip'=>$request->nip
        ]);

        $lecturer->user()->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'avatar'=>$avatar,
        ]);

        if ($request->password) {
            $lecturer->user()->update([
                'password'=> Hash::make($request->password),
            ]);
        }
        return redirect()->route('lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturer.index');
    }
}
