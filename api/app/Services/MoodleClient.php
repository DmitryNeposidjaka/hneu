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
        self::use(config('moddleClient.default_connection'));
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
        $ch = curl_init(self::$url.'/api/admin/login');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, compact($username,$password));
        $result = curl_exec($ch);

        return $result;
    }

    /**
     * @param string $connection
     * @throws \Exception
     */
    public static function use(string $connection)
    {
        self::$connection = $connection;
        self::registerClient(
            config("salesforce.connections.{$connection}.url"),
            config("salesforce.connections.{$connection}.token"));

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