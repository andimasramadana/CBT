<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();

        if ($user->is_admin) {
            $students = Student::query()->orderBy('name')->get();

            return view('admin.profile', compact('user', 'students'));
        }

        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->is_admin) {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
                'password' => ['nullable', 'string', 'min:3'],
                'profile_photo' => ['nullable', 'image', 'max:5120'],
            ], [
                'profile_photo.max' => 'Ukuran file foto profil tidak boleh lebih dari 5 MB.',
                'profile_photo.image' => 'File harus berupa gambar (JPG, PNG, WebP).',
            ]);

            if ($request->hasFile('profile_photo')) {
                if ($user->profile_photo) {
                    Storage::disk('public')->delete($user->profile_photo);
                }
                $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
            }

            if (! empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }

            $user->update($data);

            return back()->with('status', 'Data akun admin berhasil diperbarui.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'bio' => ['nullable', 'string', 'max:2000'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'whatsapp_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'max:5120'],
        ], [
            'profile_photo.max' => 'Ukuran file foto profil tidak boleh lebih dari 5 MB.',
            'profile_photo.image' => 'File harus berupa gambar (JPG, PNG, WebP).',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        $user->update($data);

        if ($user->student) {
            $user->student->update([
                'name' => $data['name'],
                'instagram_url' => $data['instagram_url'] ?? null,
                'whatsapp_url' => $data['whatsapp_url'] ?? null,
                'linkedin_url' => $data['linkedin_url'] ?? null,
                'photo' => $data['profile_photo'] ?? $user->student->photo,
                'bio' => $data['bio'] ?? null,
            ]);
        }

        return back()->with('status', 'Profil berhasil diperbarui.');
    }
}
