<?php
/**
 * Created by PhpStorm.
 * User: null
 * Date: 12/30/2018
 * Time: 1:54 AM
 */
include __DIR__ . "/../vendor/autoload.php";

use \Curl\Curl;

class sport
{
    protected $curl;
    protected $apikey = "360300f41eb9e05af4a4487385b3d10301ca810c174bb62e225aa163bb51d13b";

    public function __construct()
    {
        $curl = new Curl();
        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curl->setOpt(CURLOPT_HEADER, false);
        $curl->setOpt(CURLOPT_TIMEOUT, 30);
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, 5);
        $this->curl = $curl;
    }

    public function getCountry()
    {
        $url = "https://apifootball.com/api/?action=get_countries&APIkey=" . $this->apikey;
        $curl = $this->curl;
        $curl->get($url);
        $result = $curl->response;
        return $result;
    }

    public function getLeagues($country)
    {
        $url = "https://apifootball.com/api/?action=get_leagues&country_id=" . $country . "&APIkey=" . $this->apikey;
        $curl = $this->curl;
        $curl->get($url);
        $result = $curl->response;
        return $result;
    }

    public function getStanding($leagues)
    {
        $url = "https://apifootball.com/api/?action=get_standings&league_id=" . $leagues . "&APIkey=" . $this->apikey;
        $curl = $this->curl;
        $curl->get($url);
        $result = $curl->response;
        return $result;

    }

    public function getEvent()
    {

        $now = date("Y-m-d");
        $tmr = date("Y-m-d", strtotime('tomorrow'));
        $url = "https://apifootball.com/api/?action=get_events&from=" . $now . "&to=" . $tmr . "&APIkey=" . $this->apikey;
        $curl = $this->curl;
        $curl->get($url);
        $result = $curl->response;
        return $result;

    }

    public function getOdds()
    {

        $now = date("Y-m-d");
        $tmr = date("Y-m-d", strtotime('tomorrow'));
        $url = "https://apifootball.com/api/?action=get_odds&from=" . $now . "&to=" . $tmr . "&APIkey=" . $this->apikey;
        $curl = $this->curl;
        $curl->get($url);
        $result = $curl->response;
        return $result;
    }


}