<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.students', [
            'title' => 'Étudiants',
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createStudent', [
            'title' => 'Ajouter étudiant',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request, Student $student)
    {
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->email = $request->email;
        $student->telephone = $request->telephone;
        $student->department = $request->department;
        $student->payments = $request->payments;
        $student->save();
        $student = Student::where('email', '=', $student->email)->first();

        $schoolFees = 1100000;
        for($i = 0; $i < $request->payments; $i++){
            Payment::create([
                'amount' => $schoolFees/$request->payments,
                'id_students' => $student->id,
                'status' => false,
            ]);
        }
        return redirect()->route('admin.students');
    }

    /**
     * Display the specified resource.
     */
    public function AdminShow(Student $student)
    {
        $payments = Payment::where('id_students', '=', $student->id)->get();
        return view('admin.showStudent', [
            'title' => 'Étudiant',
            'student' => $student,
            'payments' => $payments,
        ]);
    }

    public function SupervisorShow(Student $student)
    {
        $payments = Payment::where('id_students', '=', $student->id)->get();
        return view('supervisor.showStudent', [
            'title' => 'Étudiant',
            'student' => $student,
            'payments' => $payments,
        ]);
    }
    public function AccountantShow(Student $student)
    {
        $payments = Payment::where('id_students', '=', $student->id)->get();
        return view('accountant.showStudent', [
            'title' => 'Étudiant',
            'student' => $student,
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
