<?php

namespace App\Http\Controllers\Dashboard\Information\Teachers;

use Illuminate\View\View;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Http\Controllers\Dashboard\DashboardController;

class TeacherController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard.information.teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.information.teachers.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher): View
    {
        return view('dashboard.information.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher): View
    {
        return view('dashboard.information.teachers.edit', compact('teacher'));
    }
}
