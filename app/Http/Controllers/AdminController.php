<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['dashboard', 'logout']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $students = Student::withCount('subscriptions')->get();
        $classes = StudentClass::withCount(['subscriptions','students'])->get();
        $subscriptions = Subscription::count();

        return view('admin.dashboard', compact('students', 'classes', 'subscriptions'));
    }


    public function classes()
    {
        $classes = StudentClass::all();
        return view('admin.classes', compact('classes'));
    }


    public function students()
    {
        $students = Student::with('subscriptions.class')->get();
        return view('admin.students', compact('students'));
    }
}
