<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class CommonClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'commonClient';
    }

    /** Call CommonClient invoke method and return same MoodleClient class
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
     * @return \App\Services\CommonClient
     */
    public static function use(string $connection)
    {
        parent::use($connection);
        return self::$app->commonClient;
    }
}