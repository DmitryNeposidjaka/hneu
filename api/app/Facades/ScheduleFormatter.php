<?php

namespace App\Facades;


class ScheduleFormatter
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
        $schedule = [];
        $arrayData = self::xmlToArray($xmlData);
        foreach ($arrayData['schedule-elements'] as $scheduleElement) {
            foreach ($scheduleElement as $lesson) {
                if(isset($lesson['schedule-element'])) {
                    foreach($lesson['schedule-element'] as $innerLesson) {
                        try{
                            $lessonData = self::getLessonData($innerLesson);
                            $schedule[$innerLesson['@attributes']['day']][$innerLesson['@attributes']['start-epoch']] = $lessonData;
                        } catch(\ErrorException $exception) {
                            \Log::channel('schedule')->error(['message' => $exception->getMessage(), 'lesson' => json_encode($innerLesson)]);
                        }
                    }
                } else {
                    try{
                        $lessonData = self::getLessonData($lesson);
                        $schedule[$lesson['@attributes']['day']][$lesson['@attributes']['start-epoch']] = $lessonData;
                    } catch(\ErrorException $exception) {
                        \Log::channel('schedule')->error(['message' => $exception->getMessage(), 'lesson' => json_encode($lesson)]);
                    }
                }
            }
        }
        return $schedule;
    }

    private static function getLessonData($lesson) {
        return [
            'start_time' => $lesson['@attributes']['start'],
            'end_time' => $lesson['@attributes']['end'],
            'subject' => $lesson['subject'],
            'type' => $lesson['type'],
            'teacher' => $lesson['teacher']["display-name"],
            'room' => $lesson['room']["display-name"]
        ];
    }

}