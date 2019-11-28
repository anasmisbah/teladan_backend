<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return  view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();

        return  view('student.create',compact('classrooms'));
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

        $user->student()->create([
            'classroom_id'=>$request->classroom_id,
            'nim'=>$request->nim
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('student.edit',compact('student','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            "name"=>"required|max:55",
            "email" =>"required|max:55|unique:users,email,".$student->user->id,
            "nim"=>"required"
        ]);
        $avatar = $request->file('avatar');
        if ($request->file('avatar')) {
            if ($student->user->avatar && file_exists(storage_path('app/public/'.$student->user->avatar))) {
                Storage::delete('public/'.$student->user->avatar);
            }
            $file = $request->file('avatar')->store('avatars','public');
            $avatar = $file;
        }

        $student->update([
            'classroom_id'=>$request->classroom_id,
            'nim'=>$request->nim
        ]);

        $student->user()->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'avatar'=>$avatar,
        ]);

        if ($request->password) {
            $student->user()->update([
                'password'=> Hash::make($request->password),
            ]);
        }
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }
}
