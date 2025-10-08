<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:teachers',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:teachers',
            'alamat' => 'required',
        ]);

        Teacher::create($request->all());
        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        $teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil dihapus');
    }
}
