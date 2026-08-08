<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Department;

class DepartmentTeacherController extends Controller
{
    public function index()
    {
        $assignments = Department::with('teachers')->get();
        return view('department_teacher.index', compact('assignments'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $departments = Department::all();
        return view('department_teacher.create', compact('teachers', 'departments'));
    }

    public function store(Request $request)
    {
       //dd($request->all());
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'teacher_id'    => 'required|exists:teachers,id',
        ]);

        $department = Department::findOrFail($validated['department_id']);
        $department->teachers()->attach($validated['teacher_id']);
        return redirect()->route('department_teacher.index');
    }

    public function edit($id)
    {
        // $id here is the department_has_teachers row id
        $row = \DB::table('department_has_teachers')->where('id', $id)->firstOrFail();
        $teachers = Teacher::all();
        $departments = Department::all();
        return view('department_teacher.edit', compact('row', 'teachers', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'teacher_id'    => 'required|exists:teachers,id',
        ]);

        \DB::table('department_has_teachers')->where('id', $id)->update([
            'department_id' => $validated['department_id'],
            'teacher_id'    => $validated['teacher_id'],
            'updated_at'    => now(),
        ]);

        return redirect()->route('department_teacher.index');
    }

    public function destroy($id)
    {
        \DB::table('department_has_teachers')->where('id', $id)->delete();
        return redirect()->route('department_teacher.index');
    }
}
