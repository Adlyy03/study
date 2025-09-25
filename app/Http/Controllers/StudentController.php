<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn'           => 'required|unique:students,nisn|max:20',
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'nullable|string|max:100',
            'tanggal_lahir'  => 'nullable|date',
            'alamat'         => 'nullable|string',
            'no_telp'        => 'nullable|string|max:20',
            'email'          => 'nullable|email|unique:students,email',
            'kelas'          => 'nullable|string|max:50',
            'jurusan'        => 'nullable|string|max:100',
            'is_active'      => 'boolean',
        ]);

        $data = $request->all();
        $data['added_by'] = auth()->id();

        Student::create($data);

        return redirect()->route('students.index')
                         ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nisn'           => 'required|max:20|unique:students,nisn,' . $student->id,
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'nullable|string|max:100',
            'tanggal_lahir'  => 'nullable|date',
            'alamat'         => 'nullable|string',
            'no_telp'        => 'nullable|string|max:20',
            'email'          => 'nullable|email|unique:students,email,' . $student->id,
            'kelas'          => 'nullable|string|max:50',
            'jurusan'        => 'nullable|string|max:100',
            'is_active'      => 'boolean',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Data siswa berhasil dihapus.');
    }
}
