<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $students = Student::query()->orderBy('name')->get();

        return view('admin.profile', compact('user', 'students'));
    }

    public function create(): View
    {
        return view('admin.students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['nullable', 'string', 'max:100'],
            'rombel' => ['required', 'string', 'max:100'],
            'rayon' => ['required', 'string', 'max:100'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'skills' => ['nullable', 'string', 'max:1000'],
            'interests' => ['nullable', 'string', 'max:1000'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ], [
            'photo.max' => 'Ukuran file foto tidak boleh lebih dari 5 MB.',
            'photo.image' => 'File harus berupa gambar (JPG, PNG, WebP).',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        Student::create($data);

        return redirect()->route('admin.students.index')->with('status', 'Data siswa baru berhasil ditambahkan.');
    }

    public function edit(Student $student): View
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['nullable', 'string', 'max:100'],
            'rombel' => ['required', 'string', 'max:100'],
            'rayon' => ['required', 'string', 'max:100'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'skills' => ['nullable', 'string', 'max:1000'],
            'interests' => ['nullable', 'string', 'max:1000'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ], [
            'photo.max' => 'Ukuran file foto tidak boleh lebih dari 5 MB.',
            'photo.image' => 'File harus berupa gambar (JPG, PNG, WebP).',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('admin.students.index')->with('status', 'Data siswa "'.$student->name.'" berhasil diperbarui.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $name = $student->name;
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with('status', 'Data siswa "'.$name.'" berhasil dihapus.');
    }
}
