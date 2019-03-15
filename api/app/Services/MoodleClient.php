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

        $ch = curl_init(self::$url.'/login/token.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, compact('username','password', 'service'));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true, JSON_THROW_ON_ERROR);
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