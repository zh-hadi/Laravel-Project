<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::latest()->get()
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:students,email'],
            'photo' => ['required', 'file', 'mimes:jpg,png,jpeg', 'max:10000']
        ]);

 
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{
            $photo = request()->file('photo');

            $path = $photo->store('photo');
            
            $student = new Student();

            $student->name = request()->name;
            $student->email = request()->email;
            $student->photo = $path;

            $student->save();


            return response()->json([
                'status' => 200,
                'success' => 'Student insert successfully!'
            ]);
        }
    }

    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $student
        ]);
    }


    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }


    public function update(Student $student)
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'min:3', 'string'],
            'email' => ['required', 'email', 'unique:students,email'.$student->id],
            'photo' => ['file', 'mimes:png,jpg,jpeg']
        ]);

        


        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else {
            $student->name = request()->name;
            $student->email = request()->email;
            if(request()->photo){
                $photo = request()->file('photo');
                $path = $photo->store('photo');
                Storage::delete($student->photo);
                $student->photo = $path;
            }
            $student->update();

            return response()->json([
                'status' => 200,
                'success' => 'Student update successfully!'
            ]);
        }
    }


    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'status' => 204,
            'success' => "Data delete successfully!"
        ]);
    }
}
