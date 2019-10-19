<?php

namespace App\Services;


use Illuminate\Support\Facades\Log;

class CommonClient
{

    public static function getUser($id)
    {
        $curl = curl_init();
        $url = config('commonClient.url');
        $query = http_build_query([
            'auth' => config('commonClient.auth'),
            'hid' => $id,
            'q' => 'studentbig'
        ]);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . '?' . $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::channel('commonDBlog')->error(['error' => "cURL Error #:" . $err, 'query' => $url . '?' . $query]);
        } else {
            return $response;
        }
    }

    public static function getGroupData($groupId)
    {
        return null;
        $curl = curl_init();
        $url = config('commonClient.url');
        $query = http_build_query([
            'auth' => config('commonClient.auth'),
            'sid' => $groupId,
            'q' => 'studentgroups'
        ]);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . '?' . $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::channel('commonDBlog')->error(['error' => "cURL Error #:" . $err, 'query' => $url . '?' . $query]);
        } else {
            return $response;
        }
    }

    public function getUserMarks($sid)
    {
        $curl = curl_init();
        $url = config('commonClient.url');
        $query = http_build_query([
            'auth' => config('commonClient.auth'),
            'sid' => $sid,
            'q' => 'studentreport'
        ]);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . '?' . $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::channel('commonDBlog')->error("cURL Error #:" . $err);
        } else {
            return $response;
        }
    }

    public function getGroupScheduleByWeek($groupId, $week, $user = null)
    {
        $curl = curl_init();
        $url = 'http://services.ksue.edu.ua:8081/schedule/xml';
        $data = [
            'auth' => config('commonClient.auth'),
            'group' => $groupId,
            'week' => $week
        ];
        if ($user) {
            $data = array_merge($data, ['student' => $user]);
        }
        $query = http_build_query($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . '?' . $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::channel('commonDBlog')->error("cURL Error #:" . $err);
        } else {
            return $response;
        }
    }

    public function __invoke($connection)
    {
        self::use($connection);
    }
}