<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;

class APIController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $students = Student::with('subscriptions.class')->get();

        return response()->json($students);
    }
}
