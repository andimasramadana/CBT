<?php

namespace Database\Seeders;

use App\Models\DutySchedule;
use Illuminate\Database\Seeder;

class DutyScheduleSeeder extends Seeder
{
    public function run(): void
    {
        DutySchedule::query()->delete();

        $schedules = [
            ['day' => 'Senin',  'order' => 1, 'students' => ['Nesya', 'Maurida', 'Aldawiyah', 'Gilang', 'M. Ridho', 'M. Sidqi', 'Aisyh Dianda']],
            ['day' => 'Selasa', 'order' => 2, 'students' => ['Alizya', 'Jihanita', 'Gibran', 'Naufal', 'Saffa Nashwa', 'Kiandra', 'Mayang']],
            ['day' => 'Rabu',   'order' => 3, 'students' => ['M. Yurizki', 'Vadli Arrahman', 'Qaireen', 'A. Luthfi Nizam', 'Farrel', 'M. Luthfi', 'M. Rezky']],
            ['day' => 'Kamis',  'order' => 4, 'students' => ['Fujiyani S', 'Zalva', 'Fadillah M', 'Nazry Ilyas', 'Rusya Jabr', 'M. Kairo', 'Azka']],
            ['day' => 'Jumat',  'order' => 5, 'students' => ['Kalista', 'Teuku adhilla', 'M. Kadafi', 'M. Fakhri Mubaraok', 'Dzakwan', 'Shaffa Azzahra', 'Andimas']],
        ];

        foreach ($schedules as $schedule) {
            DutySchedule::create($schedule);
        }
    }
}
