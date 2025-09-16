<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminClassController extends Controller
{
    public function index(): View
    {
        $classes = StudentClass::get();
        return view('admin.class.index', compact('classes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'teacher' => 'required|string',
            'grade' => 'required|string',
            'subject' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);


        StudentClass::create($data);

        return redirect()->route('admin.classes.index')->with('success', 'Class created!');
    }

    public function create(): View
    {
        return view('admin.class.create');
    }

    public function show(StudentClass $class): View
    {
        return view('admin.class.create', [
            'class' => $class,
        ]);
    }

    public function update(Request $request, StudentClass $class): RedirectResponse
    {

        $data = $request->validate([
            'teacher' => 'required|string',
            'grade' => 'required|string',
            'subject' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'time' => 'nullable',
        ]);


        $class->update($data);


        return redirect()->route('admin.classes.index')->with('success', 'Class updated!');
    }


    public function destroy(StudentClass $class): RedirectResponse
    {
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}
