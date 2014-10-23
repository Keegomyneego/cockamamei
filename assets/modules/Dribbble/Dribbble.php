<?php

class Dribbble
{
    private static $endpoint = 'http://api.dribbble.com';

    /**
     * @param $player
     * @param int $page
     * @param int $shotsPerPage
     * @return mixed
     */
    public static function getShotsByPlayer($player, $page = 1, $shotsPerPage = 15)
    {
        $shots = self::fetch(self::$endpoint. '/players/' . $player . '/shots?page=' . $page . '&per_page=' . $shotsPerPage);

        return $shots;
    }

    /**
     * fetch
     * @param $url
     * @return mixed
     */
    private static function fetch($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }
}