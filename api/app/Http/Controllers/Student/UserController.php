<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function getMe()
    {
        return \Auth::user();
    }

    public function getCourses()
    {
        if(!Cache::has('courses_' . \Auth::user()->moodle_id)){
            \MoodleClient::setToken(\Auth::user()->moodle_token);
            Cache::put('courses_' . \Auth::user()->moodle_id, \MoodleClient::getUserCourses(\Auth::user()->moodle_id), 3600);
        }

        return Cache::get('courses_' . \Auth::user()->moodle_id);
    }
}