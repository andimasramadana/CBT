<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()
            ->orderByRaw('LOWER(name) asc')
            ->get();

        return view(
            'stundents.index',
            compact('students')
        );
    }

    public function show(Student $student)
    {
        return view(
            'stundents.show',
            compact('student')
        );
    }

    public function dutySchedule()
    {
        $schedule = [
            'Senin' => ['Nesya', 'Maurida', 'Aldawiyah', 'Gilang', 'M. Ridho', 'M. Sidqi', 'Aisyh Dianda'],
            'Selasa' => ['Alizya', 'Jihanita', 'Gibran', 'Naufal', 'Saffa Nashwa', 'Kiandra', 'Mayang'],
            'Rabu' => ['M. Yurizki', 'Vadli Arrahman', 'Qaireen', 'A. Luthfi Nizam', 'Farrel', 'M. Luthfi', 'M. Rezky'],
            'Kamis' => ['Fujiyani S', 'Zalva', 'Fadillah M', 'Nazry Ilyas', 'Rusya Jabr', 'M. Kairo', 'Azka'],
            'Jumat' => ['Kalista', 'Teuku adhilla', 'M. Kadafi', 'M. Fakhri', 'Dzakwan', 'Shaffa Azzahra', 'Andimas'],
        ];

        $today = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
        ][Carbon::now()->format('l')] ?? null;

        $studentProfiles = Student::query()
            ->whereIn('name', collect($schedule)->flatten()->all())
            ->get()
            ->keyBy('name');

        return view('duty-schedule.index', compact('schedule', 'today', 'studentProfiles'));
    }
}
