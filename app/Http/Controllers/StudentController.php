<?php

namespace App\Http\Controllers;

use App\Models\DutySchedule;
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
        $rows = DutySchedule::orderBy('order')->get();

        $schedule = [];
        foreach ($rows as $row) {
            $schedule[$row->day] = $row->students;
        }

        $today = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
        ][Carbon::now()->format('l')] ?? null;

        return view('duty-schedule.index', compact('schedule', 'today'));
    }
}
