<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MoodleClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'moodleClient';
    }

    /** Call MoodleClient invoke method and return same MoodleClient class
     * @param $connection
     * @return $this
     */
    public function __invoke($connection)
    {
        parent::__invoke($connection);
        return $this;
    }

    /**
     * @param string $connection
     * @return \App\Services\MoodleClient
     */
    public static function use(string $connection)
    {
        parent::use($connection);
        return self::$app->moodleClient;
    }
}