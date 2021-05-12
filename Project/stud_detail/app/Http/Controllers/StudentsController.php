<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::latest()->paginate(5);

        return view('students.create',compact('students'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'stud_name' => 'required',
            'father_name' => 'required',
            'school' => 'required',
            'roll_no' => 'required',
            'class' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                        ->with('success','Student record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $stud = Student::findOrFail($id);
        $students = Student::latest()->paginate(5);
        // view('students.edit', compact('stud'));

        return view('students.edit',compact(['stud', 'students']))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
          'stud_name' => 'required',
          'father_name' => 'required',
          'school' => 'required',
          'roll_no' => 'required',
          'class' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
                        ->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();

        return redirect()->route('students.index')
                        ->with('success','Student record deleted successfully');
    }
}
