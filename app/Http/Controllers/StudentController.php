<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use function Symfony\Component\Console\Helper\render;

class StudentController extends Controller
{
    public  function getImageUrl($request){
        $image=$request->file('image');
        $imageName=$image->getClientOriginalName();
        $directory='admin-image/student/';
        $image->move($directory,$imageName);
        return $directory.$imageName;
    }

    public function index()
    {
        return inertia::render('index', [
            'students' => Student::all()->map(function ($students) {
                return [
                    'id' => $students->id,
                    'name' => $students->name,
                    'department' => $students->department,
                    'roll' => $students->roll,
                    'reg' => $students->reg,
                    'phone' => $students->phone,
                    'image' => $students->image,
                ];
            }),
        ]);
    }

    public function create()
    {
        return Inertia::render('create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'department' => 'required|max:255',
            'roll' => 'required|unique:students',
            'reg' => 'required|unique:students|min:4',
            'phone' => 'required|unique:students|min:6|max:11',
        ]);
        $student=new Student();
        $student->name=$request->name;
        $student->department=$request->department;
        $student->roll=$request->roll;
        $student->reg=$request->reg;
        $student->phone=$request->phone;
        $student->image=$this->getImageUrl($request);
        $student->save();
        return Redirect::route('student.index');
    }

    public function edit(Student $student){
       return Inertia::render('edit',[
           'student'=>$student,
       ]);
    }
    public function update(Request $request, Student $student){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'department' => 'required|max:255',
            'roll' => 'required',
            'reg' => 'required|min:4',
            'phone' => 'required|min:6|max:12',
        ]);
        $student->update($validated);
        return Redirect::route('student.index');
    }
    public function show($id){
//        return $id;
        return Inertia::render('view',[
            'student'=>Student::findOrFail($id)
        ]);
    }
    public function destroy(Student $student){
        $student->delete();
        return Redirect::route('student.index');
    }
}
