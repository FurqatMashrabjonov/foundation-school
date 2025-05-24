<?php

namespace App\Http\Controllers;

use App\Enums\ApplicationStatus;
use App\Enums\CourseType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApplicationController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:applications,phone'],
            'course_type' => ['required', 'string', 'max:255', Rule::in(CourseType::getValues())],
        ]);

        $validated['status'] = ApplicationStatus::NEW;

        $application = \App\Models\Application::create($validated);

        return response()->json([
            'success' => true,
        ]);
    }
}
