<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;

class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(2);
        return $this->success($students,'all_students');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'course' => 'required',
            'address' => 'required',
        ]);
 
        if ($validator->fails()) {
            return $this->error([],[],$validator->errors(),config('http_status.validation_error'));
        }
        $students = new Student;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->age = $request->age;
        $students->course = $request->course;
        $students->address = $request->address;
        $students->save();
        return $this->success($students);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $data = new StudentResource($student);
        return $this->success($data);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        {
            $students = Student::where('id' , $id)->first();
            return view('edit' , compact('students'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'course' => 'required',
            'address' => 'required',
        ]);
 
        if ($validator->fails()) {
            return $this->error([],[],$validator->errors(),config('http_status.validation_error'));
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->course = $request->course;
        $student->address = $request->address;
        $student->update();
        return $this->success($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::where('id' , $id)->first();
        $students->delete();
        return response()->json([
            'data' => []
        ] ,200);
    }
}
