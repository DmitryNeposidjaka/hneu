<?php

namespace App\Services;


class MoodleClient
{

    private static $token;
    private static $url;

    /**
     * @var string
     */
    private static $connection;

    public function __construct()
    {
        self::use(config('moodleClient.default_connection'));
    }

    /**
     * @param $url
     * @param $token
     */
    private static function registerClient($url, $token): void
    {
        self::$token = $token;
        self::$url = $url;
    }

    public static function loginStudent($username, $password)
    {
        $service = 'moodle_mobile_app';

        $ch = curl_init(self::$url . '/login/token.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, compact('username', 'password', 'service'));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true, JSON_THROW_ON_ERROR);
    }

    public static function getUserCourses($userId)
    {
        $service = 'moodle_mobile_app';
        $params = [
            'wstoken' => self::$token,
            'wsfunction' => 'core_enrol_get_users_courses',
            'moodlewsrestformat' => 'json',
            'userid' => $userId
        ];
        $ch = curl_init(self::$url . '/webservice/rest/server.php?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true, JSON_THROW_ON_ERROR);
    }

    public static function getUser($username)
    {
        $service = 'moodle_mobile_app';
        $params = [
            'wstoken' => self::$token,
            'wsfunction' => 'core_user_get_users',
            'moodlewsrestformat' => 'json',
            'criteria[0][key]' => 'username',
            'criteria[0][value]' => $username,
        ];
        $ch = curl_init(self::$url . '/webservice/rest/server.php?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true, JSON_THROW_ON_ERROR);

        return $data['users'][0]?? null;
    }

    /**
     * @param string $connection
     * @throws \Exception
     */
    public static function use(string $connection)
    {
        self::$connection = $connection;
        self::registerClient(
            config("moodleClient.connections.{$connection}.url"),
            config("moodleClient.connections.{$connection}.token"));

    }

    /**
     * @return string
     */
    public static function getConnectionName()
    {
        return self::$connection;
    }

    public function __invoke($connection)
    {
        self::use($connection);
    }
}