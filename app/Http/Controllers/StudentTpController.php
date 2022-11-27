<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentTpRequest;
use App\Http\Requests\UpdateStudentTpRequest;
use App\Models\Professeur;
use App\Models\Student;
use App\Models\StudentTp;
use App\Models\Tp;
use Carbon\Carbon;

class StudentTpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        return view('students.tps.index', [
            'tps' => StudentTp::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        return view('students.tps.create', [
            'tps'    => $student->getTps(),
            'student'=> $student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student, StoreStudentTpRequest $request)
    {
        $student->tps()->attach(Tp::find($request->tp_id), [
            'date_soumission' => Carbon::now(),
            'url'             => $request->file('tp')->store('students/tps', 'public')
        ]);
        return $this->index($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentTp $studentTp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentTp $studentTp)
    {
        return view('students.tps.edit', [
            'tps'    => $studentTp->student->getTps(),
            'studentTp'=> $studentTp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentTpRequest $request, StudentTp $studentTp)
    {
        $studentTp->update($request->getStudentTpPayloads());
        return $this->index($studentTp->student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentTp $studentTp)
    {
        $studentTp->delete();
        return redirect()->back();
    }
}
