<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use App\Services\CommonHelper;
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
            $courses = \MoodleClient::getUserCourses(\Auth::user()->moodle_id);
            $coursesFilledSummary = CommonHelper::fillEmptyCourseSummary($courses);
            $coursesWithFiles = CommonHelper::appendFilesToCourses($coursesFilledSummary);
            Cache::put('courses_' . \Auth::user()->moodle_id,
                $coursesWithFiles,
                3600);
        }

        return Cache::get('courses_' . \Auth::user()->moodle_id);
    }

    public function getProducts()
    {
        return Product::with('categories')->get();
    }

    public function getMessages()
    {
        return News::message()->with('categories')->get();
    }

    public function getArticles()
    {
        return News::article()->with('categories')->get();
    }

    public function getAdvertising()
    {
        return News::advertising()->with('categories')->get();
    }
}