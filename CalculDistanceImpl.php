<?php
require("CalculDistance.php");
class CalculDistanceImpl implements CalculDistance {

    /**
     * @inheritDoc
     */
    public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2) {
        return 6378137 * acos(sin(deg2rad($lat2)) * sin(deg2rad($lat1)) + cos(deg2rad($lat2)) * cos(deg2rad($lat1)) * cos(deg2rad($long2) - deg2rad($long1)));
    }

    /**
     * @inheritDoc
     */
    public function calculDistanceTrajet($parcours) {
        $ret = 0.0;
        for ($i = 1; $i < sizeof($parcours); $i++) {
            $ret += $this->calculDistance2PointsGPS($parcours[$i-1]['latitude'], $parcours[$i-1]['longitude'], $parcours[$i]['latitude'], $parcours[$i]['longitude']);
        }
        return $ret;
    }

    public function json_cut($array) {
        $narray = [];
        $array = json_decode($array, true);
        for ($i = 0; $i < sizeof($array); $i++) {
            $narray += array($i => array('latitude' => $array[$i]['latitude'], 'longitude' => $array[$i]['longitude']));
        }
        return $narray;
    }
}