<?php

namespace App\Http\Controllers\Student;


use App\Facades\MarksFormatter;
use App\Facades\ScheduleFormatter;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
use App\Services\CommonHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct()
    {
        $this->user = \Auth::user();
    }

    public function getMe()
    {
        return \Auth::user();
    }

    public function getCourses()
    {
        if (!Cache::has('courses_' . $this->user->moodle_id)) {
            \MoodleClient::setToken($this->user->moodle_token);
            $courses = \MoodleClient::getUserCourses($this->user->moodle_id);
            $coursesFilledSummary = CommonHelper::fillEmptyCourseSummary($courses);
            $coursesWithFiles = CommonHelper::appendFilesToCourses($coursesFilledSummary);
            $coursesWithThumbnail = CommonHelper::appendThumbnailToCourses($coursesWithFiles);
            Cache::put('courses_' . $this->user->moodle_id,
                $coursesWithThumbnail,
                3600);
        }

        return Cache::get('courses_' . $this->user->moodle_id);
    }

    public function getProducts()
    {
        return Product::with('categories')->get()->each(function (Product $product) {
            return $product->append(['is_user_liked']);
        });
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

    public function getSchedule(Request $request)
    {
        $this->validate($request, [
            'week' => 'required|integer|min:1|max:58'
        ]);
        //TODO add caching
        if ($this->user->group) {
            $response = \CommonClient::getGroupScheduleByWeek($this->user->group[0], $request->week, $this->user->student_sid);
            $schedule = ScheduleFormatter::getData($response);
            return response()->json($schedule);
        } else {
            Log::channel('user')->debug("A user {$this->user->id} has no group! ");
            return response()->json(['massage' => 'You have no groups!']);
        }
    }

    public function getMarks()
    {
        $response = \CommonClient::getUserMarks($this->user->student_sid);
        $formatted = MarksFormatter::getData($response);
        return response()->json($formatted);
    }

    public function like(Request $request)
    {
        $changes = $this->user->like($request->entity)->toggle($request->model);
        $result = empty($changes['detached']);
        return response()->json(['result' => $result]);
    }
}