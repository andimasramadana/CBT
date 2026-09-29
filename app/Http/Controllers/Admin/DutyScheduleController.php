<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DutySchedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DutyScheduleController extends Controller
{
    public function index(): View
    {
        $schedules = DutySchedule::orderBy('order')->get();

        return view('admin.duty-schedule.index', compact('schedules'));
    }

    public function create(): View
    {
        return view('admin.duty-schedule.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'day' => ['required', 'string', 'max:50'],
            'students' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
        ]);

        $data['students'] = $this->parseStudentsList($data['students']);

        DutySchedule::create($data);

        return redirect()->route('admin.duty-schedule.index')
            ->with('status', 'Jadwal piket hari '.$data['day'].' berhasil ditambahkan.');
    }

    public function edit(DutySchedule $dutySchedule): View
    {
        return view('admin.duty-schedule.edit', compact('dutySchedule'));
    }

    public function update(Request $request, DutySchedule $dutySchedule): RedirectResponse
    {
        $data = $request->validate([
            'day' => ['required', 'string', 'max:50'],
            'students' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
        ]);

        $data['students'] = $this->parseStudentsList($data['students']);

        $dutySchedule->update($data);

        return redirect()->route('admin.duty-schedule.index')
            ->with('status', 'Jadwal piket hari '.$data['day'].' berhasil diperbarui.');
    }

    public function destroy(DutySchedule $dutySchedule): RedirectResponse
    {
        $day = $dutySchedule->day;
        $dutySchedule->delete();

        return redirect()->route('admin.duty-schedule.index')
            ->with('status', 'Jadwal piket hari '.$day.' berhasil dihapus.');
    }

    /**
     * Parse daftar nama yang dipisahkan baris baru menjadi array bersih.
     *
     * @return array<string>
     */
    private function parseStudentsList(string $raw): array
    {
        return collect(explode("\n", $raw))
            ->map(fn ($line) => trim($line))
            ->filter(fn ($line) => $line !== '')
            ->values()
            ->all();
    }
}
