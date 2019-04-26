<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($token = $this->attemptLogin($request)) {
            \MoodleClient::setToken($token);

            $user = $this->checkIfStudentExists($request);
            return $this->sendLoginResponse($user);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $result = \MoodleClient::loginStudent($username, $password);

        return $result['token'] ?? null;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function checkIfStudentExists(Request $request)
    {
        $username = $request->input('username');    //  TODO переделать
        $moodleUser = \MoodleClient::getUser($username);

        $user = null;
        if (!empty($moodleUser)) {
            list($lastName, $firstName) = explode(' ', $moodleUser['fullname']);
            $user = User::updateOrCreate([
                'username' => $moodleUser['username']
            ], [
                'username' => $moodleUser['username'],
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $moodleUser['email'],
                'lang' => $moodleUser['lang'],
                'moodle_id' => $moodleUser['id'],
                'student_id' => $moodleUser['idnumber'],
                'thumbnail' => $moodleUser['profileimageurl'],
                'moodle_token' => \MoodleClient::getToken(),
            ]);
            if ($user->wasRecentlyCreated) {
                \Bouncer::assign('student')->to($user);
            }
        }

        return $user;
    }

    protected function sendLoginResponse(User $user)
    {
        return response()->json(['token' => auth()->login($user)]);
    }
}
