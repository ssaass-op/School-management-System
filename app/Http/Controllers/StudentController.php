<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('department')->when($request->search,function($query)use($request){
            $query->where('name','like','%'.$request->search.'%');
        })
        ->paginate(5)
        ->withQueryString();
            
        // dd($students);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'department_id' => 'required|exists:departments,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('students', 'public');
            $validated['image'] = $path;
        }


        Student::create($validated);
        return redirect()->route('students');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all();
        return view('students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'department_id' => 'required|exists:departments,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($student->image) {
                \Storage::disk('public')->delete($student->image);
            }
            $validated['image'] = $request->file('image')->store('students', 'public');
        }

        $student->update($validated);
        return redirect()->route('students');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students');
    }
}
