<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn'           => 'required|unique:students,nisn|max:20',
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'nullable|string|max:100',
            'tanggal_lahir'  => 'nullable|date',
            'alamat'         => 'nullable|string',
            'no_telp'        => 'nullable|string|max:20',
            'email'          => 'nullable|email|unique:students,email',
            'kelas'          => 'nullable|string|max:50',
            'jurusan'        => 'nullable|string|max:100',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'      => 'boolean',
        ]);

        $validated['added_by'] = auth()->id();

        // Upload foto kalau ada
        // Upload foto kalau ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/students'), $fileName);

            $validated['foto'] = 'uploads/students/' . $fileName;
        }


        Student::create($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'nisn'           => 'required|max:20|unique:students,nisn,' . $student->id,
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'nullable|string|max:100',
            'tanggal_lahir'  => 'nullable|date',
            'alamat'         => 'nullable|string',
            'no_telp'        => 'nullable|string|max:20',
            'email'          => 'nullable|email|unique:students,email,' . $student->id,
            'kelas'          => 'nullable|string|max:50',
            'jurusan'        => 'nullable|string|max:100',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'      => 'boolean',
        ]);

        $validated['added_by'] = auth()->id();

        // kalau ada foto baru
        // kalau ada foto baru
        if ($request->hasFile('foto')) {
            // hapus foto lama kalau ada
            if ($student->foto && file_exists(public_path($student->foto))) {
                unlink(public_path($student->foto));
            }

            // simpan foto baru
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/students'), $fileName);

            $validated['foto'] = 'uploads/students/' . $fileName;
        }


        $student->update($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        // Hapus foto kalau ada
        if ($student->foto && file_exists(public_path($student->foto))) {
            unlink(public_path($student->foto));
        }

        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Data siswa berhasil dihapus.');
    }
}
