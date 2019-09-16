<?php

namespace App\Services;

/**
 * Class CommonHelper
 * @package App\Services
 */
class CommonHelper
{
    /**
     * @param array $courses
     * @return array
     */
    public static function fillEmptyCourseSummary(array $courses)
    {
        $result = array_map(function($item) {
            if(empty($item['summary'])) {
                $item['summary'] = '<p>Пока нет контента.</p>';
            }
            return $item;
        }, $courses);
        return $result;
    }

    /**
     * @param array $courses
     * @return array
     */
    public static function appendFilesToCourses(array $courses) {
        $files = \MoodleClient::getCoursesFiles(array_column($courses, 'id'));
        $files = self::courceFilesChangeLink($files['resources']);
        foreach($courses as &$course) {
            $courseId = $course['id'];
            $currentCourseFiles = array_filter($files, function($file) use ($courseId) {
                return $file['course'] === $courseId;
            });
            $currentCourseFilesPrepared = array_map(function ($item) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'contentfiles' => $item['contentfiles']
                ];
            }, $currentCourseFiles);
            $course['files'] = $currentCourseFilesPrepared;
        }
        return $courses;
    }

    private static function courceFilesChangeLink(array $files)
    {
        foreach ($files as &$file) {
            foreach ($file['contentfiles'] as &$data) {
                $host = parse_url($data['fileurl'], PHP_URL_HOST);
                if($host === 'pns.hneu.edu.ua') {
                    $data['fileurl'] = preg_replace(
                        '~(https|http):\/\/pns.hneu.edu.ua~',
                        env('APP_URL').'/api/student',
                        $data['fileurl']);
                }
            }
        }
        return $files;
    }

}