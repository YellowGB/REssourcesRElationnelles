<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function show($id) {

        $course = Course::findOrFail($id);

        return response()->file(Storage::path('public/' . $course->file_uri));
    }
}
