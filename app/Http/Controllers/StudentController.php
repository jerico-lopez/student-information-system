<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'contact_number' => 'required|string|max:30',
            'age' => 'required|numeric|max:30',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:255',
            'course' => 'required|string|max:20'
        ]);

        Student::create($validated);

        return redirect('/students')->with('success', 'Student added successfuly');
    }

    public function show(Student $student){
        return view('students.show', compact('student'));
    }

    public function edit(Student $student){
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student){
        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'contact_number' => 'required|string|max:30',
            'age' => 'required|numeric|max:30',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'course' => 'required|string|max:20'
        ]);

        $student->update($validated);

        return redirect('/students')->with('success', 'Student updated successfuly');
    }

    public function delete(Student $student){
        return view('students.delete', compact('student'));
    }

    public function destroy(Student $student){
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted successfuly');
    }
}
