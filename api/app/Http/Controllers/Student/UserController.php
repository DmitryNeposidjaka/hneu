<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getMe()
    {
        return \Auth::user();
    }

    public function getCourses()
    {
        return \MoodleClient::getUserCourses(\Auth::user()->moodleId);
    }
}