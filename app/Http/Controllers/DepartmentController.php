<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        //dd($departments);
        return view('departments.index', compact('departments'));
    }
    public function create(){
        return view('departments.create');
    }
    public function store(Request $request){
        Department::create($request->all());
        return redirect()->route('departments');
    }
}
