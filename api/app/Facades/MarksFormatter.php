<?php

namespace App\Facades;

use \DOMDocument;

class MarksFormatter
{
    public static function xmlToArray($xmlData)
    {
        $xml = simplexml_load_string($xmlData);
        $json = json_encode($xml);
        return json_decode($json,TRUE);
    }

    public static function getData($xmlData)
    {
        // [day => [lessons]]
        $arrayData = self::xmlToArray($xmlData);
        return isset($arrayData['rows'])? $arrayData['rows'] : [];
    }
}