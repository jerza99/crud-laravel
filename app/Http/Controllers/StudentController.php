<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Obtener todos los estudiantes
        $students = Student::all();
        // Retornar a la vista con los valores obtenidos
        return view('students.index', compact('students'));

        // Algunas formas de redireccionar
        // return view('students.index')->with('students', $students);
        // return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        // Devolver al avista
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        // Validar los campos
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1'
        ]);

        // Capturar todos los datos
        Student::create($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){

        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){

        // Validar los campos
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1'
        ]);

        // Buscar estudiante
        $student = Student::findOrFail($id);

        // Actualizar estudiante
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){

        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');

    }
}
