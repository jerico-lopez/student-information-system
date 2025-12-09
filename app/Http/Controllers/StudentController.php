<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'contact_number' => 'required|string|max:30',
            'age' => 'required|numeric|max:30',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time().'.'.$request->photo->extension();
            $request->photo->storeAs('students', $filename, 'public');
            $validated['photo'] = $filename;
        }

        Student::create($validated);

        return redirect('/students')->with('success', 'Student added successfuly');
    }

    public function show(Student $student)
    {
        $courses = Course::all();

        return view('students.show', compact('student', 'courses'));
    }

    public function edit(Student $student)
    {
        $courses = Course::all();

        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'contact_number' => 'required|string|max:30',
            'age' => 'required|numeric|max:30',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // delete old image
            if ($student->photo && Storage::disk('public')->exists('students/'.$student->photo)) {
                Storage::disk('public')->delete('students/'.$student->photo);
            }

            // store new
            $filename = time().'.'.$request->photo->extension();
            $request->photo->storeAs('students', $filename, 'public');
            $validated['photo'] = $filename;
        }

        $student->update($validated);

        return redirect('/students')->with('success', 'Student updated successfuly');
    }

    public function delete(Student $student)
    {
        return view('students.delete', compact('student'));
    }

    public function destroy(Student $student)
    {
        if ($student->photo && Storage::disk('public')->exists('students/'.$student->photo)) {
            Storage::disk('public')->delete('students/'.$student->photo);
        }
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted successfuly');
    }
}
