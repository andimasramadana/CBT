<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->get();

        return view(
            'achievements.index',
            compact('achievements')
        );
    }
}
